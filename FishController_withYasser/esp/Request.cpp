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


#include"Request.h"

Request::Request()
{
    requst_number = 0;
    request = "";
    domain_name = "http://haidi-m.ash-laboratory.com/";
    Get_name = "ash008";
    Get_value_request = "h50qtzwpsa002FFd4qo9s";
    Get_value_confirm = "h28qtzwpsa133FFd5qo8s";
    send_time = 0;
    time_between = 0;
}

void Request::set_domain(String s)
{
    domain_name = s;
}

void Request::set_device_name(String s)
{
    Get_name = s;
}

void Request::set_request_address(String s)
{
    Get_value_request = s;
}

void Request::set_confirm_address(String s)
{
    Get_value_confirm = s;
}

void Request::set_period(unsigned long s)
{
    time_between = s;
}

void Request::send_request(unsigned long s)
{
    if(s > (time_between+send_time))
    {
        String tmp_s = domain_name;
        tmp_s += String("/?") + Get_name + String("=") + Get_value_request;
        http.begin(client, tmp_s.c_str());
        int response = http.GET();
        if(response > 0)
        {
            send_time = s;
            request = http.getString();
            http.end();
            String ss = "";
            int from = 0;
            for (int i = 0; i < request.length(); i++)
            {
                if(request[i] == '|')
                {
                    from = i;
                    break;
                }
                ss += request[i];
            }
            String num = "";
            for (int i = from; i < request.length(); i++)
            {
                if(request[i] >= 48 && request[i] <= 57)
                {
                    num += request[i];
                }
            }
            requst_number = static_cast<unsigned long>(num.toInt());
            request = ss;
        }
        else
        {
            http.end();
            requst_number = 0;
            request = "No con";
        }
    }
}

String Request::get_order()
{
    if(request.indexOf('-')==1)
    {
        String SS = request;
        request = "";
        return SS;
    }
    if(request == "No con")
    {
        request = "";
        return "No con";
    }
    if(request == "hi")
    {
        request = "";
        return "hi";
    }
    return "";
}

String Request::get_order_with_limits(char C)
{
    String S = get_order();
    if(!(S == ""  || S == "No con"))
    {
        String SS = String(C);
        SS += S;
        SS += C;
        return SS;
    }
    return S;
}

void Request::send_confirm(String S)
{
    if(!(S == ""  || S == "No con"))
    {
        String tmp_s = domain_name;
        tmp_s += String("/?") + Get_name + String("=") + Get_value_confirm;
        tmp_s += "&process="+String(requst_number)+"&"+S;
        http.begin(client, tmp_s.c_str());
        http.GET();
        http.end();
    }
}

void Request::get_answer(String link)
{
    String tmp_s = domain_name;
    tmp_s += String("/?") + link;
    http.begin(client, tmp_s.c_str());
    int response = http.GET();
    if(response > 0)
    {
        Start_answer = http.getString();
    }
    http.end();
}

String Request::StartAnswer(char limits)
{
    String tmp = String(limits);
    if (Start_answer.length() > 0)
    {
        for(int i=0 ; i<Start_answer.length() ; i++)
        {
            if(Start_answer[i] != '|')
            {
                tmp += Start_answer[i];
            }
            else if(Start_answer[i] == '|')
            {
                String xxx = "";
                for(int j=i+1 ; j<Start_answer.length() ; j++)
                {
                    xxx += Start_answer[j];
                }
                Start_answer = xxx;
                tmp += limits;
                return tmp;
            }
        }
    }
    return "";
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
