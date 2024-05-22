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

#include"Heater.h"

Heater::Heater():status(false) , connect_status(false) , max_rang(28) , min_rang(22)
{

}

void Heater::Switch_on()
{
    status = true;
}

void Heater::Switch_off()
{
    status = false;
}

void Heater::change_connection_mode(bool stat)
{
    connect_status = stat;
}

void Heater::set_max_temp_offline(int temp)
{
    max_rang = temp;
}

void Heater::set_min_temp_offline(int temp)
{
    min_rang = temp;
}

void Heater::update(int temp)
{
    if(connect_status == false)
    {
        if(max_rang < temp)
        {
            status = false;
        }
        if(min_rang > temp)
        {
            status = true;
        }
    }
}


bool & Heater::get_flag()
{
    return status;
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
