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


@(include("lib/form.php")) or die("file not found");
@(include("manoDB.php")) or die("file not found");

$action = $_SERVER['PHP_SELF'];

function part_of_form($the_name , $thevalue1 , $thevalue2 , $theclass)
{
    $key1 = $the_name . "a";
    $key2 = $the_name . "b";
    $section=<<<_section
    <div class="$theclass">
        <h4>$the_name</h4>
        <label for="$the_name-a"> (a) volt + b </label>
        <input id = "$the_name-a" type="text" name = "$key1" value ="$thevalue1">
        <label for="$the_name-b"> a volt + (b) </label>
        <input id = "$the_name-b" type="text" name = "$key2" value ="$thevalue2">
    </div>
_section;
return $section;
}

function section_of_form($thename , $number , $the_outclass , $the_inclass)
{
    $section = <<<_section
    <div $the_outclass>
    <h3>
        $thename
    </h3>
_section;
    for($i=1 ; $i<=$number ; $i++)
    {
        $the_value1 = $thename . $i . "_a";
        $the_value2 = $thename . $i . "_b";
        $the_value1 = get_calib_value($the_value1);
        $the_value2 = get_calib_value($the_value2);
        $n = $thename . $i;
        $section .= part_of_form($n , $the_value1 , $the_value2 , $the_inclass);

    }
    $section .= "</div>";
    return $section;
}

function create_form()
{
    $form_body = "<form action=\"$action\" method = \"post\"> \n";
    $form_body .= section_of_form("pH" , 2 , "div_form" , "div_form");
    $form_body .= section_of_form("EC" , 4 , "div_form" , "div_form");
    $form_body .= '<input type="hidden" name="PAGE" value="#2hza_edit_cali"> \n';
    $form_body .= "<input type=\"submit\" value =\"update\"> \n";
    $form_body .= "<input type=\"reset\" value = \"reset form\"> \n";
    $form_body .= "</form>";
    return $form_body;
}


$title = "calibration";


$the_nav =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#1hza">
<button type="submit" class="TheLink">
< back
</button>
</form>
$title
 <p></p>
_content;

$before =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#3hza">
<button type="submit" class="TheLink">
<
</button>
</form>

_content;
$after =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#5hza">
<button type="submit" class="TheLink">
>
</button>
</form>

_content;

$main_content  = "\n";
$main_content .= create_form();

$links = <<<_content
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/Links.css">
<style>
.the_nav {
    text-indent: 1em;
    justify-content: space-between;
}
</style>
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
