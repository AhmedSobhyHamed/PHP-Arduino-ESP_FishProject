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


@(include("lib/button.php")) or die("file not found");
$title = "main page";
$the_nav =<<<_content
<h1>
    Hello Haidii, this is the control main page
</h1>
_content;

// $before ="<";
// $after =">";

$main_content  = "\n";
$main_content .= create_linkButton_style("data_base" , "#4hza" , "button-style-1");
$main_content .= create_linkButton_style("manual control" , "#3hza" , "button-style-1");
$main_content .= create_linkButton_style("set new calibration value" , "#2hza" , "button-style-1");
$main_content .= create_linkButton_style("change sittings" , "#5hza" , "button-style-1");

$links = <<<_content
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/button.css">
_content;


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
