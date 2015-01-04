<?php

/*

core.php
ядро проекта. 


*/

session_start();
header("Content-Type: text/html; charset=utf-8");

$_ENGIINE_KEY_ACCESS = rtue;

require_once $_SERVER[DOCUMENT_ROOT] . '/core/library/php/path.php';
/* Конфигурация */
require_once ___CONFIG;
require_once ___CONFIG_BD;
/* Библиотеки */
require_once ___LIBRARY_PHP_SYSTEM;
/* Инициализатор классов */
require_once ___INITIALIZER;
/* Системный текст */
require_once ___SYSTEM_TEXT;
/* Маршруторизатор */
require_once ___MARSHRUTIRIZATOR;
/* библиотеки */
require_once ___LIBRARY_PHP_SECTION;
/* Конфигурация */
require_once $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/config/config.php';
/* Текстовые строки разделов */
require_once $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/message/text.php';
/* Контроллер */
require_once $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/controller/controller.php';

/*************  Сборка веб-страницы  *****************/
$_SESSION[SITE_CONTENT] = 'this-site'; // создаем окружение сайта

print '<!DOCTYPE html><html><head>';
/* подключение дополнительных тегов в хедер */
$custom_header = '/templates/' . $arParamSection[template] . '/_HEADER_.php';
if (file_exists($_SERVER[DOCUMENT_ROOT] . $custom_header)) {
    require_once $_SERVER[DOCUMENT_ROOT] . $custom_header;
}
/* frontend библиотеки */
require_once ___FRONTEND_LIB;
require_once ___REDIFINITION_FRONTEND_LIB;
#AND
print'<title>' . $arParamSection[title] . '</title>';
print'</head><body>';

/* Динамическая визуализация */
require_once $_SERVER[DOCUMENT_ROOT] . '/templates/' . $arParamSection[template] . '/header.tpl';
require_once $_SERVER[DOCUMENT_ROOT] . '/section/' . $request_ . '/view.php';
require_once $_SERVER[DOCUMENT_ROOT] . '/templates/' . $arParamSection[template] . '/footer.tpl';
#AND
/* Файл для счетчиков */
require_once ___METRIKA;
print'</body></html>';

unset($_SESSION[SITE_CONTENT]); // очищаем окружение сайта

exit();






