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


@(include("manoDB.php")) or die("file not found");

if(isset($_GET['done']))
{
    #confirm the last order 
    if(isset($_GET['process']))
    {
        $prossess_id = $_GET['process'];
        confirm_order($prossess_id);
    }
    #update the last connection
}
if(isset($_GET['hi']))
{
    #update last connection
}
if(isset($_GET['data']))
{
    #confirm last order 
    if(isset($_GET['process']))
    {
        $prossess_id = $_GET['process'];
        confirm_order($prossess_id);
        #record data
        if(isset($_GET['EC1']))
        {
            $vv = $_GET['EC1'];
            add_rec_EC("EC1" , "EC1_a" , "EC1_b" , $vv , $prossess_id);
        }
        if(isset($_GET['EC2']))
        {
            $vv = $_GET['EC2'];
            add_rec_EC("EC2" , "EC2_a" , "EC2_b" , $vv , $prossess_id);
        }
        if(isset($_GET['EC3']))
        {
            $vv = $_GET['EC3'];
            add_rec_EC("EC3" , "EC3_a" , "EC3_b" , $vv , $prossess_id);
        }
        if(isset($_GET['EC4']))
        {
            $vv = $_GET['EC4'];
            add_rec_EC("EC4" , "EC4_a" , "EC4_b" , $vv , $prossess_id);
        }
        if(isset($_GET['pH1']))
        {
            $vv = $_GET['pH1'];
            add_rec_EC("pH1" , "pH1_a" , "pH1_b" , $vv , $prossess_id);
        }
        if(isset($_GET['pH2']))
        {
            $vv = $_GET['pH2'];
            add_rec_EC("pH2" , "pH2_a" , "pH2_b" , $vv , $prossess_id);
        }
        if(isset($_GET['T1']))
        {
            $vv = $_GET['T1'];
            add_rec_temp("T1" , $vv , $prossess_id);
        }
        if(isset($_GET['T2']))
        {
            $vv = $_GET['T2'];
            add_rec_temp("T2" , $vv , $prossess_id);
        }
        if(isset($_GET['T3']))
        {
            $vv = $_GET['T3'];
            add_rec_temp("T3" , $vv , $prossess_id);
        }
        if(isset($_GET['T4']))
        {
            $vv = $_GET['T4'];
            add_rec_temp("T4" , $vv , $prossess_id);
        }
    }
    #update last connection
}


//add next order to tables operations order 
//create last orders table 
//match time and last order for feed
//set count down time for clean after stop feed
//match time and last order for read data 

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
