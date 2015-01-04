<?php if($_ENGIINE_KEY_ACCESS)

/****** Динамическое подключение php библиотек из ядра *********/


$dir_lib = $_SERVER[DOCUMENT_ROOT] . '/core/library/php/'; // путь к библиотеке

$dir_php_lib = scandir($dir_lib); // сканируем дирректорию

$count_file = 1; // начинаем листинг с первого файла

while ($count_file < count($dir_php_lib)) {
    $count_file++; // выводим файлы в цикле
    
    if ($dir_php_lib[$count_file] !== 'index.html' AND strstr($dir_php_lib[$count_file], 'php')) { // фильтруем файлы
        
        require_once $dir_lib . $dir_php_lib[$count_file];
        
    }
    
}