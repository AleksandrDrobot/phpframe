<?php if($_ENGIINE_KEY_ACCESS)


print '<script type="text/javascript" src="/core/library/js/jquery.min.js"></script>';

/****** Динамическое подключение js библиотек шаблона *********/


$dir_lib = $_SERVER[DOCUMENT_ROOT] . '/templates/' . $arParamSection[template] . '/library/js/'; // путь к библиотеке

$dir_php_lib = scandir($dir_lib); // сканируем дирректорию

$count_file = 1; // начинаем листинг с первого файла

while ($count_file < count($dir_php_lib)) {
    $count_file++; // выводим файлы в цикле
    
    if ($dir_php_lib[$count_file] !== 'index.html' AND strstr($dir_php_lib[$count_file], 'js')) { // фильтруем файлы
    print '
    <script type="text/javascript" language="JavaScript" src="/templates/'.$arParamSection[template].'/library/js/'.$dir_php_lib[$count_file].'"></script>'; 
 
            
    }
    
}




/****** Динамическое подключение css библиотек шаблона *********/


$dir_lib = $_SERVER[DOCUMENT_ROOT] . '/templates/' . $arParamSection[template] . '/library/css/'; // путь к библиотеке

$dir_php_lib = scandir($dir_lib); // сканируем дирректорию

$count_file = 1; // начинаем листинг с первого файла

while ($count_file < count($dir_php_lib)) {
    $count_file++; // выводим файлы в цикле
    
    if ($dir_php_lib[$count_file] !== 'index.html' AND strstr($dir_php_lib[$count_file], 'css')) { // фильтруем файлы   
    print '
    <link href="/templates/'.$arParamSection[template].'/library/css/'.$dir_php_lib[$count_file].'" type=text/css rel=stylesheet>';
             
    }
    
}