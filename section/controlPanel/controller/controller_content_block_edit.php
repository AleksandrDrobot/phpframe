<?php

$ContentBlock = new PHPeditContentBlock;
$ContentBlock->valBlock($arDataBase);

$arParamSection[title] = 'Контент блок: '.$ContentBlock->title;

$ContentBlock->add_block($arDataBase);
$ContentBlock->del_block($arDataBase);

$ContentBlock->valPost($arDataBase);
$ContentBlock->valPostInBlock($arDataBase);
$ContentBlock->switch_block();



