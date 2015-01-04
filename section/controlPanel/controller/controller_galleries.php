<?php

$PHPgalleries = new PHPgalleries;

$PHPgalleries->add($arDataBase);


if($PHPgalleries->id){
    $arParamSection[title] = 'Галерея:: Управление';

}else{

    $arParamSection[title] = 'Создание галереи';
    if($PHPgalleries->edit){
        $arParamSection[title] = 'Галерея:: Список галерей';
    }
}



/* Контроллер ошибок */
if($_POST[action]) {

    if (!$_POST[title]) {
        $title_error = 'class_form_error';
    } else {
        $title_error = 'title_form';
    }

}