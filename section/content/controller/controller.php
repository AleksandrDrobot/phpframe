<?php if(!$_ENGIINE_KEY_ACCESS){exit();}

/* init */

$page = new PHPviewPostOnce;
$PHPcontentBlockView = new PHPcontentBlockView;
$page->view($arDataBase);

if(htmlspecialchars($_GET[page])){ $PAGE = 'view'; } // контроллер поведения



/* Формирование title */

if($PAGE) { 

           $arParamSection["title"] = $arParamSection["title"].' '.$page->title;
}else{
           $arParams = array("alias" => htmlspecialchars($_GET[block]), "page_link" => "N" );    
           $PHPcontentBlockView->view($arDataBase,$arParams);                                   
           $arParamSection["title"] = $arParamSection["title"].' : '.$PHPcontentBlockView->title_block;  
}