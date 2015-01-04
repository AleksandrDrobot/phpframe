<div class="title_elem">
<table>
	<tr>
		<td><?=$img?></td>
		<td><?$message->text($arParamSection[title],'title_')?></td>
        <td><form action="" method="post">



                <select name="count" onchange="if (this.selectedIndex) this.form.submit ()">

                    <option <?if(htmlspecialchars($_POST[count]) == 10){echo 'selected';}?> value=10">10 записей</option>
                    <option <?if(htmlspecialchars($_POST[count]) == 20){echo 'selected';}?> value="20">20 записей</option>
                    <option <?if(htmlspecialchars($_POST[count]) == 50){echo 'selected';}?> value="50">50 записей</option>
                    <option <?if(htmlspecialchars($_POST[count]) == 100){echo 'selected';}?> value="100">100 записей</option>
                    <option <?if(htmlspecialchars($_POST[count]) == 200){echo 'selected';}?> value="200">200 записей</option>
                    <option <?if(htmlspecialchars($_POST[count]) == 1000000){echo 'selected';}?> value="1000000">выгрузить все</option>

                </select>

            </form></td>
	</tr>
</table>
</div>




<?if($PHPeditPost->add){?>
 <div id="div">
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[24], 'msg')?>
 </div>
 </div>
 <?}?>


 <?if($PHPeditPost->dell_cart){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[27], 'msg')?>
 </div>
 </div>
 <?}?>


 <?if($PHPeditPost->add_post_cart){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[28], 'msg')?>
 </div>
 </div>
 <?}?>



 <?if($PHPeditPost->cart_unlink){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[34], 'msg')?>
 </div>
 </div>
 <?}?>

<div class="edit_post">


<table>
<tr class="edit_post_hover">
    <td></td>
	<td>Название</td>
    <td>ID</td>
	<td>Дата</td>
	<td>Вхождение в контент блок</td>
	<td>Статус</td>
	<td>Публикация на главной</td>
	<td>Предпросмотр</td>
	<td>Редактировать</td>

</tr>
    <?php
    /* Выводим в цикле */
    unset($_SESSION[post]); while ($view = mysql_fetch_array($PHPeditPost->sql))
    { $_SESSION[post] = 'Y';
        ?>

        <tr>
            <td class="icon_post"><img class="icon_post_img" src="/section/controlPanel/library/images/post_icon.png"></td>
            <td><a href="/?section=controlPanel&element=add_post&updata=<?=$view[id]?>"><?=$view[_title]?></a></td>
            <td><?=$view[id]?></td>
            <td><?=$view[_date]?> в <?=$view[_time]?></td>
            <td style="text-align: center;"><?if($view[_content_block] >0){?>да<?}else{?>нет<?}?></td>
            <td><?=$TEXT[$view[_status]]?></td>
            <td style="text-align: center;"><?=$TEXT[$view[_publish_main]]?></td>
            <td><a href="/?section=content&page=<?=$view[id]?>" target="parent"><?$message->text($TEXT[47],'')?></a></td>
            <td class="icon" style="text-align: center;">
                <?if($view[_element_cart] == 'Y'){?>
                    <a href="/?section=controlPanel&element=edit_post&delete_cart=<?=$view[id]?>" title="<?$message->text($TEXT[32],'')?>"><img src="/section/controlPanel/library/images/add_iz_cart_post.png"></a>
                <? } else { ?>
                    <a href="/?section=controlPanel&element=add_post&updata=<?=$view[id]?>" title="<?$message->text($TEXT[31],'')?>"><img src="/section/controlPanel/library/images/edit_post_icon.png"></a>
                <?}?>
            </td>
            <td class="icon" style="text-align: center;">
                <?if($view[_element_cart] !== 'Y'){?>
                    <a href="/?section=controlPanel&element=edit_post&delete=<?=$view[id]?>" title="<?$message->text($TEXT[29],'')?>"><img src="/section/controlPanel/library/images/delete.png"></a>
                <? } else { ?>
                    <a href="/?section=controlPanel&element=edit_post&delete_in_cart=<?=$view[id]?>" onClick="return window.confirm('<?=$message->text($TEXT[45],'')?>')" title="<?$message->text($TEXT[30],'')?>"><img src="/section/controlPanel/library/images/delete.png"></a>
                <?}?>
            </td>
        </tr>



    <?
    }#end while
    ?>
</table>
<?if(!$_SESSION[post]){?>

	<?$message->error($TEXT[26],'no_post')?>

<?}?>
</div>