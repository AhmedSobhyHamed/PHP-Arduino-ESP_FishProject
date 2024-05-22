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

#ifndef __REGISTER__
#define __REGISTER__

//#include <bits/stdc++.h>
#include <Arduino.h>

class Register
{
public:
    enum REGISTER  {Q0=0 , Q1 , Q2 , Q3 , Q4 , Q5 , Q6 , Q7};
    enum REGISTER1 {M1E , M1D , M1P , M2E , M2D , M2P};
private:
    bool *Q[8];
    bool clearmode;

    char lastupdate;
    bool reg_status;
    unsigned int time_update;

    int datapin;
    int clearpin;
    int clockpin;

public:
    //pins number for register (data pin , clock pin , clear pin)
    Register(int, int, int);
    ~Register();
    //must call before any function in setup routine
    void init();
    //used on setup to connect a flag stat with a register pin
    //connect (
    // resester pin 
    // flag address
    // )
    void connect(REGISTER , bool &);
    //enable clear data before updates < true >
    //update without clear < false >
    void clearMode(bool);
    //output the regester 
    void update(unsigned int);
};


#endif //__RIGESTER__


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
