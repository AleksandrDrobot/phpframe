<div class="title_elem">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/block.png"</td>
		<td><?$message->text($arParamSection[title],'title_')?></td>
	</tr>
</table>
</div>

<?if($PHPcontentBlock->add){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[35], 'msg')?>
 </div>
 </div>
 <?}?>

 <?if($PHPcontentBlock->del){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[46], 'msg')?>
 </div>
 </div>
 <?}?>

<form action="" method="post">
<div class="block_content_form">
<div class="block_title_category_status">
<table>
	<tr>
		<td><?$message->text($TEXT[18],$title_error)?></td>
		<td><input name="title"  value="<?=$PHPpostRoot->title?>"  type="text"></td>
		<td style="padding-top: 14px;">
		</td>
	</tr>
	<tr>
		<td><?$message->text($TEXT[10],'title_form')?></td>
		<td>
		<select name="type">
			<option value="m"><?$message->text($TEXT[22],'title_form')?></option>
		</select>
		</td>
	</tr>
		<tr>
		<td><?$message->text($TEXT[13],'title_form')?></td>
		<td>
		<select name="status">
			    <option value="A"><?$message->text($TEXT[20],'title_form')?></option>
			    <option value="P"><?$message->text($TEXT[21],'title_form')?></option>
		</select>
		</td>
	</tr>
</table>
</div>
</div>
<input  type="hidden" name="action" value="74327">
<input  type="submit" name = "save" class="button_form" value="<?$message->text($TEXT[23],'')?>">
</form>

<div class="content_block_view">
<?php
while ($arContentBlock = mysql_fetch_array($PHPcontentBlock->sql))
{?>

<div class="content_block_elem" <?if($arContentBlock[_status] == 'P'){ print 'style="background: #b2b2b2;"';}?>>
<?if($PHPcontentBlock->count_post_in_block($arContentBlock[id]) == 0){?>
<a href="/?section=controlPanel&element=content_block&del=<?=$arContentBlock[id]?>" onClick="return window.confirm('<?=$message->text($TEXT[43],'')?>')" title="<?$message->text($TEXT[30],'')?>">
<?}else{?>
<a href="#" onClick="return window.confirm('<?=$message->text($TEXT[44],'')?>')" title="<?$message->text($TEXT[30],'')?>">
<?}?>
<img class="delete" src="/section/controlPanel/library/images/hidden_icon.png"></a>
<a href="/?section=controlPanel&element=content_block_edit&block=<?=$arContentBlock[_alias]?>">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/content_clock_el.png"><br /><center>[ <?=$PHPcontentBlock->count_post_in_block($arContentBlock[id])?> ]<br /><br />id  <?$message->text($arContentBlock[id],'')?></center></td>
		<td class="td_">
		<h2><?$message->text($arContentBlock[_title],'')?></h2>
		<?$message->text($TEXT[36],'type_content');?><?$message->text($TEXT[$arContentBlock[_type]],'type_content');?>
		<br />
		{ <?$message->text($arContentBlock[_alias],'')?> }
		</td>
	</tr>
</table>
</a>
</div>



<?



}?>
</div>