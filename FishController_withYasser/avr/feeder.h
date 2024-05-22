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

#ifndef __FEEDER__
#define __FEEDER__

class feeder
{
public:
    enum the_direction {CW , CCW};
    enum ENABLE_mode {Enable_alltime , Enable_onpulse , Disable_alltime , Disable_onpulse};
private:
    bool enable;
    bool pulse;
    bool direction;

    unsigned long lasttime;
    bool motor_status;

    ENABLE_mode  motor_mode;
    unsigned long speed; // speed here pulse per minuite

    long count;
    bool count_stat;

    unsigned long convert_to_millis(unsigned int);
public:
    feeder();
    void setenable(bool);
    bool & getenable();
    void setpulse(bool);
    bool & getpulse();
    void setdirection(bool);
    bool & getdirection();
    // init(
    //     motor mode for enable
    //     motor dirction
    //     motor speed < stepps per second >
    // )
    void init(ENABLE_mode , the_direction , unsigned);
    // set steps per second 
    void speedChange(unsigned int);
    //start running the motor
    void run();
    //start running with known steps count
    void run(long);
    //end or stop the motor 
    void stop();
    // update flags of enable , direction and pulse to use on regesters
    // depend on the settings and time 
    // update (
    // the time now < milli seconds  >
    // )
    void update(unsigned long);
};


#endif  //__FEEDER__

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
