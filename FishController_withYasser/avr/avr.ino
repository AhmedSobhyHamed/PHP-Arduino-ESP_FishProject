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

//if order found
//  switch the flag

// motor system update 
// clean system update 
// heater system update 

//regester one run 
//regester tow run


#include"feeder.h"
#include"register.h"
#include"Order.h"
#include"Cleaner.h"
#include"Heater.h"
#include"light.h"
#include"Data.h"
#include <OneWire.h> 
#include <DallasTemperature.h>

feeder feeder1;
feeder feeder2;
Register reg1(10,9,8);
Order remoteOrder('$');
Cleaner cleaner1(5000);
Cleaner cleaner2(5000);
Heater heater1;
Heater heater2;
Register reg2(13,12,11);
Light light_switch;
Data EC1(10);
Data EC2(10);
Data EC3(10);
Data EC4(10);
Data_v2 pH1(10);
Data_v2 pH2(10);
double T1;
double T2;
double T3;
double T4;
unsigned long sec;
unsigned long Ttime = 0;
OneWire oneWire(7); 
DallasTemperature sensors(&oneWire);


void setup()
{
    Serial.begin(9600);
    feeder1.init(feeder::Disable_onpulse , feeder::CW , 200);
    feeder2.init(feeder::Disable_onpulse , feeder::CW , 100);
    reg1.init();
    reg1.clearMode(true);
    reg1.connect(Register::Q7 , feeder1.getenable());
    reg1.connect(Register::Q6 , feeder1.getdirection());
    reg1.connect(Register::Q5 , feeder1.getpulse());
    reg1.connect(Register::Q4 , feeder2.getenable());
    reg1.connect(Register::Q3 , feeder2.getdirection());
    reg1.connect(Register::Q2 , feeder2.getpulse());
    cleaner1.set_max_clean_time(900000);
    cleaner2.set_max_clean_time(900000);
    heater1.set_max_temp_offline(25);
    heater1.set_min_temp_offline(22);
    heater2.set_max_temp_offline(25);
    heater2.set_min_temp_offline(22);
    heater1.change_connection_mode(false);
    heater2.change_connection_mode(false);
    reg2.init();
    reg2.clearMode(true);
    reg2.connect(Register::Q5 , cleaner1.get_scan_flag());
    reg2.connect(Register::Q7 , cleaner1.get_fan_flag());
    reg2.connect(Register::Q4 , cleaner2.get_scan_flag());
    reg2.connect(Register::Q6 , cleaner2.get_fan_flag());
    reg2.connect(Register::Q3 , light_switch.get_flag());
    reg2.connect(Register::Q1 , heater1.get_flag());
    reg2.connect(Register::Q2 , heater2.get_flag());
    EC1.set_max_volt(5.0);
    EC2.set_max_volt(5.0);
    EC3.set_max_volt(5.0);
    EC4.set_max_volt(5.0);
    pH1.set_max_volt(5.0);
    pH2.set_max_volt(5.0);
    EC1.Set_readPin(A0);
    EC2.Set_readPin(A1);
    EC3.Set_readPin(A2);
    EC4.Set_readPin(A3);
    pH1.Set_readPin(A4);
    pH2.Set_readPin(A5);
    EC1.Set_tregerPin(2);
    EC2.Set_tregerPin(3);
    EC3.Set_tregerPin(6);
    EC4.Set_tregerPin(5);
    // pH1.Set_tregerPin(12);
    // pH2.Set_tregerPin(13);
    EC1.init();
    EC2.init();
    EC3.init();
    EC4.init();
    pH1.init();
    pH2.init();
    sensors.begin(); 
}
void loop()
{
    String Str_read;
    sec = millis();
    remoteOrder.Set_order();
    String  the_order = remoteOrder.Get_order_without_Limites();
    if(the_order == "C-MFR")
    {
        feeder2.setenable(false);
        feeder2.setpulse(false);
        feeder2.setdirection(false);
        feeder1.run();
        //feeder1.setenable(true);
    }
    else if(the_order == "C-MfR")
    {
        feeder2.run();
        //feeder2.setenable(true);
    }
    else if(the_order == "C-MFS")
    {
        feeder1.stop();
    }
    else if(the_order == "C-MfS")
    {
        feeder2.stop();
    }
    else if(the_order == "C-MCR")
    {
        cleaner1.switch_cleaner_on(sec);
    }
    else if(the_order == "C-McR")
    {
        cleaner2.switch_cleaner_on(sec);
    }
    else if(the_order == "C-MCS")
    {
        cleaner1.switch_cleaner_off();
    }
    else if(the_order == "C-McS")
    {
        cleaner2.switch_cleaner_off();
    }
    else if(the_order == "C-HPR")
    {
        heater1.Switch_on();
        heater1.change_connection_mode(true);
    }
    else if(the_order == "C-hpR")
    {
        heater2.Switch_on();
        heater2.change_connection_mode(true);
    }
    else if(the_order == "C-HPS")
    {
        heater1.Switch_off();
        heater1.change_connection_mode(false);
    }
    else if(the_order == "C-hpS")
    {
        heater2.Switch_off();
        heater2.change_connection_mode(false);
    }
    else if(the_order == "N-CON")
    {
        heater1.change_connection_mode(false);
        heater2.change_connection_mode(false);
        feeder1.stop();
        feeder2.stop();
        cleaner1.switch_cleaner_off();
        cleaner2.switch_cleaner_off();
    }
    else if(the_order == "S-F")
    {
        feeder1.speedChange(static_cast<unsigned int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-f")
    {
        feeder2.speedChange(static_cast<unsigned int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-HX")
    {
        heater1.set_max_temp_offline(static_cast<int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-hX")
    {
        heater2.set_max_temp_offline(static_cast<int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-HM")
    {
        heater1.set_min_temp_offline(static_cast<int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-hM")
    {
        heater2.set_min_temp_offline(static_cast<int>(remoteOrder.Get_number()));
    }
    else if(the_order == "S-CT")
    {
        unsigned long x = static_cast<unsigned long>(remoteOrder.Get_number());
        x *= 1000;
        cleaner1.set_max_clean_time(x);
    }
    else if(the_order == "S-ct")
    {
        unsigned long x = static_cast<unsigned long>(remoteOrder.Get_number());
        x *= 1000;
        cleaner2.set_max_clean_time(x);
    }
    else if(the_order == "C-LSR")
    {
        light_switch.switch_light_on();
    }
    else if(the_order == "C-LSS")
    {
         light_switch.switch_light_off();
    }
    else if(the_order == "D-EC1")
    {
        Str_read = '$';
        Str_read += String(EC1.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-EC2")
    {
        Str_read = '$';
        Str_read += String(EC2.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-EC3")
    {
        Str_read = '$';
        Str_read += String(EC3.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-EC4")
    {
        Str_read = '$';
        Str_read += String(EC4.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-pH1")
    {
        Str_read = '$';
        Str_read += String(pH1.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-pH2")
    {
        Str_read = '$';
        Str_read += String(pH2.read_volt(sec));
        Str_read += '$';
        // Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-TT1")
    {
        Str_read = '$';
        Str_read += String(T1);
        Str_read += '$';
        Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-TT2")
    {
        Str_read = '$';
        Str_read += String(T2);
        Str_read += '$';
        Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-TT3")
    {
        Str_read = '$';
        Str_read += String(T3);
        Str_read += '$';
        Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "D-TT4")
    {
        Str_read = '$';
        Str_read += String(T4);
        Str_read += '$';
        Serial.print(Str_read);
        // Serial.flush();
    }
    else if(the_order == "C-FF")
    {
        //careful here a simi fixed bug
        feeder2.setenable(false);
        feeder2.setpulse(false);
        feeder2.setdirection(false);
        feeder1.run(remoteOrder.Get_number());
    }
    else if(the_order == "C-Ff")
    {
        feeder2.run(remoteOrder.Get_number());
    }
    if(sec > Ttime)
    {
        Ttime = sec + 10000;
        sensors.requestTemperatures();
        T1=sensors.getTempCByIndex(0);
        T2=sensors.getTempCByIndex(1);
        T3=sensors.getTempCByIndex(2);
        T4=sensors.getTempCByIndex(3);
    }
    EC1.update(sec);
    EC2.update(sec);
    EC3.update(sec);
    EC4.update(sec);
    pH1.update(sec);
    pH2.update(sec);
    feeder1.update(sec);
    feeder2.update(sec);
    reg1.update(sec);
    cleaner1.update(sec);
    cleaner2.update(sec);
    heater1.update(T1);
    heater2.update(T2);
    reg2.update(sec);
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
