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

#ifndef __CLEANER__
#define __CLEANER__

class Cleaner
{
private:
    bool fan;
    bool scan;
    unsigned long time_between;
    unsigned long max_time;
    unsigned long start_time;
    bool status;
public:
    //define object with (
    // time between scan running and sucker to run
    // )
    Cleaner(unsigned long);
    // argument for time when start the prossess
    void switch_cleaner_on(unsigned long);
    void switch_cleaner_off();
    //set max clean time for any wrong
    void set_max_clean_time(unsigned long);
    //argument for time now
    void update(unsigned long);
    bool & get_scan_flag();
    bool & get_fan_flag();
};

#endif //__CLEANER__


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
