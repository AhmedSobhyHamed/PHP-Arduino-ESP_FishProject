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

#include"Order.h"

Order::Order(char lim): limits(lim) , order("") , order_flag(false) , number(-1)
{

}

void Order::Set_order()
{
    if(order_flag == false)
    {
        char spy = Serial.peek();
        if(spy != -1)
        {
            if(order.length() == 0 && spy == limits)
            {
                order += static_cast<char>(Serial.read());
            }
            else if(order.length() == 0 && spy != limits)
            {
                Serial.read();
            }
            else if(order.length() != 0 && spy == limits)
            {
                order_flag = true;
                order += static_cast<char>(Serial.read());
            }
            else
            {
                order += static_cast<char>(Serial.read());
            }
        }
    }

}

String Order::Get_order()
{
    if(order_flag == true)
    {
        order_flag = false;
        String ss;
        ss = "";
        for (int i = 0; i < order.length(); i++)
        {
            if(is_num(order[i]) == true)
            {
                ss += order[i];
            }
        }
        number = ss.toDouble();
        ss = "";
        for (int i = 0; i < order.length(); i++)
        {
            if(is_num(order[i]) == false)
            {
                ss += order[i];
            }
        }
        order = "";
        return ss;
    }
    return "do_nothing";
}

String Order::Get_order_without_Limites()
{
    String SS = Get_order();
    String value = "";
    for(int i = 0 ; i < SS.length() ; i++)
    {
        if(SS[i] != '$')
        {
            value += SS[i];
        }
    }
    return value;
}

int Order::Get_number()
{
    int n = static_cast<int>(number);
    number = -1;
    return n;
}

double Order::Get_double()
{
    double n = number;
    number = -1;
    return n;
}

bool Order::is_num(char c)
{
    if((c >= 48 && c <= 57) || c == 46)
    {
        return true;
    }
    return false;
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
