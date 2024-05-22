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

$page_num = $_POST['PAGE'];
$device_req = $_GET['ash008'];

if($device_req === "h50qtzwpsa002FFd4qo9s")
{
    @(include("device.php")) or die("file not found");
}
elseif ($device_req === "h28qtzwpsa133FFd5qo8s")
{
    @(include("confirm.php")) or die("file not found");
}
elseif($device_req === "h28qtzwpsasTd00d5qo8s")
{
    @(include("Start.php")) or die("file not found");
}
else
{
    if($page_num === "#1hza")
    {
        @(include("main.php")) or die("file not found");
    }
    elseif($page_num === "#2hza")
    {
        @(include("calib.php")) or die("file not found");
    }
    elseif($page_num === "#2hza_edit_cali")
    {
        @(include("cali_redirect.php")) or die("file not found");
    }
    elseif($page_num === "#3hza")
    {
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza1") #for button   //Run Feeder1
    {
        $_SESSION['R']='F1';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Run Feeder tank 1" , "C-MFR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza2") #for button   //Stop Feeder1
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Stop Feeder tank 1" , "C-MFS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza3") #for button   //Start Cleanning1
    {
        $_SESSION['R']='C1';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Start Cleanning tank 1" , "C-MCR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza4") #for button   //End Cleanning1
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("End Cleanning tank 1" , "C-MCS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza5") #for button   //connect heater1
    {
        $_SESSION['R']='H1';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("connect heater tank 1" , "C-HPR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza6") #for button   //disconnect heater1
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("disconnect heater tank 1" , "C-HPS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb1") #for button   //Run Feeder2
    {
        $_SESSION['R']='F2';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Run Feeder tank 2" , "C-MfR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb2") #for button   //Stop Feeder2
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Stop Feeder tank 2" , "C-MfS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb3") #for button   //Start Cleanning2
    {
        $_SESSION['R']='C2';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("Start Cleanning tank 2" , "C-McR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb4") #for button   //End Cleanning2
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("End Cleanning tank 2" , "C-McS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb5") #for button   //connect heater2
    {
        $_SESSION['R']='H2';
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("connect heater tank 2" , "C-hpR");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hzb6") #for button   //disconnect heater2
    {
        $_SESSION['R'] = "NULL";
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("disconnect heater tank 2" , "C-hpS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza7") #for button   //read data
    {
        @(include("manoDB.php")) or die("file not found");
        add_to_order_operation("read data" , "D-GDS");
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#3hza8") #for button 
    {
        @(include("maniual.php")) or die("file not found");
    }
    elseif($page_num === "#4hza")
    {
        @(include("data.php")) or die("file not found");
    }
    elseif($page_num === "#5hza")
    {
        @(include("settings.php")) or die("file not found");
    }
    elseif($page_num === "#5hza_settings_update")
    {
        @(include("settings_redirect.php")) or die("file not found");
    }
    else
    {
        @(include("main.php")) or die("file not found");
    }


    $temp = <<<HEAD_Section
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>
            $title
            </title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="project for Haidi's Shrimps">
            <meta name="author" content="Ahmed Sobhy Hamed">
            <meta name="keywords" content="Aqua-calture, Shrimps-tanks, haidi-project, ASH-lab">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
            $links
            <style>
                body {
                    font-family: "Lato", sans-serif
                }
            </style>
        </head>
        <body>
            <nav class ="the_nav">
            $the_nav
            </nav>
            <main class ="the_main">
                <section class ="section_before">
                    $before
                </section>
                <article>
                        $main_content
                </article>
                <section class ="section_after">
                    $after
                </section>
            </main>
            <footer>
                <span>
                    for more info contact with ahmedproj2@gmail.com
                </span>
            </footer>
        </body>
    </html>
HEAD_Section;

    echo $temp;

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

