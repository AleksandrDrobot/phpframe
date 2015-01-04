<?php
$PHPfeedback_view = new PHPfeedback_view;
$code = $PHPfeedback_view->view($arDataBase);
$PHPfeedback_view->send_mail();

if (htmlspecialchars($_GET[send]) !== 'mail') {  #
    $views = true;                                #
    $arParamSection[title] = 'Обратная связь';   # Контроллер поведения
} else {                                         #
    $arParamSection[title] = 'Отправить e-mail'; #
    if(htmlspecialchars($_GET[adress])){
        $adress = htmlspecialchars($_GET[adress]);
    }
}                                                #


