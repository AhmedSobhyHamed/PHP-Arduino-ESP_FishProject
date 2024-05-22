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

#ifndef __REQUEST__
#define __REQUEST__

#include<Arduino.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

class Request
{
private:
    WiFiClient client;
    HTTPClient http;

    String request;
    unsigned long requst_number;
    String domain_name;
    String Get_name;
    String Get_value_request;
    String Get_value_confirm;
    unsigned long send_time;
    unsigned long time_between;
    String Start_answer;
public:
    Request();
    //http://xxxx.xxx
    void set_domain(String);
    //domain/?NAME=vale
    void set_device_name(String);
    //domain/?name=VALUE
    void set_request_address(String);
    //domain/?name=VALUE
    void set_confirm_address(String);
    //interval between every request
    void set_period(unsigned long);
    //send request (time now)
    //and store order and process number
    void send_request(unsigned long);
    //return order that recived
    String get_order();
    //add character as a limites to the order
    String get_order_with_limits(char);
    //send a confirm to server that the order is receved 
    //send only when there is an order in buffer 
    //(don't worry about over use it)
    //accept string like:
    // "order=done+process=number"
    // "order=hi"
    // "order=data+EC1=value+Ec2=value...."
    void send_confirm(String);
    //to connect to server and get answer 
    void get_answer(String);
    String StartAnswer(char);

};

#endif //__REQUEST__

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
