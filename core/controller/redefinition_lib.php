<?php if($_ENGIINE_KEY_ACCESS)

/****** Динамическое подключение js библиотек разделов *********/


$dir_lib = $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/library/js/'; // путь к библиотеке

$dir_php_lib = scandir($dir_lib); // сканируем дирректорию

$count_file = 1; // начинаем листинг с первого файла

while ($count_file < count($dir_php_lib)) {
    $count_file++; // выводим файлы в цикле
    
    if ($dir_php_lib[$count_file] !== 'index.html' AND strstr($dir_php_lib[$count_file], 'js')) { // фильтруем файлы
    print '
    <script type="text/javascript" language="JavaScript" src="/section/'.$request_.'/library/js/'.$dir_php_lib[$count_file].'"></script>'; 
 
            
    }
    
}


/****** Динамическое подключение css библиотек разделов *********/


$dir_lib = $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/library/css/'; // путь к библиотеке

$dir_php_lib = scandir($dir_lib); // сканируем дирректорию

$count_file = 1; // начинаем листинг с первого файла

while ($count_file < count($dir_php_lib)) {
    $count_file++; // выводим файлы в цикле
    
    if ($dir_php_lib[$count_file] !== 'index.html' AND strstr($dir_php_lib[$count_file], 'css')) { // фильтруем файлы   
    print '
    <link href="/section/'.$request_.'/library/css/'.$dir_php_lib[$count_file].'" type=text/css rel=stylesheet>';
             
    }
    
}