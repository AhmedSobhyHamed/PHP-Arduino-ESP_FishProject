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

#include "feeder.h"

feeder::feeder() : lasttime(0) , motor_status(false) , count(0) , count_stat(false)
{

}

void feeder::setenable(bool e)
{
    enable = e;
}

bool & feeder::getenable()
{
    return enable;
}

void feeder::setpulse(bool p)
{
    pulse = p;
}

bool & feeder::getpulse()
{
    return pulse;
}

void feeder::setdirection(bool d)
{
    direction = d;
}

bool & feeder::getdirection()
{
    return direction;
}

unsigned long feeder::convert_to_millis(unsigned int sp)
{
    double t = 1/static_cast<double>(sp);
    return static_cast<unsigned long>(1000*t);
}

void feeder::init(ENABLE_mode e, the_direction d, unsigned intial_speed)
{
    //direction
    if(d == CW)
    {
        direction = true;
    }
    else if (d == CCW)
    {
        direction = false;
    }
    // enable mode
    motor_mode = e;
    if(e == Enable_alltime || e == Disable_onpulse)
    {
        enable = true;
    }
    else if( e == Enable_onpulse || e == Disable_alltime)
    {
        enable = false;
    }
    //speed 
    if(intial_speed > 400)
    {
        intial_speed = 400;
    }
    speed = convert_to_millis(intial_speed);
}

void feeder::speedChange(unsigned int s)
{
    if(s > 400)
    {
        s = 400;
    }
    speed = convert_to_millis(s);
}

void feeder::run()
{
    motor_status = true;
    count_stat = false;
    if(motor_mode == Enable_onpulse)
    {
        setenable(true);
    }
    else if (motor_mode == Disable_onpulse)
    {
        setenable(false);
    }
}

void feeder::run(long steps)
{
    motor_status = true;
    count = steps;
    count_stat = true;
    if(motor_mode == Enable_onpulse)
    {
        setenable(true);
    }
    else if (motor_mode == Disable_onpulse)
    {
        setenable(false);
    }
}

void feeder::stop()
{
    if(count_stat == false)
    {
        motor_status = false;
    }
    if(motor_mode == Enable_onpulse)
    {
        setenable(false);
    }
    else if (motor_mode == Disable_onpulse)
    {
        setenable(true);
    }
}

void feeder::update(unsigned long time1)
{
    if(motor_status == true)
    {
        if(time1 > (lasttime+(speed/2)) && time1 <= (lasttime+speed))
        {
            //plse up
            setpulse(true);
        }
        if(time1 > (lasttime+speed))
        {
            //pulse down
            setpulse(false);
            //reset last time 
            lasttime = time1;
            if(count_stat == true)
            {
                count--;
            }
        }
        if(count_stat == true)
        {
            if(count <= 0)
            {
                count_stat = false;
                count = 0;
                stop();
            }
        }
    }
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
