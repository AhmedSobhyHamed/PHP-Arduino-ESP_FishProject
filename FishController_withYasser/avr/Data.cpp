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


#include"Data.h"

Read_buffer::Read_buffer(int len):length(len)
{
    double *x = new double[length];
    for (int i = 0; i < length; i++)
    {
        x[i]=0;
    }
    values =x;
    referance =0;
}

Read_buffer::~Read_buffer()
{
    delete[] values;
}

void Read_buffer::add_value(double val)
{
    if(referance < length)
    {
        values[referance] = val;
        referance++;
    }
}

double Read_buffer::get_value(int index)
{
    if(index < referance && index >= 0)
    {
        return *(values+index);
    }
    return -1;
}

void Read_buffer::change_value(int index , double val)
{
    if(index < referance && index >= 0)
    {
        values[index] = val;
    }
}

int Read_buffer::Length()
{
    return referance;
}

void Read_buffer::clean()
{
    for (int i = 0; i < length; i++)
    {
        values[i]=-1;
    }
    referance = 0;
}

//========================================================================================

void Statistics::Sort(Read_buffer& buf)
{
    for(int i=0 ; i< buf.Length()-1 ; i++)
    {
        for (int j = i; j < buf.Length() ; j++)
        {
            double v1 = buf.get_value(i);
            double v2 = buf.get_value(j);
            if(v1 != -1 && v2 != -1)
            {
                if(v1 > v2)
                {
                    buf.change_value(i , v2);
                    buf.change_value(j , v1);
                }
            }
        }

    }
}

double Statistics::get_mean(Read_buffer& buf)
{
    double mean =0;
    for(int i=0 ; i<= buf.Length() ; i++)
    {
        double x = buf.get_value(i);
        if(x != -1)
        {
            mean +=x;
        }
    }
    mean /= buf.Length();
    return mean;
}

double Statistics::get_median(Read_buffer& buf)
{
    double median =0;
    if(buf.Length()%2 == 0)  //an odd value
    {
        median = buf.get_value(static_cast<int>(buf.Length()/2)+1);
    }
    if(buf.Length()%2 >0)  // an even value
    {
        median = buf.get_value(buf.Length()) + buf.get_value(buf.Length()+1);
        median /= 2;
    }
    return median;
}

double Statistics::get_mood(Read_buffer& buf)
{
    double mood =-1;
    int count =1;
    for(int i =0 ; i< buf.Length() ; i++)
    {
        double v1 = buf.get_value(i);
        int vcount =1;
        for (int j = i; j <= buf.Length() ; j++)
        {
            double v2 = buf.get_value(j);
            if(v1 != -1 && v2 != -1)
            {
                if(v1 == v2)
                {
                    vcount++;
                }
            }
        }
        if(vcount > count)
        {
            count = vcount;
            if(count != 1)
            {
                mood = v1;
            }
        }
    }
    return mood;
}

double Statistics::get_std_div_Direct(Read_buffer& buf)
{
    double v = 0;
    double mean = Statistics::get_mean(buf);
    for (int i = 0; i <= buf.Length() ; i++)
    {
        double val = buf.get_value(i);
        v += (val - mean) * (val - mean);
    }
    v /= buf.Length();
    v = sqrt(v);
    return v;
}

double Statistics::get_std_div_shortcut(Read_buffer& buf)
{
    double v1 = 0;
    double v2 = 0;
    double mean = Statistics::get_mean(buf);
    for (int i = 0; i <= buf.Length() ; i++)
    {
        double val = buf.get_value(i);
        v1 += (val - mean) * (val - mean);
        v2 += (val - mean);
    }
    v1 /= buf.Length();
    v2 /= buf.Length();
    v2 = v2*v2;
    v1 -= v2;
    v1 = sqrt(v1);
    return v1;
}

//========================================================================================

Data::Data(int val):buf(val) , max_volt(5.0) , timeforread(0) , timeflag(false) , buflen(val) , pulsetime(0)
{

}

void Data::Set_readPin(int pin)
{
    readpin = pin;
}

void Data::Set_tregerPin(int pin)
{
    tregerpin = pin;
}

void Data::init()
{
    pinMode(tregerpin , OUTPUT);
    digitalWrite(tregerpin , LOW);
}

