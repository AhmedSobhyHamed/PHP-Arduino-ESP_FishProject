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

#include"register.h"

Register::Register(int D, int C ,int R):clearmode(false) , lastupdate(0xff) , reg_status(false) ,
                    datapin(D) , clockpin(C) , clearpin(R) , time_update(0)
{
    for(int i=0 ; i<8 ; i++)
    {
        Q[i] = new bool;
        *Q[i] = false;
    }
}

Register::~Register()
{
    delete [] Q;
}

void Register::init()
{
    pinMode(datapin , OUTPUT);
    pinMode(clockpin , OUTPUT);
    pinMode(clearpin , OUTPUT);
    digitalWrite( datapin, LOW);
    digitalWrite( clockpin, LOW);
    digitalWrite( clearpin, HIGH);
}

void Register::connect(REGISTER R , bool & flag)
{
    delete Q[R];
    Q[R] = & flag;
}

void Register::clearMode(bool m)
{
    clearmode = m;
}

void Register::update(unsigned int sec)
{
    //check for changes 
    for(int i =0 ; i < 8 ; i++)
    {
        int num = static_cast<int>(round(pow(2,i)));
        if((*Q[i]) != ((lastupdate & num)>>i))
        {
            reg_status = true;
            time_update = sec;
            lastupdate = 0X00;
            for(int i =0 ; i < 8 ; i++)
            {
                if((*Q[i]) == true)
                {
                    lastupdate += 1<<i;
                }

            }
            break;
        }

    }
    if(sec > time_update+1000)
    {
        reg_status = true;
        time_update = sec;
    }
    
    if(reg_status == true)
    {
        //update the values 
        if(clearmode == true)
        {
            digitalWrite( clearpin, LOW);
            digitalWrite( clearpin, HIGH);
        }
        for(int i =0 ; i < 8 ; i++)
        {
            if(*Q[i] == true)
            {
                digitalWrite( datapin, HIGH);
                //Serial.print("1");

            }
            else if(*Q[i] == false)
            {
                digitalWrite( datapin, LOW);
                //Serial.print("0");
            }
            digitalWrite( clockpin, HIGH);

            digitalWrite( clockpin, LOW);
        }
        //Serial.println("");
        //change status to false
        reg_status = false;
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
