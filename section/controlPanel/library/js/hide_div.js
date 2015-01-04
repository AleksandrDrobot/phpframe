function hide_show()
{
    var div=document.getElementById("div").style.display;
    var link=document.getElementById("link").innerHTML;
    if(div=="")div="block";
 

    if(div=="none")
    {
        div="block";
        link="Скрыть";
    }
 
    else
    {
        div="none";
        link="";
    }
    document.getElementById("div").style.display=div;
    document.getElementById("link").innerHTML=link;
}