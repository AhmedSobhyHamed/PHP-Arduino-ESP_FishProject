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

#include"Cleaner.h"

Cleaner::Cleaner(unsigned long tb): max_time(900000) , time_between(tb) , start_time(0) 
                                                    , fan(false) , scan(false) , status(false)
{

}

void Cleaner::switch_cleaner_on(unsigned long t)
{
    start_time = t;
    status = true;
}

void Cleaner::switch_cleaner_off()
{
    status = false;
}

void Cleaner::set_max_clean_time(unsigned long offline_max)
{
    max_time = offline_max;
}

void Cleaner::update(unsigned long t)
{
    if(status == true)
    {
        if((max_time + start_time) < t)
        {
            status = false;
        }
        if(scan == false)
        {
            scan = true;
        }
        if((time_between + start_time) < t)
        {
            if(fan == false)
            {
                fan = true;
            }
        }

    }
    else if(status == false)
    {
        fan = false;
        scan = false;
    }
}

bool & Cleaner::get_fan_flag()
{
    return fan;
}

bool & Cleaner::get_scan_flag()
{
    return scan;
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
