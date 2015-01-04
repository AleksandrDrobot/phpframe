<?php if(!$_ENGIINE_KEY_ACCESS){exit();}?>

<?

$gallery = new PHPgallery;
$gallery->view($arDataBase,$arParamSection);




if($gallery->title) {
    $arParamSection[title] = $gallery->title;
}

$page_detail = $gallery->id;

