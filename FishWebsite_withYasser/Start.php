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


$v1 = get_calib_value("Feeder_speed_1");
$v2 = get_calib_value("Feeder_speed_2");
$v3 = get_calib_value("cleaner_maxtime_1");
$v4 = get_calib_value("cleaner_maxtime_2");
$v5 = get_calib_value("temp_offline_min_1");
$v6 = get_calib_value("temp_offline_max_1");
$v7 = get_calib_value("temp_offline_min_2");
$v8 = get_calib_value("temp_offline_max_2");
$v9 = get_calib_value("light_critical");


echo  "S-F" . $v1 . "|S-f". $v2 . "|S-CT". $v3 . "|S-ct". $v4 . 
"|S-HM". $v5 . "|S-HX". $v6 . "|S-hM". $v7 . "|S-hX". $v8 . "|L-". $v9 . "|";


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

