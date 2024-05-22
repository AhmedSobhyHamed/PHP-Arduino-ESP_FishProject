<?php

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


@(include("manoDB.php")) or die("file not found");

$action = $_SERVER['PHP_SELF'];

$pretable = $_POST['selecttable'];
$prerange = $_POST['selectpagenum'];
$pagenum  = $_POST['pagenum'];
if(isset($_POST['submit']))
{
    if($_POST['submit'] === 'query')
    {
        if(isset($_POST['selectpagenum']))
        {
            $pagenum = $_POST['selectpagenum'];
        }
    }
}

function theselectors($theformname)
{
    $theverb=<<<_my_name_is_ahmed
    <label for="selecttable">Choose a data you want query it:</label>
    <select name="selecttable" id="selecttable" autofocus required form="$theformname">
        <option value="orders buffer">orders buffer</option>
        <option value="operations">operations</option>
        <option value="all date">all date</option>
        <option value="EC1">EC tank 1</option>
        <option value="EC2">EC tank 2</option>
        <option value="EC3">EC plant area 1</option>
        <option value="EC4">EC plant area 2</option>
        <option value="pH1">pH1 tank 1</option>
        <option value="pH2">pH2 tank 2</option>
        <option value="TEMPERATURES 1">TEMPERATURES tank 1</option>
        <option value="TEMPERATURES 2">TEMPERATURES tank 2</option>
        <option value="TEMPERATURES 3">TEMPERATURES plant area 1</option>
        <option value="TEMPERATURES 4">TEMPERATURES plant area 2</option>
    </select>
    <label for="selectpagenum">Number of rows: :</label>
    <select name="selectpagenum" id="selectpagenum" required form="$theformname">
        <option value="25" selected>25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
    </select>
_my_name_is_ahmed;
return $theverb;
}

function theselectform()
{
    $theverb  = '<div class = "data_form">';
    $theverb .= theselectors("theselectform");
    $theverb .=<<<_bikatchoo
    <form action="$action" method = "post" id="theselectform">
        <input type="hidden" name="PAGE" value="#4hza">
        <button type="submit" class="TheLink" name="submit" value="query">
        query
        </button>
        <button type="submit" class="TheLink" name="submit" value="pirior">
        <
        </button>
        --
        <button type="submit" class="TheLink" name="submit" value="next">
        >
        </button>
    </form>
_bikatchoo;
    $theverb .= "</div>";
return $theverb;
}

function create_table($datarows)
{
    $tablebody = "";
    foreach($datarows as $row)
    {
        $tablebody .= "<tr>";
        foreach($row as $cell)
        {
            $tablebody .= "<td>";
            $tablebody .= htmlspecialchars($cell); 
            $tablebody .= "</td>";
        }
        $tablebody .= "</tr>";
    }
    return $tablebody;
}

function tablehead($type)
{
    $robbin = "";
    if($type === "order")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>orders buffer</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>operat simbol (order)</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "operation")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>operations</caption>
            <thead>
                <tr>
                    <th>operation name</th>
                    <th>send time</th>
                    <th>replay time</th>
                    <th>time between send and receave (second)</th>
                    <th>is receaved answer</th>
                    <th>operat index</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ec1")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>EC1</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>EC value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ec2")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>EC2</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>EC value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ec3")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>EC3</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>EC value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ec4")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>EC4</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>EC value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ph1")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>pH1</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>pH value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "ph2")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>pH2</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>readed Volt</th>
                    <th>a argument</th>
                    <th>b argument</th>
                    <th>read time</th>
                    <th>pH value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "t1")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>Temperature 1</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>read time</th>
                    <th>temperature value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "t2")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>Temperature 2</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>read time</th>
                    <th>temperature value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "t3")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>Temperature 3</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>read time</th>
                    <th>temperature value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "t4")
    {
        $robbin .=<<<_onepeice
        <table>
            <caption>Temperature 4</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>read time</th>
                    <th>temperature value</th>
                </tr>
            </thead>
            <tbody>
_onepeice;
    }
    elseif($type === "data")
    {
        $robbin .=<<<AhmedSobhy
        <table>
            <caption>Data Record</caption>
            <thead>
                <tr>
                    <th>operat index</th>
                    <th>read time</th>
                    <th>EC Tank 1</th>
                    <th>EC Tank 2</th>
                    <th>EC Aqua 1</th>
                    <th>EC Aqua 2</th>
                    <th>pH Tank 1</th>
                    <th>pH Tank 2</th>
                    <th>Temp Tank 1</th>
                    <th>Temp Tank 2</th>
                    <th>Temp Aqua 1</th>
                    <th>Temp Aqua 2</th>
                </tr>
            </thead>
            <tbody>
AhmedSobhy;
    }
    return $robbin;
}

