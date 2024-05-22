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

$action = $_SERVER['PHP_SELF'];


function create_main()
{
    $speed1       =  get_calib_value("Feeder_speed_1");
    $speed2       =  get_calib_value("Feeder_speed_2");
    $steps1       =  get_calib_value("feeder_steps_per_gram_1");
    $steps2       =  get_calib_value("feeder_steps_per_gram_2");
    $grams1       =  get_calib_value("feeder_meal_gram_1");
    $grams2       =  get_calib_value("feeder_meal_gram_2");
    $meal1        =  get_calib_value("period_betwwen_meals_1");
    $meal2        =  get_calib_value("period_betwwen_meals_2");
    $cleantime1   =  get_calib_value("cleaner_maxtime_1");
    $cleantime2   =  get_calib_value("cleaner_maxtime_2");
    $cleanperiod1 =  get_calib_value("period_meal_clean_1");
    $cleanperiod2 =  get_calib_value("period_meal_clean_2");
    $clean1       =  get_calib_value("cleannig_time_1");
    $clean2       =  get_calib_value("cleannig_time_2");
    $tmpmin1      =  get_calib_value("temp_offline_min_1");
    $tmpmin2      =  get_calib_value("temp_offline_min_2");
    // $tmpmin3      =  get_calib_value("temp_offline_min_3");
    // $tmpmin4      =  get_calib_value("temp_offline_min_4");
    $tmpmax1      =  get_calib_value("temp_offline_max_1");
    $tmpmax2      =  get_calib_value("temp_offline_max_2");
    // $tmpmax3      =  get_calib_value("temp_offline_max_3");
    // $tmpmax4      =  get_calib_value("temp_offline_max_4");
    $lightval     =  get_calib_value("light_critical");
    $daym1        =  get_calib_value("meals_number_1");
    $daym2        =  get_calib_value("meals_number_2");

    $buffer =<<<_utchiha_madara
    <form action="$action" method = "post">
        <input type="hidden" name="PAGE" value="#5hza_settings_update">
        <h3> Feeders Settings </h3>
        <div class = "div_form">
            <h4> tank 1 </h4>
            <div>
                <label for="speed_feeder_1"> motor speed (steps or puls /sec) : </label>
                <input id = "speed_feeder_1" type="text" name = "fs1" value ="$speed1">
            </div>
            <div>
                <label for="steps_gram_feeder_1"> steps needed for one gram (steps or puls) : </label>
                <input id = "steps_gram_feeder_1" type="text" name = "fsg1" value ="$steps1">
            </div>
            <div>
                <label for="grams_feeder_1"> grams in meal (gram) : </label>
                <input id = "grams_feeder_1" type="text" name = "fgm1" value ="$grams1">
            </div>
            <div>
                <label for="meal_feeder_1"> meals between period (hours) : </label>
                <input id = "meal_feeder_1" type="text" name = "fmb1" value ="$meal1">
            </div>
            <div>
                <label for="mealnum_feeder_1"> meals number per day (start at 8am) : </label>
                <input id = "mealnum_feeder_1" type="text" name = "fmn1" value ="$daym1">
            </div>
        </div>
        <div class = "div_form">
            <h4> tank 2 </h4>
            <div>
                <label for="speed_feeder_2"> motor speed (steps or puls /sec) : </label>
                <input id = "speed_feeder_2" type="text" name = "fs2" value ="$speed2">
            </div>
            <div>
                <label for="steps_gram_feeder_2"> steps needed for one gram (steps or puls) : </label>
                <input id = "steps_gram_feeder_2" type="text" name = "fsg2" value ="$steps2">
            </div>
            <div>
                <label for="grams_feeder_2"> grams in meal (gram) : </label>
                <input id = "grams_feeder_2" type="text" name = "fgm2" value ="$grams2">
            </div>
            <div>
                <label for="meal_feeder_2"> meals between period (hours) : </label>
                <input id = "meal_feeder_2" type="text" name = "fmb2" value ="$meal2">
            </div>
            <div>
                <label for="mealnum_feeder_2"> meals number per day (start at 8am) : </label>
                <input id = "mealnum_feeder_2" type="text" name = "fmn2" value ="$daym2">
            </div>
        </div>
        <h3> Cleanner Settings </h3>
        <div class = "div_form">
            <h4> tank 1 </h4>
            <div>
                <label for="cleantime_1"> offline max clean time (seconds) : </label>
                <input id = "cleantime_1" type="text" name = "cmt1" value ="$cleantime1">
            </div>
            <div>
                <label for="cleanperiod_1"> period after feeding to start clean (hours) : </label>
                <input id = "cleanperiod_1" type="text" name = "cfp1" value ="$cleanperiod1">
            </div>
            <div>
                <label for="clean_1"> cleanning time (minuite) : </label>
                <input id = "clean_1" type="text" name = "ct1" value ="$clean1">
            </div>
        </div>
        <div class = "div_form">
            <h4> tank 2 </h4>
            <div>
                <label for="cleantime_2"> offline max clean time (seconds) : </label>
                <input id = "cleantime_2" type="text" name = "cmt2" value ="$cleantime2">
            </div>
            <div>
                <label for="cleanperiod_2"> period after feeding to start clean (hours) : </label>
                <input id = "cleanperiod_2" type="text" name = "cfp2" value ="$cleanperiod2">
            </div>
            <div>
                <label for="clean_2"> cleanning time (minuite) : </label>
                <input id = "clean_2" type="text" name = "ct2" value ="$clean2">
            </div>
        </div>
        <h3> Temperature Settings </h3>
        <div class = "div_form">
            <h4> Heater1 (tank 1) </h4>
            <div>
                <label for="tmp_min_1"> offline minimum temperature edge : </label>
                <input id = "tmp_min_1" type="text" name = "tmin1" value ="$tmpmin1">
            </div>
            <div>
                <label for="tmp_max_1"> offline maximum temperature edge : </label>
                <input id = "tmp_max_1" type="text" name = "tmax1" value ="$tmpmax1">
            </div>
        </div>
        <div class = "div_form">
            <h4> Heater2 (tank 2) </h4>
            <div>
                <label for="tmp_min_2"> offline minimum temperature edge : </label>
                <input id = "tmp_min_2" type="text" name = "tmin2" value ="$tmpmin2">
            </div>
            <div>
                <label for="tmp_max_2"> offline maximum temperature edge : </label>
                <input id = "tmp_max_2" type="text" name = "tmax2" value ="$tmpmax2">
            </div>
        </div>
        <!--
        <div class = "div_form">
            <h4> sensor3 (plant area 1) </h4>
            <div>
                <label for="tmp_min_3"> offline minimum temperature edge : </label>
                <input id = "tmp_min_3" type="text" name = "tmin3" value ="$tmpmin3">
            </div>
            <div>
                <label for="tmp_max_3"> offline maximum temperature edge : </label>
                <input id = "tmp_max_3" type="text" name = "tmax3" value ="$tmpmax3">
            </div>
        </div>
        <div class = "div_form">
            <h4> sensor4 (plant area 2) </h4>
            <div>
                <label for="tmp_min_4"> offline minimum temperature edge : </label>
                <input id = "tmp_min_4" type="text" name = "tmin4" value ="$tmpmin4">
            </div>
            <div>
                <label for="tmp_max_4"> offline maximum temperature edge : </label>
                <input id = "tmp_max_4" type="text" name = "tmax4" value ="$tmpmax4">
            </div>
        </div>
        -->
        <h3> Light Settings </h3>
        <div class = "div_form">
            <label for="Light_sys"> critical value of resistor to toggle light  : </label>
            <input id = "Light_sys" type="text" name = "lit1" value ="$lightval">
        </div>
        <input type="submit" value ="update">
        <input type="reset" value = "reset form">
    </form>
_utchiha_madara;
return $buffer;
}


$title = "Sittings";

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
<input type="hidden" name="PAGE" value="#2hza">
<button type="submit" class="TheLink">
<
</button>
</form>

_content;
$after =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#4hza">
<button type="submit" class="TheLink">
>
</button>
</form>

_content;

$main_content  = "\n";
$main_content .= create_main();

$links = <<<_content
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/Links.css">
<style>
.the_nav {
    justify-content: left;
    text-indent: 1em;
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

