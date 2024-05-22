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

#ifndef __DATA__
#define __DATA__

#include<math.h>
#include<Arduino.h>

class Read_buffer
{
private:
    double* values;
    int length;
    int referance;
public:
    //intial with the buffer capacity 
    Read_buffer(int);
    ~Read_buffer();
    void add_value(double);
    double get_value(int);
    void change_value(int , double);
    void clean();
    int Length();
};

class Statistics
{
public:
    Statistics();
    static void Sort(Read_buffer&);
    static double get_mean(Read_buffer&);
    //return -1 if there no freqance
    static double get_mood(Read_buffer&);
    //never use without sort method before it 
    static double get_median(Read_buffer&);
    //   √[∑D²/N]
    // witch D is value-mean
    static double get_std_div_Direct(Read_buffer&);
    //   √[(∑D²/N) – (∑D/N)²]
    // witch D is value-mean
    static double get_std_div_shortcut(Read_buffer&);
};

class Data
{
protected:
    Read_buffer buf;
    int buflen;
    double max_volt;
    int readpin;
    int tregerpin;
    unsigned long timeforread;
    bool timeflag;
    unsigned long pulsetime;
public:
    //initial with how many read in mean value
    Data(int);
    void init();
    void Set_readPin(int);
    void Set_tregerPin(int);
    void set_max_volt(double);
    double read_volt(unsigned long);
    void update(unsigned long);
};

class Data_v2 :public Data
{
public:
    Data_v2(int);
    void init();
    double read_volt(unsigned long);
    void update(unsigned long);
};

#endif //__DATA__

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