function tablebody($segma ,$stt , $stp)
{
    $tablebody = "";
    if($segma === 'orders buffer')
    {
        $tablebody .=tablehead("order");
        $tablebody .=create_table(get_table("orders_buffer" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'operations')
    {
        $tablebody .=tablehead("operation");
        $tablebody .=create_table(get_table("operations" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'all date')
    {
        $tablebody .=tablehead("data");
        $varec1 = get_table("EC1" , $stt , $stp); //045
        $varec2 = get_table("EC2" , $stt , $stp);
        $varec3 = get_table("EC3" , $stt , $stp);
        $varec4 = get_table("EC4" , $stt , $stp);
        $varph1 = get_table("pH1" , $stt , $stp); //5
        $varph2 = get_table("pH2" , $stt , $stp);
        $vart1  = get_table("T1" , $stt , $stp);  //2
        $vart2  = get_table("T2" , $stt , $stp);
        $vart3  = get_table("T3" , $stt , $stp);
        $vart4  = get_table("T4" , $stt , $stp);
        $vardata = array();
        for($co =0 ; $co < count($varec1) ; $co++)
        {
            $varrow = array();
            array_push($varrow , $varec1[$co][0]);
            array_push($varrow , $varec1[$co][4]);
            array_push($varrow , $varec1[$co][5]);
            array_push($varrow , $varec2[$co][5]);
            array_push($varrow , $varec3[$co][5]);
            array_push($varrow , $varec4[$co][5]);
            array_push($varrow , $varph1[$co][5]);
            array_push($varrow , $varph2[$co][5]);
            array_push($varrow , $vart1[$co][2]);
            array_push($varrow , $vart2[$co][2]);
            array_push($varrow , $vart3[$co][2]);
            array_push($varrow , $vart4[$co][2]);
            array_push($vardata , $varrow);
        }
        $tablebody .=create_table($vardata);
        $tablebody .="</tbody>\n</table>";
        // get_table("operations" , 0 , $stp);
    }
    elseif($segma === 'EC1')
    {
        $tablebody .=tablehead("ec1");
        $tablebody .=create_table(get_table("EC1" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'EC2')
    {
        $tablebody .=tablehead("ec2");
        $tablebody .=create_table(get_table("EC2" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'EC3')
    {
        $tablebody .=tablehead("ec3");
        $tablebody .=create_table(get_table("EC3" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'EC4')
    {
        $tablebody .=tablehead("ec4");
        $tablebody .=create_table(get_table("EC4" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'pH1')
    {
        $tablebody .=tablehead("ph1");
        $tablebody .=create_table(get_table("pH1" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'pH2')
    {
        $tablebody .=tablehead("ph2");
        $tablebody .=create_table(get_table("pH2" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";
    }
    elseif($segma === 'TEMPERATURES 1')
    {
        $tablebody .=tablehead("t1");
        $tablebody .=create_table(get_table("T1" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";

    }
    elseif($segma === 'TEMPERATURES 2')
    {
        $tablebody .=tablehead("t2");
        $tablebody .=create_table(get_table("T2" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";

    }
    elseif($segma === 'TEMPERATURES 3')
    {
        $tablebody .=tablehead("t3");
        $tablebody .=create_table(get_table("T3" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";

    }
    elseif($segma === 'TEMPERATURES 4')
    {
        $tablebody .=tablehead("t4");
        $tablebody .=create_table(get_table("T4" , $stt , $stp));
        $tablebody .="</tbody>\n</table>";

    }
    return $tablebody;
}

function thetables()
{
    $pretable = $_POST['pretable'];
    $prerange = $_POST['prerange'];
    $pagenum  = $_POST['pagenum'];
    $tablebody ="";
    if(isset($_POST['submit']))
    {
        if($_POST['submit'] === 'query')
        {
            $pretable = $_POST['selecttable'];
            $prerange = $_POST['selectpagenum'];
            $pagenum  = $_POST['selectpagenum'];
            if(isset($_POST['selectpagenum']))
            {
                $torow = $_POST['selectpagenum'];
            }
            if(isset($_POST['selecttable']))
            {
                $tablebody = tablebody($_POST['selecttable'] , 0 , $torow);
            }
            $tablebody .=<<<_glogloglo
            <input form="theselectform" type="hidden" name="pretable" value="$pretable">
            <input form="theselectform" type="hidden" name="prerange" value="$prerange">
            <input form="theselectform" type="hidden" name="pagenum" value="$pagenum">
_glogloglo;
        }
        elseif($_POST['submit'] === 'next')
        {
            $tablebody =tablebody($pretable , $pagenum , $prerange);
            $pagenum = $pagenum+$prerange;
            $tablebody .=<<<_glogloglo
            <input form="theselectform" type="hidden" name="pretable" value="$pretable">
            <input form="theselectform" type="hidden" name="prerange" value="$prerange">
            <input form="theselectform" type="hidden" name="pagenum" value="$pagenum">
_glogloglo;
        }
        elseif($_POST['submit'] === 'pirior')
        {
            $tablebody =tablebody($pretable , $pagenum-$prerange , $prerange);
            $pagenum = $pagenum-$prerange;
            $tablebody .=<<<_glogloglo
            <input form="theselectform" type="hidden" name="pretable" value="$pretable">
            <input form="theselectform" type="hidden" name="prerange" value="$prerange">
            <input form="theselectform" type="hidden" name="pagenum" value="$pagenum">
_glogloglo;
        }
    }
    return $tablebody;
}

$title = "Data Base";

$the_nav =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#1hza">
<button type="submit" class="TheLink">
< back
</button>
</form>
$title
 <p></p>
_content;

$before =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#5hza">
<button type="submit" class="TheLink">
<
</button>
</form>

_content;
$after =<<<_content
<form action="$action" method="post" class="">
<input type="hidden" name="PAGE" value="#3hza">
<button type="submit" class="TheLink">
>
</button>
</form>

_content;

$main_content  = "\n";
$main_content .= theselectform();
$main_content .= thetables();

$links = <<<_content
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/Links.css">
<link rel="stylesheet" href="css/tables.css">
<style>
.the_nav {
    justify-content: left;
    text-indent: 1em;
}
#theselectform {
    display: inline-block;
}
</style>
_content;


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
