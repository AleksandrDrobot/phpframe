<?php

$PHPfile = new PHPfile;
$PHPviewfiles = new PHPviewfiles;
$PHPviewfiles->view();
$PHPfile->add();
$PHPfile->del();

$PHPfile->del = htmlspecialchars($_GET[dell]);




$arParamSection[title] = 'Файловый менеджер';

$model = htmlspecialchars($_GET[type]); 

if($model == 'a') { $arParamSection[title] = $arParamSection[title].' :: Архивы'; }
if($model == 'm') { $arParamSection[title] = $arParamSection[title].' :: Медиа-файлы'; }
if($model == 's') { $arParamSection[title] = $arParamSection[title].' :: Системные-файлы'; }


if($model) { $model = 'list'; }  // модель отображения