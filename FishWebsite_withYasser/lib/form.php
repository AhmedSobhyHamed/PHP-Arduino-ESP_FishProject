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


function input_form($id , $label_text  ,  $value)
{
    $msg = "<label for=\"$id\"> $label_text </label> \n";
    $msg .= "<input id = \"$id\" type=\"text\" name = \"$id\" value =\"$value\"> \n";
    return $msg;
}

function input_contaner_form($cont , $class)
{
    if(gettype($cont) != "array")
    {
        echo "<div style=\"font-wight: 50; color: #f5A013; margin: auto;\">ERROR</div> \n";
        return;
    }
    $msg = "<div class= \"$class\"> \n";
    foreach($cont as $i)
    {
        $msg .=$i ."<br>";
    }
    $msg .= "</div> \n";
    return $msg;
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
