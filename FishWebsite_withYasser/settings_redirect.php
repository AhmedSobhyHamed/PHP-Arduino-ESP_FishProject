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
if(isset($_POST['fs1']))
{
    update_settings("Feeder_speed_1" , $_POST['fs1']);
    $val = "S-F" . $_POST['fs1'];
    add_to_order_operation('set feeder 1 speed', $val);
}
if(isset($_POST['fsg1']))
{
    update_settings("feeder_steps_per_gram_1" , $_POST['fsg1']);
}
if(isset($_POST['fgm1']))
{
    update_settings("feeder_meal_gram_1" , $_POST['fgm1']);
}
if(isset($_POST['fmb1']))
{
    update_settings("period_betwwen_meals_1" , $_POST['fmb1']);
}
if(isset($_POST['fmn1']))
{
    update_settings("meals_number_1" , $_POST['fmn1']);
}
if(isset($_POST['fs2']))
{
    update_settings("Feeder_speed_2" , $_POST['fs2']);
    $val = "S-f" . $_POST['fs2'];
    add_to_order_operation('set feeder 2 speed', $val);
}
if(isset($_POST['fsg2']))
{
    update_settings("feeder_steps_per_gram_2" , $_POST['fsg2']);
}
if(isset($_POST['fgm2']))
{
    update_settings("feeder_meal_gram_2" , $_POST['fgm2']);
}
if(isset($_POST['fmb2']))
{
    update_settings("period_betwwen_meals_2" , $_POST['fmb2']);
}
if(isset($_POST['fmn2']))
{
    update_settings("meals_number_2" , $_POST['fmn2']);
}
if(isset($_POST['cmt1']))
{
    update_settings("cleaner_maxtime_1" , $_POST['cmt1']);
    $val = "S-CT" . $_POST['cmt1'];
    add_to_order_operation('offline cleanner 1 time', $val);
}
if(isset($_POST['cfp1']))
{
    update_settings("period_meal_clean_1" , $_POST['cfp1']);
}
if(isset($_POST['ct1']))
{
    update_settings("cleannig_time_1" , $_POST['ct1']);
}
if(isset($_POST['cmt2']))
{
    update_settings("cleaner_maxtime_2" , $_POST['cmt2']);
    $val = "S-ct" . $_POST['cmt2'];
    add_to_order_operation('offline cleanner 2 time', $val);
}
if(isset($_POST['cfp2']))
{
    update_settings("period_meal_clean_2" , $_POST['cfp2']);
}
if(isset($_POST['ct2']))
{
    update_settings("cleannig_time_2" , $_POST['ct2']);
}
if(isset($_POST['tmin1']))
{
    update_settings("temp_offline_min_1" , $_POST['tmin1']);
    $val = "S-HM" . $_POST['tmin1'];
    add_to_order_operation('offline min heater 1 edge', $val);
}
if(isset($_POST['tmax1']))
{
    update_settings("temp_offline_max_1" , $_POST['tmax1']);
    $val = "S-HX" . $_POST['tmax1'];
    add_to_order_operation('offline max heater 1 edge', $val);
}
if(isset($_POST['tmin2']))
{
    update_settings("temp_offline_min_2" , $_POST['tmin2']);
    $val = "S-hM" . $_POST['tmin2'];
    add_to_order_operation('offline min heater 2 edge', $val);
}
if(isset($_POST['tmax2']))
{
    update_settings("temp_offline_max_2" , $_POST['tmax2']);
    $val = "S-hX" . $_POST['tmax2'];
    add_to_order_operation('offline max heater 2 edge', $val);
}
// if(isset($_POST['tmin3']))
// {
//     update_settings("temp_offline_min_3" , $_POST['tmin3']);
//     $val = "S-hm" . $_POST['tmin3'];
//     add_to_order_operation('offline min heater 3 edge', $val);
// }
// if(isset($_POST['tmax3']))
// {
//     update_settings("temp_offline_max_3" , $_POST['tmax3']);
//     $val = "S-hx" . $_POST['tmax3'];
//     add_to_order_operation('offline max heater 3 edge', $val);
// }
// if(isset($_POST['tmin4']))
// {
//     update_settings("temp_offline_min_4" , $_POST['tmin4']);
//     $val = "S-Hm" . $_POST['tmin4'];
//     add_to_order_operation('offline min heater 4 edge', $val);
// }
// if(isset($_POST['tmax4']))
// {
//     update_settings("temp_offline_max_4" , $_POST['tmax4']);
//     $val = "S-Hx" . $_POST['tmax4'];
//     add_to_order_operation('offline max heater 4 edge', $val);
// }
if(isset($_POST['lit1']))
{
    update_settings("light_critical" , $_POST['lit1']);
    $val = "L-" . $_POST['lit1'];
    add_to_order_operation('light resistor value', $val);
}
echo "update Successfuly :)\n";
//update order table and op table
//motor speed , offline clean time , offline min temp , offline max temp , light critical value

////redirect to main

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
