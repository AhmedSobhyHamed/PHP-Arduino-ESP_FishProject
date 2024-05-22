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

#ifndef __ORDER__
#define __ORDER__

#include<Arduino.h>

class Order
{
private:
    String order;
    char limits;
    bool order_flag;
    double number;
public:
    Order(char);
    void Set_order();
    String Get_order();
    int Get_number();
    double Get_double();
    String Get_order_without_Limites();
    bool is_num(char);
};



#endif //__ORDER__


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
