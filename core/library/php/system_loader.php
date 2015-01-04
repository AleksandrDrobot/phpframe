<?php

/*

Класс системной предзагрузки страницы

*/

class PHPpreloaderSystem {

	var $css;
	var $js;
	var $html;


	function load_page($on_off, $second){

$this->css = "<style>#circularG{
position:relative;
width:128px;
height:128px;
margin-bottom: 20px;}
.circularG{
position:absolute;
background-color:#FFFFFF;
width:29px;
height:29px;
-moz-border-radius:19px;
-moz-animation-name:bounce_circularG;
-moz-animation-duration:1.04s;
-moz-animation-iteration-count:infinite;
-moz-animation-direction:linear;
-webkit-border-radius:19px;
-webkit-animation-name:bounce_circularG;
-webkit-animation-duration:1.04s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-direction:linear;
-ms-border-radius:19px;
-ms-animation-name:bounce_circularG;
-ms-animation-duration:1.04s;
-ms-animation-iteration-count:infinite;
-ms-animation-direction:linear;
-o-border-radius:19px;
-o-animation-name:bounce_circularG;
-o-animation-duration:1.04s;
-o-animation-iteration-count:infinite;
-o-animation-direction:linear;
border-radius:19px;
animation-name:bounce_circularG;
animation-duration:1.04s;
animation-iteration-count:infinite;
animation-direction:linear;
}
#circularG_1{
left:0;
top:50px;
-moz-animation-delay:0.39s;
-webkit-animation-delay:0.39s;
-ms-animation-delay:0.39s;
-o-animation-delay:0.39s;
animation-delay:0.39s;
}
#circularG_2{
left:14px;
top:14px;
-moz-animation-delay:0.52s;
-webkit-animation-delay:0.52s;
-ms-animation-delay:0.52s;
-o-animation-delay:0.52s;
animation-delay:0.52s;
}
#circularG_3{
top:0;
left:50px;
-moz-animation-delay:0.65s;
-webkit-animation-delay:0.65s;
-ms-animation-delay:0.65s;
-o-animation-delay:0.65s;
animation-delay:0.65s;
}
#circularG_4{
right:14px;
top:14px;
-moz-animation-delay:0.78s;
-webkit-animation-delay:0.78s;
-ms-animation-delay:0.78s;
-o-animation-delay:0.78s;
animation-delay:0.78s;
}
#circularG_5{
right:0;
top:50px;
-moz-animation-delay:0.91s;
-webkit-animation-delay:0.91s;
-ms-animation-delay:0.91s;
-o-animation-delay:0.91s;
animation-delay:0.91s;
}
#circularG_6{
right:14px;
bottom:14px;
-moz-animation-delay:1.04s;
-webkit-animation-delay:1.04s;
-ms-animation-delay:1.04s;
-o-animation-delay:1.04s;
animation-delay:1.04s;
}
#circularG_7{
left:50px;
bottom:0;
-moz-animation-delay:1.17s;
-webkit-animation-delay:1.17s;
-ms-animation-delay:1.17s;
-o-animation-delay:1.17s;
animation-delay:1.17s;
}
#circularG_8{
left:14px;
bottom:14px;
-moz-animation-delay:1.3s;
-webkit-animation-delay:1.3s;
-ms-animation-delay:1.3s;
-o-animation-delay:1.3s;
animation-delay:1.3s;
}
@-moz-keyframes bounce_circularG{
0%{
-moz-transform:scale(1)}
100%{
-moz-transform:scale(.3)}
}
@-webkit-keyframes bounce_circularG{
0%{
-webkit-transform:scale(1)}
100%{
-webkit-transform:scale(.3)}
}
@-ms-keyframes bounce_circularG{
0%{
-ms-transform:scale(1)}
100%{
-ms-transform:scale(.3)}
}
@-o-keyframes bounce_circularG{
0%{
-o-transform:scale(1)}
100%{
-o-transform:scale(.3)}
}
@keyframes bounce_circularG{
0%{
transform:scale(1)}
100%{
transform:scale(.3)}
}
.loader{
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #A7627E;
  text-align: center;
}

.loader span {
  display: block;
  margin-top: 200px;
  color: #fff;
  font-weight: bold;
}

.loader span:after{
  margin-top: 20px;
  content: 'php-fraMe';
}
</style>";


$this->js = "<script type='text/javascript' src='http://lib.php-frame.ru/interface/lib/action_/jquery.min.js'></script>";

$this->html = '<div class="loader"><div align="center"><span><div id="circularG"><div id="circularG_1" class="circularG"></div><div id="circularG_2" class="circularG"></div><div id="circularG_3" class="circularG"></div><div id="circularG_4" class="circularG"></div><div id="circularG_5" class="circularG"></div><div id="circularG_6" class="circularG"></div><div id="circularG_7" class="circularG"></div><div id="circularG_8" class="circularG"></div></div><br /></span> </div></div>';

/* Выводим на экран */

						if($on_off == 'ON' AND $on_off){

						print $this->js;?><script> setTimeout(function(){$('.loader').fadeOut('fast')},<?=$second?>000);</script><?// вывели js

						print $this->css;
						print $this->html;

						}

						/**/

						if($on_off !== 'OFF' AND $on_off){

						print $this->js;?><script> setTimeout(function(){$('.loader').fadeOut('fast')},<?=$second?>000);</script><?// вывели js

						print $this->css;
						print $this->html;

						}



	}#end load_page

}#end Class PHPpreloaderSystem


/* Краткая документация 


для инициализации класса используйте строку:  $PHPpreloaderSystem  = new PHPpreloaderSystem;

метод работы с классом: $PHPpreloaderSystem->load_page("ON","10");

первый аргумент - ON включено, OFF выключено
второй аргумент - время в секундах на протяжении которого будет работать прелоадер


*/