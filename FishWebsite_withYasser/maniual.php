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


session_start();

@(include("lib/form.php")) or die("file not found");

$action = $_SERVER['PHP_SELF'];


function create_dbutton($text, $value1 , $value2)
{

    $input_var[] = "<h3>$text</h3> ";
    $input_var[] =<<<_content
    <form action="$action" method="post" class="">
    <input type="hidden" name="PAGE" value="$value1">
    <button type="submit" class="TheLink">
    Start
    </button>
    </form>
        
_content;

    $input_var[] =<<<_content
    <form action="$action" method="post" class="">
    <input type="hidden" name="PAGE" value="$value2">
    <button type="submit" class="TheLink">
    Stop
    </button>
    </form>
            
_content;

    return input_contaner_form($input_var , "div_form");

}

function creat_sbutton($text, $value1)
{
    $input_var[] = "<h3>$text</h3> ";
    $input_var[] =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="$value1">
<button type="submit" class="TheLink">
$text
</button>
</form>

_content;

    return input_contaner_form($input_var , "div_form");
}

function create_div($theclass , $txt , $val) 
{
    $ss = creat_sbutton($txt , $val);
    $the_content =<<<_content
    <div class="simi_black_bk">
        <div class="$theclass">
            $ss
        </div>
    </div>
_content;
    return $the_content;
}


$title = "Maniual";

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
<input type="hidden" name="PAGE" value="#4hza">
<button type="submit" class="TheLink">
<
</button>
</form>

_content;
$after =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#2hza">
<button type="submit" class="TheLink">
>
</button>
</form>

_content;

    #feed { start , stop}
    #clean { start , stop}
    #get data // on sittings {update timing , no update}{save data not save data}
    #cheak connection
    #heatter {start , stop }


$main_content  = "\n";
$main_content .= create_dbutton("feeding control tank 1", "#3hza1" , "#3hza2");
$main_content .= create_dbutton("feeding control tank 2", "#3hzb1" , "#3hzb2");
$main_content .= create_dbutton("cleanner control tank 1", "#3hza3" , "#3hza4");
$main_content .= create_dbutton("cleanner control tank 2", "#3hzb3" , "#3hzb4");
$main_content .= create_dbutton("heat system control tank 1", "#3hza5" , "#3hza6");
$main_content .= create_dbutton("heat system control tank 2", "#3hzb5" , "#3hzb6");
$main_content .= creat_sbutton("Requst Data", "#3hza7");
$main_content .= creat_sbutton("cheack connection", "#3hza8");

if(isset($_SESSION['R']))
{
    if($_SESSION['R'] === 'F1')
    {
        $main_content .= create_div("running_button", "feeding control stop", "#3hza2");
    }
    elseif($_SESSION['R'] === 'C1')
    {
        $main_content .= create_div("running_button", "cleanner control stop", "#3hza4");
    }
    elseif($_SESSION['R'] === 'H1')
    {
        $main_content .= create_div("running_button", "heat system control stop", "#3hza6");
    }
    elseif($_SESSION['R'] === 'F2')
    {
        $main_content .= create_div("running_button", "feeding control stop", "#3hzb2");
    }
    elseif($_SESSION['R'] === 'C2')
    {
        $main_content .= create_div("running_button", "cleanner control stop", "#3hzb4");
    }
    elseif($_SESSION['R'] === 'H2')
    {
        $main_content .= create_div("running_button", "heat system control stop", "#3hzb6");
    }
}

$links = <<<_content
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/Links.css">
<link rel="stylesheet" href="css/Screen_blk.css">
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

