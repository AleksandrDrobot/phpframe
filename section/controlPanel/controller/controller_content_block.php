<?
$PHPdatabase = new PHPdatabase;
$PHPdatabase->connect($arDataBase);
$arParamSection[title] = "Контент-блоки";


$PHPcontentBlock = new PHPcontentBlock;
$PHPcontentBlock->add($arDataBase);

$PHPcontentBlock->sql = $PHPcontentBlock->view($arDataBase);

/* Контроллер ошибок */
if($_POST[action]) {

if(!$_POST[title])      {  $title_error      =  'class_form_error';      } else {  $title_error      = 'title_form'; }

     }else{
     	
 $title_error      = 'title_form';

     }

$PHPcontentBlock->add = htmlspecialchars($_GET[add]);
$PHPcontentBlock->del = htmlspecialchars($_GET[del_comp]); 

$PHPcontentBlock->delete();