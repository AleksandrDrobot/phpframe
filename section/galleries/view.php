<?php if (!$_ENGIINE_KEY_ACCESS) exit(); ?>

<? if ($page_detail) { ?>
    <? include $_SERVER[DOCUMENT_ROOT] . '/section/galleries/view/view_gallery_info.tpl'; ?>
    <? $counter = 0; while ($view = mysql_fetch_array($gallery->img_list)) { $counter++; ?>
        <? include $_SERVER[DOCUMENT_ROOT] . '/section/galleries/view/view_gallery_list_img.tpl'; ?>
    <? } if($counter == 0) { $message->error($TEXT[2],''); } // если контент не найден ?>
<? } else { ?>
    <? while ($view = mysql_fetch_array($gallery->galleries_list)) { $counter++; ?>
        <? $gallery->add_img_galery_icon($arDataBase, $view[id]) ?>
        <? include $_SERVER[DOCUMENT_ROOT] . '/section/galleries/view/view_galleries.tpl'; ?>
    <? } if($counter == 0) { $message->error($TEXT[2],''); } // если контент не найден?>
    <?=$gallery->next_link?>
<?
}











   