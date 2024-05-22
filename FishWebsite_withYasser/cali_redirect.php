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


$redir = $_SERVER['PHP_SELF'];
header("Refresh: 5; url=$redir");
@(include("manoDB.php")) or die("file not found");

//add values
if(isset($_POST['pH1a']))
{
    update_settings("pH1_a" , $_POST['pH1a']);
}
if(isset($_POST['pH1b']))
{
    update_settings("pH1_b" , $_POST['pH1b']);
}
if(isset($_POST['pH2a']))
{
    update_settings("pH2_a" , $_POST['pH2a']);
}
if(isset($_POST['pH2b']))
{
    update_settings("pH2_b" , $_POST['pH2b']);
}
if(isset($_POST['EC1a']))
{
    update_settings("EC1_a" , $_POST['EC1a']);
}
if(isset($_POST['EC1b']))
{
    update_settings("EC1_b" , $_POST['EC1b']);
}
if(isset($_POST['EC2a']))
{
    update_settings("EC2_a" , $_POST['EC2a']);
}
if(isset($_POST['EC2b']))
{
    update_settings("EC2_b" , $_POST['EC2b']);
}
if(isset($_POST['EC3a']))
{
    update_settings("EC3_a" , $_POST['EC3a']);
}
if(isset($_POST['EC3b']))
{
    update_settings("EC3_b" , $_POST['EC3b']);
}
if(isset($_POST['EC4a']))
{
    update_settings("EC4_a" , $_POST['EC4a']);
}
if(isset($_POST['EC4b']))
{
    update_settings("EC4_b" , $_POST['EC4b']);
}
echo "update Successfuly :)";
//redirect to main

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
