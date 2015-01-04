<?php if(!$_ENGIINE_KEY_ACCESS) exit(); 

# ----------------------------------- 
# phpframe                                   
# Компонент отображения материалов    
# 2014     
# Drobot Alex                              
# ----------------------------------- 

if(!$PAGE) { ?>

<?php /*Компонент контент блоков*/

$arParams = array(

	"alias"          => htmlspecialchars($_GET[block]), // алиас контент блока
	"path_templates" => "/templates/TEMP/view_content_block.tpl", // путь к шаблону вывода, если не задано, то используется стандартный
	"count_post"     => "2", // количество записей на обной странице
	"page_link"      => "Y", // отображать ссылку "Еще" Y - да, N - нет
	"text_all_link"  => $TEXT[2] // текст для ссылки еще

);

$PHPcontentBlockView = new PHPcontentBlockView;
$PHPcontentBlockView->view($arDataBase,$arParams);

#end content Block ?>

<? 

}else{ # -> this code -> HTML

include $_SERVER[DOCUMENT_ROOT].'/section/content/full_content.tpl'; // шаблон подробного просмотра 

if(!$page->title) { $message->error($TEXT[1],''); } // если контент не найден

}    ?>