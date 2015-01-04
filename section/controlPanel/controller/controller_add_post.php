<?php

$arParamSection[title] = "Менеджер контента";

$PHPpostRoot = new PHPpostRoot;


$model = new PHPpostRoot;

$PHPpostRoot->add($arDataBase);


$PHPpostRoot->updatamsg    = htmlspecialchars($_POST[updatamsg]);


$on_of_loader = 'OFF'; // включаем прелоадер


/* Контроллер ошибок */
if($_POST[action]) {

if(!$_POST[title])      {  $title_error      =  'class_form_error';      } else {  $title_error      = 'title_form'; }
if(!$_POST[intotext])   {  $introtext_error  =  'class_form_error_text'; } else {  $introtext_error  = 'introtext';  }
if(!$_POST[fulltext])   {  $fulltext_error   =  'class_form_error_text'; } else {   $fulltext_error  = 'introtext';  }

     }else{

 $title_error      = 'title_form';
 $introtext_error  = 'introtext'; 
 $fulltext_error   = 'introtext';

     }









