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


#ifndef __HEATER__
#define __HEATER__

class Heater
{
private:
    bool status;
    bool connect_status;
    int min_rang;
    int max_rang;
public:
    Heater();
    void Switch_on();
    void Switch_off();
    void change_connection_mode(bool);
    void set_max_temp_offline(int);
    void set_min_temp_offline(int);
    void update(int);
    bool & get_flag();
};

#endif //__HEATER__

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
