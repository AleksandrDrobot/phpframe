<div class="title_elem">
    <table>
        <tr>
            <td><img src="/section/controlPanel/library/images/mail.png"</td>
            <td><?$message->text($arParamSection[title],'title_')?></td>
        </tr>
    </table>
</div>
<?if($views){?>
<div class="feedback_view">
    <?php $counter = 0; while($view = mysql_fetch_array($code)){ $counter++; mysql_query ("UPDATE phpframe_feedback SET _viewed='Y' WHERE id='$view[id]' ")?>
        <span class="name"><?=$view[_name]?></span>
        <?=$view[_phone]?> <?=$view[_mail]?>  <span class="date_time"> <?$message->text($TEXT[69],'')?> <?=$view[_date]?> в <?=$view[_time]?></span>
        <span class="message"> <?=$view[_message]?> <?if($view[_mail]){?><a href="/?section=controlPanel&element=feedback&send=mail&adress=<?=$view[_mail]?>">Ответить</a><?}?></span>
    <?}?>
  <?if($counter == 0){?><br /><?$message->text($TEXT[68],'no_post')?> <?}?>
</div>
<?}else{?>
    <?if($PHPfeedback_view->send){?>
        <div id="div">
            <div class="complete">
                <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
                <?$message->text($TEXT[67], 'msg')?>
            </div>
        </div>
        <?}?>
    <form action="" method="post">
    <div class="send_mail">
        <table>
            <tr>
                <td><input type="email" name="adress" class="email" placeholder="e-mail" <?if($adress){?>disabled<?}?> value="<?=$adress?>" /></td>
                <td><input type="submit" name="action" class="button_form" value="Отправить" /></td>
            </tr>
        </table>
    <textarea placeholder="message" name="message"></textarea>
    </div>
        </form>
<?}?>