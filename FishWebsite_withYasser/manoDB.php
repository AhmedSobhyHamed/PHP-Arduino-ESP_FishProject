<?php

/****************************************************************************************/
/*
*this file was created under a name of fish farming project
*creation date: 2023 - 2
*this file created by Ahmed Abdulal (Ahmed Sobhy)
*by cooperateing with Dr-Yasser and haidy to provide information about shrimps and aquaculture, this project has been compleated 
*this file can only used under approval of the auther
*this file not allowed for sharing or trading
*/
/****************************************************************************************/



@(include("login_data.php")) or die("file not found");



function add_opration($op_name )
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $date = date('Y-m-j H:i:s');
    $nextIndex = "SELECT COUNT(*) FROM operations ";
    $result = $connection->query($nextIndex);
    $row = $result->fetch_array(MYSQLI_NUM);
    $nextIndex = htmlspecialchars($row[0]) + 1;
    $query =
    "INSERT INTO operations ".
    "(operation_name , send_time , receave_time , time_between , Is_compleated , opIndex)".
    "VALUES('$op_name' , '$date' , '' , '' , '0' , $nextIndex)";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
    return $nextIndex;
}

function add_order($order_code , $op_num)
{
    #code | number 
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "INSERT INTO orders_buffer".
    "( opsimbol , opIndex)".
    "VALUES('$order_code' , '$op_num')";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
}

function add_to_order_operation($opname , $opcode)
{
    $o_n = add_opration($opname);
    add_order($opcode , $o_n);
}

function get_order()
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "SELECT * FROM orders_buffer";
    $result = $connection->query($query);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $order  = htmlspecialchars($row[1]);
        $order .="||";
        $order .= htmlspecialchars($row[0]);
        //$result->close();
        $connection->close();
        return $order;
    }

    //$result->close();
    $connection->close();
    return 0;
}

function confirm_order($opnum)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT * FROM operations  WHERE opIndex = $opnum";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $time1 = htmlspecialchars($row[1]);
    $time1 = strtotime($time1);

    $date = date('Y-m-j H:i:s');
    $time2 = time();
    $query = 
    "UPDATE operations  SET receave_time = '$date' WHERE opIndex = $opnum";
    $connection->query($query);
    $time2 -= $time1;

    $query = 
    "UPDATE operations  SET time_between = $time2 WHERE opIndex = $opnum";
    $connection->query($query);
    $query = 
    "UPDATE operations  SET Is_compleated = 1 WHERE opIndex = $opnum";
    $connection->query($query);
    $query =
    "DELETE FROM orders_buffer WHERE opIndex = $opnum";
    $result = $connection->query($query);
    $query =
    "DELETE FROM auto_order_buffer WHERE opIndex = $opnum";
    $result = $connection->query($query);
    //$result->close();
    $connection->close();
}

function add_rec_EC($Tname , $name_A , $name_B , $value , $opnum)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT * FROM Settings WHERE Name = '$name_A'";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $A_value = htmlspecialchars($row[1]);
    $query = 
    "SELECT * FROM Settings WHERE Name = '$name_B'";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $B_value = htmlspecialchars($row[1]);
    $query = 
    "SELECT * FROM operations  WHERE opIndex = $opnum";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $time1 = htmlspecialchars($row[2]);
    $time1 = strtotime($time1);
    $date = new \DateTime();
    $date->setTimestamp($time1);
    $time1 = $date->format("Y-m-j H:i:s");
    $calc_value = ($A_value * $value) + $B_value;
    $query =
    "INSERT INTO $Tname".
    "( opindex , volt , a_value , b_value , read_time , read_value)".
    "VALUES('$opnum' , '$value' , '$A_value' , '$B_value' , '$time1' , '$calc_value')";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
}

function add_rec_temp($Tname , $value , $opnum)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT * FROM operations  WHERE opIndex = $opnum";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $time1 = htmlspecialchars($row[2]);
    $time1 = strtotime($time1);
    $date = new \DateTime();
    $date->setTimestamp($time1);
    $time1 = $date->format("Y-m-j H:i:s");
    $query =
    "INSERT INTO $Tname".
    "( opindex , read_time , read_value)".
    "VALUES('$opnum' , '$time1' , '$value')";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
}

function update_connection_table($thetime)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "DELETE FROM con_table";
    $connection->query($query);
    $query =
    "INSERT INTO con_table".
    "(last_update)VALUES('$thetime')";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
}

function get_calib_value($name)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT value FROM Settings WHERE name='$name'";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $val = htmlspecialchars($row[0]);
    $connection->close();
    return $val;
}

function update_settings($name , $value)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "UPDATE Settings  SET value = $value WHERE name = '$name'";
    $connection->query($query);

    $connection->close();
}

function get_table($table , $fromrow , $torow)
{
    if($fromrow < 0)
    {
        $fromrow = 0;
    }
    if($torow < 0)
    {
        $torow = 0;
    }
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT * FROM $table limit $fromrow , $torow";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $xo = array();
    while($row != false)
    {
        array_push($xo , $row);
        $row = $result->fetch_array(MYSQLI_NUM);
    }
    // $result->close();
    $connection->close();
    return $xo;
}

function get_auto_start_time($name)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT Stime FROM auto where op= '$name'";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $val = htmlspecialchars($row[0]);
    $connection->close();
    $val = strtotime($val);
    return $val;
}

function get_auto_end_time($name)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query = 
    "SELECT Dtime FROM auto where op= '$name'";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $val = htmlspecialchars($row[0]);
    $connection->close();
    $val = strtotime($val);
    return $val;
}

function update_auto_start_time($name , $value)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "UPDATE auto  SET Stime = '$value' WHERE op = '$name'";
    $connection->query($query);
    $connection->close();
}

function update_auto_end_time($name , $value)
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "UPDATE auto  SET Dtime = '$value' WHERE op = '$name'";
    $connection->query($query);
    $connection->close();
}

function add_auto_order($order_code , $op_num)
{
    #code | number 
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "INSERT INTO auto_order_buffer".
    "( opsimbol , opIndex)".
    "VALUES('$order_code' , '$op_num')";
    $result = $connection->query($query);
    if (!$result)
    {
        echo "INSERT failed<br><br>";
    }
    //$result->close();
    $connection->close();
}

function add_to_auto_order_operation($opname , $opcode)
{
    $o_n = add_opration($opname);
    add_auto_order($opcode , $o_n);
}

function get_auto()
{
    $connection = new mysqli(DBHOST , DBUSER , DBPASS , DBDATABASE);
    if ($connection->connect_error) 
    {
        die("Fatal Error");
    }
    $query =
    "SELECT * FROM auto_order_buffer";
    $result = $connection->query($query);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $order  = htmlspecialchars($row[1]);
        $order .="||";
        $order .= htmlspecialchars($row[0]);
        //$result->close();
        $connection->close();
        return $order;
    }

    //$result->close();
    $connection->close();
    return 0;
}

/****************************************************************************************/
/*
*this file was created under a name of fish farming project
*creation date: 2023 - 2
*this file created by Ahmed Abdulal (Ahmed Sobhy)
*by cooperateing with Dr-Yasser and haidy to provide information about shrimps and aquaculture, this project has been compleated 
*this file can only used under approval of the auther
*this file not allowed for sharing or trading
*/
/****************************************************************************************/

