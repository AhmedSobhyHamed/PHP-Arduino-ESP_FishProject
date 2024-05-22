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


//remmber to add const about new line and concatenate it
function create_linkButton_style($text_value , $link , $class)
{
    // $start_ancher    = "<a href=\"".$link."\">";
    // $start_button     = "<button class=\"" . $class . "\">";
    // $end_button     = "</button>";
    // $end_ancher     = "</a>";
    // return $start_ancher.$start_button.$text_value.$end_button.$end_ancher." ";
    $action = $_SERVER['PHP_SELF'];
    $button =<<<_content
    <form action="$action" method="post" class="">
    <input type="hidden" name="PAGE" value="$link">
    <button type="submit" class="$class">
    $text_value
    </button>
    </form>

_content;
    return $button;
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
