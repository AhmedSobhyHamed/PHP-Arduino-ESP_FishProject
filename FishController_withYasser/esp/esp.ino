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

#include<ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include"Request.h"
#include"Order.h"


const char ssid[] =  "Etisalat 4G iModem-1EF8";
const char pswd[] = "22308930";
const char ssid1[] =  "Redmi 9";
const char pswd1[] = "6699ieee"; 

int req_count =0;
void LDR_and_Light(unsigned long);
int LDR_value =125;
unsigned long update_connection = 0;
const unsigned long disconnect_time   = 60000;
unsigned long lasttimelight = 0;
const unsigned long lighttime = 30000UL;

Request Server;

void setup()
{
    Serial.begin(9600);
    WiFi.begin(ssid, pswd);
    int tmp_count =0;

    int n = WiFi.scanNetworks();
    for (int i = 0; i < n; ++i)
    {
        if (WiFi.SSID(i)== ssid )
        {
            WiFi.begin(ssid,pswd); 
            break;
        }
        if (WiFi.SSID(i)== ssid1)
        {
            WiFi.begin(ssid1,pswd1);
            break;
        }
    }
    do{
        if(tmp_count++ > 13)
        {
            Serial.print("$N-CON$");
            // Serial.flush();
            delay(100);
            ESP.reset();
        }
        delay(1000);
    }while(WiFi.status() != WL_CONNECTED);
    
    //Serial.println(WiFi.localIP());
    Server.set_domain("http://haidi-m.ash-laboratory.com");
    Server.set_period(15000);
    Server.set_device_name("ash008");
    Server.set_request_address("h50qtzwpsa002FFd4qo9s");
    Server.set_confirm_address("h28qtzwpsa133FFd5qo8s");
    Server.get_answer("ash008=h28qtzwpsasTd00d5qo8s");
    String SSS = Server.StartAnswer('$');
    while (SSS != "")
    {
        Serial.print(SSS);
        // Serial.flush();
        SSS = Server.StartAnswer('$');
        delay(100);
    }
    delay(2000);
}

void loop()
{
    unsigned long sec = millis();
    if(WiFi.status() != WL_CONNECTED)
    {
        Serial.print("$N-CON$");
        // Serial.flush();
        delay(1000);
        ESP.reset();
    }
    String answer;
    // send request and receave the amswer
    Server.send_request(sec);
    answer = Server.get_order_with_limits('$');
    if(answer != "No con")
    {
        if(answer == "$D-GDS$")
        {
            //data routine
            //EC1
            double EC1 =0;
            Serial.print("$D-EC1$");
            Order ord('$');
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                EC1 = ord.Get_double();
                if(EC1 != -1) // && EC1 != 0)
                {
                    break;
                }
                delay(1);
            }
            //EC2
            double EC2 =0;
            Serial.print("$D-EC2$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                EC2 = ord.Get_double();
                if(EC2 != -1) // && EC2 != 0)
                {
                    break;
                }
                delay(1);
            }
            //EC3
            double EC3 =0;
            Serial.print("$D-EC3$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                EC3 = ord.Get_double();
                if(EC3 != -1)// && EC3 != 0)
                {
                    break;
                }
                delay(1);
            }
            //EC4
            double EC4 =0;
            Serial.print("$D-EC4$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                EC4 = ord.Get_double();
                if(EC4 != -1)// && EC4 != 0)
                {
                    break;
                }
                delay(1);
            }
            //pH1
            double pH1 =0;
            Serial.print("$D-pH1$");
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                pH1 = ord.Get_double();
                if(pH1 != -1)// && pH1 != 0)
                {
                    break;
                }
                delay(1);
            }
            //pH
            double pH2 =0;
            Serial.print("$D-pH2$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                pH2 = ord.Get_double();
                if(pH2 != -1)// && pH2 != 0)
                {
                    break;
                }
                delay(1);
            }
            //T1
            double T1 =0;
            Serial.print("$D-TT1$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                T1 = ord.Get_double();
                if(T1 != -1)
                {
                    break;
                }
                delay(1);
            }
            //T2
            double T2 =0;
            Serial.print("$D-TT2$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                T2 = ord.Get_double();
                if(T2 != -1)
                {
                    break;
                }
                delay(1);
            }
            //T3
            double T3 =0;
            Serial.print("$D-TT3$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                T3 = ord.Get_double();
                if(T3 != -1)
                {
                    break;
                }
                delay(1);
            }
            //T4
            double T4 =0;
            Serial.print("$D-TT4$");
            // Serial.flush();
            while (1)
            {
                ord.Set_order();
                ord.Get_order_without_Limites();
                T4 = ord.Get_double();
                if(T4 != -1)
                {
                    break;
                }
                delay(1);
            }
            //gether info
            String themsg = "data&";
            themsg += "EC1="+String(EC1)+"&EC2="+String(EC2);
            themsg += "&EC3="+String(EC3)+"&EC4="+String(EC4);
            themsg += "&pH1="+String(pH1)+"&pH2="+String(pH2);
            themsg += "&T1="+String(T1)+"&T2="+String(T2);
            themsg += "&T3="+String(T3)+"&T4="+String(T4);
            Server.send_confirm(themsg);
        }
        else if(answer[1] == 'L')
        {
            //change light value
            String num;
            for (int i = 0; i < answer.length(); i++)
            {
                if(answer[i] >= 48 && answer[i] <= 57)
                {
                    num += answer[i];
                }
            }
            if(num.toInt() > 1020)
            {
                LDR_value = 1020;
            }
            else if(num.toInt() < 10)
            {
                LDR_value = 10;
            }
            else
            {
                LDR_value = num.toInt();
            }
            Server.send_confirm("done");
        }
        else if(answer == "$hi$")
        {
            //just confirm
            Server.send_confirm("hi");
        }
        else if(answer == "")
        {
            
        }
        else
        {
            //just send the order as it is
                        // if it "C-MFR" then start feeding1
                        // if it "C-MFS" then stop feeding1
                        // if it "C-MFR" then start feeding2
                        // if it "C-MFS" then stop feeding2
                        // if it "C-MCR" then start cleanning1
                        // if it "C-MCS" then stop cleanning1
                        // if it "C-MCR" then start cleanning2
                        // if it "C-MCS" then stop cleanning2
                        // if it "C-HPR" then start heating1
                        // if it "C-HPS" then stop heating1
                        // if it "C-HPR" then start heating2
                        // if it "C-HPS" then stop heating2
            Serial.print(answer);
            // Serial.flush();
            //and confirm
            Server.send_confirm("done");
        }
        //update connection
        update_connection = sec;
    }
    else if(sec > (update_connection+disconnect_time))
    {
        Serial.print("$N-CON$");
            // Serial.flush();
        update_connection = sec;
    }
    LDR_and_Light(sec);
}


void LDR_and_Light(unsigned long sec)
{
    if(sec > (lasttimelight+lighttime))
    { 
        lasttimelight = sec;
        int ldr =analogRead(0);
        //if LDR < value
        if(ldr < LDR_value)
        {
            //then open the light
            Serial.print("$C-LSR$");
            // Serial.flush();
        }
        else 
        {
            //close the light
            Serial.print("$C-LSS$");
            // Serial.flush();
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