void Data::set_max_volt(double V)
{
    if(V > 5.0)
    {
        V = 5.0;
    }
    max_volt = V;
}

double Data::read_volt(unsigned long sec)
{

    if(timeflag == false)
    {
        timeflag = true;
        timeforread = sec;
        digitalWrite(tregerpin , HIGH);
    }
}

void Data::update(unsigned long sec)
{
    if(timeflag == true)
    {
        //read values
        if(sec > (pulsetime+1))
        {
            digitalWrite(tregerpin , LOW);
        }
        if(sec > (pulsetime+2))
        {
            digitalWrite(tregerpin , HIGH);
            pulsetime = sec;
        }

        int r = -1;
        if(sec > (timeforread+100))
        {
            r = analogRead(readpin);
            timeforread = sec;
        }
        if(sec > (timeforread+5))
        {
            r = analogRead(readpin);
            timeforread = sec;
        }
        if(r != -1)
        {
            //convert to volt
            double volt =  static_cast<double>(r)*max_volt/1023;
            //regester it in read buffer
            buf.add_value(volt);
        }
        if(buf.Length() >= buflen)
        {
            //get std_div
            Statistics::Sort(buf);
            double mean = Statistics::get_mean(buf);
            double std = Statistics::get_std_div_Direct(buf);
            //recreate array without odd values
            int count =0;
            for(int i=0 ; i <= buf.Length() ; i++)
            {
                double VV = buf.get_value(i);
                if(VV != -1)
                {
                    if (VV>(mean+std) || VV<(mean-std))
                    {
                        buf.change_value(i , -1);
                    }
                    else
                    {
                        count++;
                    }
                }
            }
            //get mean and print
            double thevalue = 0;
            for(int i=0 ; i<= buf.Length() ; i++)
            {
                double VV = buf.get_value(i);
                if(VV != -1)
                {
                    thevalue += VV;
                }
            }
            thevalue /= count;
            thevalue += 0.01;
            String uchiha_madara = "$";
            uchiha_madara += String(thevalue);
            uchiha_madara += '$';
            Serial.print(uchiha_madara);
            // Serial.flush();
            //tregepin to low
            digitalWrite(tregerpin , LOW);
            //clean read buffer
            buf.clean();
            //set flag to false
            timeflag = false;
        }
    }
}

//============================================================================================

Data_v2::Data_v2(int xxx):Data(xxx)
{

}

void Data_v2::init()
{

}

double Data_v2::read_volt(unsigned long sec)
{

    if(timeflag == false)
    {
        timeflag = true;
        timeforread = sec;
    }
}

void Data_v2::update(unsigned long sec)
{
    if(timeflag == true)
    {
        //read values
        int r = -1;
        if(sec > (timeforread+100))
        {
            r = analogRead(readpin);
            timeforread = sec;
        }
        if(sec > (timeforread+5))
        {
            r = analogRead(readpin);
            timeforread = sec;
        }
        if(r != -1)
        {
            //convert to volt
            double volt =  static_cast<double>(r)*max_volt/1023;
            //regester it in read buffer
            buf.add_value(volt);
        }
        if(buf.Length() >= buflen)
        {
            //get std_div
            Statistics::Sort(buf);
            double mean = Statistics::get_mean(buf);
            double std = Statistics::get_std_div_Direct(buf);
            //recreate array without odd values
            int count =0;
            for(int i=0 ; i <= buf.Length() ; i++)
            {
                double VV = buf.get_value(i);
                if(VV != -1)
                {
                    if (VV>(mean+std) || VV<(mean-std))
                    {
                        buf.change_value(i , -1);
                    }
                    else
                    {
                        count++;
                    }
                }
            }
            //get mean and print
            double thevalue = 0;
            for(int i=0 ; i<= buf.Length() ; i++)
            {
                double VV = buf.get_value(i);
                if(VV != -1)
                {
                    thevalue += VV;
                }
            }
            thevalue /= count;
            String uchiha_madara = "$";
            uchiha_madara += String(thevalue);
            uchiha_madara += '$';
            Serial.print(uchiha_madara);
            // Serial.flush();
            //clean read buffer
            buf.clean();
            //set flag to false
            timeflag = false;
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
