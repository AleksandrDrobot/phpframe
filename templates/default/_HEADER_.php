<?php
############################################
#                                          #
# Компонент для подключения тегов в head   #
# Просто пропишите мета теги               #
# 2014                                     #
#                                          #
############################################


$META_TEG = 'OFF';  // включаем отображение ON, выключаем OFF

$header_meta = '

<META HTTP-EQUIV="Content-Type"Content="text/html; Charset=Windows-1251">
<meta name="description" content="описание страницы">
<meta name="keywords" content="ключевые слова через запятую">
<meta name="author" content="автор">
<meta name="copyright" content="авторские права">

';
if($META_TEG == 'OFF') { unset($header_meta); }
if($META_TEG == 'ON')  { print $header_meta;  }

