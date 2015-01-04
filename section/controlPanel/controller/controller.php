<?php

if (PHPauthorization::rootName() !== $arROOT[LOGIN]) {
    header('Location: /rootAutorization', true, 303);
    exit;
}

/*
1.0 простой интерфейс, добавлениие материала
1.1 редактирование материала
1.2 корзина
1.3 контент блоки

2.0 новый интерфейс
2.1 файл менеджер
2.11 добавлена инициализация таблиц
2.12 добавлен модуль динамики посещений
2.13 добавлен компонент PHPcontentGetbyID
2.14 добавлен компонент PHPfeedback, добавлен фильтр количества редактируемых записей
2.15 добавлена фотогалеря и комоненты галереи


*/
$version = '2.15'; // версия продукта

$PHPdatabase = new PHPdatabase;
$PHPdatabase->connect($arDataBase);

/* маршрутиризация */

if (htmlspecialchars($_GET[element])) {

    switch (htmlspecialchars($_GET[element])) {
        case 'add_post':

            $CONTROLLER_PAGE = "add_post";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_add_post.php';

            break;

        case 'content_block':

            $CONTROLLER_PAGE = "content_block";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_content_block.php';

            break;

        case 'edit_post':

            $CONTROLLER_PAGE = "edit_post";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_edit_post.php';

            break;

        case 'content_block_edit':

            $CONTROLLER_PAGE = "content_block_edit";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_content_block_edit.php';

            break;

        case 'file_manager':

            $CONTROLLER_PAGE = "file_manager";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_file_manager.php';

            break;

        case 'init':

            $CONTROLLER_PAGE = "init";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_init.php';

            break;

        case 'feedback':

            $CONTROLLER_PAGE = "feedback";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_feedback.php';

            break;

        case 'galleries':

            $CONTROLLER_PAGE = "galleries";
            include $_SERVER[DOCUMENT_ROOT] . '/section/controlPanel/controller/controller_galleries.php';

            break;
    }

} else {
    $CONTROLLER_PAGE = NULL;
}# end Router






