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

function check_auto()
{
    $thehour = date('H');
    $theT = time();
    $datetimeFormat = 'Y-m-j H:i:s';
    $lastmeal1 = get_calib_value("meals_number_1");
    $lastmeal1 *= get_calib_value("period_betwwen_meals_1");
    $lastmeal2 = get_calib_value("meals_number_2");
    $lastmeal2 *= get_calib_value("period_betwwen_meals_2");
    if($thehour >= 6 && $thehour <= $lastmeal1+6 )
    {
        //see feeder time 
        $meal_time1     = get_auto_start_time("feed1");
        $deadlinetime1      = get_auto_end_time("feed1");
        if($theT >= $meal_time1 && $theT < $deadlinetime1)
        {
            $timebetweenmeals1 = get_calib_value("period_betwwen_meals_1");
            $meal_time1 = $theT + ($timebetweenmeals1*3600);

            $date = new \DateTime();
            $date->setTimestamp($meal_time1);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("feed1" , $date1);
            $deadlinetime1 = $meal_time1 + 3600;
            $date->setTimestamp($deadlinetime1);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("feed1" , $date2);

            $meal_time1 -= (get_calib_value("period_meal_clean_1")*60*60);
            $deadlinetime1 -= (get_calib_value("period_meal_clean_1")*60*60);

            $date->setTimestamp($meal_time1);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("clean1Start" , $date1);

            $date->setTimestamp($deadlinetime1);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("clean1Start" , $date2);


            $grams1 = get_calib_value("feeder_meal_gram_1");
            $stps1  = get_calib_value("feeder_steps_per_gram_1");
            $uchiha_itachi = $grams1*$stps1;
            $uchiha_itachi = "C-FF" . $uchiha_itachi;
            add_to_auto_order_operation("Run Feeder1 with steps" , $uchiha_itachi);
        }
        elseif($theT > $meal_time1)
        {
            $timebetweenmeals1 = get_calib_value("period_betwwen_meals_1");
            $meal_time1 = $theT + ($timebetweenmeals1*3600);

            $date = new \DateTime();
            $date->setTimestamp($meal_time1);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("feed1" , $date1);
            $deadlinetime1 = $meal_time1 + 3600;
            $date->setTimestamp($deadlinetime1);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("feed1" , $date2);

            $meal_time1 -= 900;
            $deadlinetime1 -= 900;

            $date->setTimestamp($meal_time1);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("clean1Start" , $date1);

            $date->setTimestamp($deadlinetime1);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("clean1Start" , $date2);
        }
        //see cleaner time 
        $meal_time1     = get_auto_start_time("clean1Start");
        $deadlinetime1      = get_auto_end_time("clean1Start");
        if($meal_time1 != 0 && $deadlinetime1 != 0)
        {
            if($theT >= $meal_time1 && $theT < $deadlinetime1)
            {
                $uchiha_itachi = "C-MCR";
                add_to_auto_order_operation("Start Cleanning tank 1" , $uchiha_itachi);
                $date = new \DateTime();
                $date->setTimestamp(0);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean1Start" , $date1);
                update_auto_end_time("clean1Start" , $date1);
                $meal_time1 += (get_calib_value("cleannig_time_1")*60);
                $date->setTimestamp($meal_time1);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean1end" , $date1);
            }
        }
        $endclean = get_auto_start_time("clean1end");
        if($endclean > 0)
        {
            if($theT > $endclean)
            {
                $uchiha_itachi = "C-MCS";
                add_to_auto_order_operation("Start Cleanning tank 1" , $uchiha_itachi);
                $date = new \DateTime();
                $date->setTimestamp(0);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean1end" , $date1);
            }
        }
    }
    if($thehour >= 6 && $thehour <= $lastmeal2+6 )
    {
        //see feeder time 
        $meal_time2     = get_auto_start_time("feed2");
        $deadlinetime2      = get_auto_end_time("feed2");
        if($theT >= $meal_time2 && $theT < $deadlinetime2)
        {
            $timebetweenmeals2 = get_calib_value("period_betwwen_meals_2");
            $meal_time2 = $theT + ($timebetweenmeals2*3600);

            $date = new \DateTime();
            $date->setTimestamp($meal_time2);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("feed2" , $date1);
            $deadlinetime2 = $meal_time2 + 3600;
            $date->setTimestamp($deadlinetime2);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("feed2" , $date2);
            
            $meal_time2 -= (get_calib_value("period_meal_clean_2")*60*60);
            $deadlinetime2 -= (get_calib_value("period_meal_clean_2")*60*60);

            $date->setTimestamp($meal_time2);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("clean2Start" , $date1);

            $date->setTimestamp($deadlinetime2);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("clean2Start" , $date2);

            $grams1 = get_calib_value("feeder_meal_gram_2");
            $stps1  = get_calib_value("feeder_steps_per_gram_2");
            $uchiha_itachi = $grams1*$stps1;
            $uchiha_itachi = "C-Ff" . $uchiha_itachi;
            add_to_auto_order_operation("Run Feeder2 with steps" , $uchiha_itachi);
        }
        elseif($theT > $meal_time2)
        {
            $timebetweenmeals2 = get_calib_value("period_betwwen_meals_2");
            $meal_time2 = $theT + ($timebetweenmeals2*3600);

            $date = new \DateTime();
            $date->setTimestamp($meal_time2);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("feed2" , $date1);
            $deadlinetime2 = $meal_time2 + 3600;
            $date->setTimestamp($deadlinetime2);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("feed2" , $date2);
            
            $meal_time2 -= 60;
            $deadlinetime2 -= 60;

            $date->setTimestamp($meal_time2);
            $date1 = $date->format($datetimeFormat);
            update_auto_start_time("clean2Start" , $date1);

            $date->setTimestamp($deadlinetime2);
            $date2 = $date->format($datetimeFormat);
            update_auto_end_time("clean2Start" , $date2);
        }
        //see cleaner time 
        $meal_time2     = get_auto_start_time("clean2Start");
        $deadlinetime2      = get_auto_end_time("clean2Start");
        if($meal_time2 != 0 && $deadlinetime2 != 0)
        {
            if($theT >= $meal_time2 && $theT < $deadlinetime2)
            {
                $uchiha_itachi = "C-McR";
                add_to_auto_order_operation("Start Cleanning tank 2" , $uchiha_itachi);
                $date = new \DateTime();
                $date->setTimestamp(0);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean2Start" , $date1);
                update_auto_end_time("clean2Start" , $date1);
                $date = new \DateTime();
                $meal_time2 += (get_calib_value("cleannig_time_2")*60);
                $date->setTimestamp($meal_time2);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean2end" , $date1);
            }
        }
        $endclean = get_auto_start_time("clean2end");
        if($endclean > 0)
        {
            if($theT > $endclean)
            {
                $uchiha_itachi = "C-McS";
                add_to_auto_order_operation("Start Cleanning tank 1" , $uchiha_itachi);
                $date = new \DateTime();
                $date->setTimestamp(0);
                $date1 = $date->format($datetimeFormat);
                update_auto_start_time("clean2end" , $date1);
            }
            
        }
    }
    //see data time 
    $datatime = get_auto_start_time("datatime");
    if($theT >= $datatime )
    {
        $datatime = $theT + 1800;
        $date = new \DateTime();
        $date->setTimestamp($datatime);
        $date1 = $date->format($datetimeFormat);
        update_auto_start_time("datatime" , $date1);
        add_to_auto_order_operation("read data" , "D-GDS");
    }
}
check_auto();
$order = get_order();
$auto  = get_auto();
if($order != 0)
{
    echo $order;
}
elseif ($auto != 0) 
{
    echo $auto;
}
else
{
    echo "hi";
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

