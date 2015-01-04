<div class="title_elem">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/file_manager.png"</td>
		<td><?$message->text($arParamSection[title],'title_')?></td>
	</tr>
</table>
</div>

<?if($model !== 'list'){?>

<?if($PHPfile->link){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[57], 'msg')?>
 </div>
 </div>
<script>
document.write('<input type="text"  class="link" onclick="this.select(); b1=true;" value="<?=$PHPfile->link?>" size="60">');
</script>



<?}?>

<form action='' method=post enctype=multipart/form-data>
<div class="block_content_form">
<div class="block_title_category_status">
<table>
	<tr>
		<td><?$message->text($TEXT[56],$title_error)?></td>
		<td><input name="file"  value="<?=$PHPpostRoot->title?>"  type="file"></td>
		<td style="padding-top: 14px;">
		</td>
	</tr>
	<tr>
		<td><?$message->text($TEXT[10],'title_form')?></td>
		<td>
		<select name="type">
			<option value="m" <?if(htmlspecialchars($_GET[type_add] == 'm')){?>selected="selected"<?}?>><?$message->text($TEXT[52],'title_form')?></option>
			<option value="a" <?if(htmlspecialchars($_GET[type_add] == 'a')){?>selected="selected"<?}?>><?$message->text($TEXT[53],'title_form')?></option>
			<option value="s" <?if(htmlspecialchars($_GET[type_add] == 's')){?>selected="selected"<?}?>><?$message->text($TEXT[54],'title_form')?></option>
		</select>
		</td>
	</tr>
		<tr>
		<td><?$message->text($TEXT[49],'title_form')?></td>
		<td>
		<select name="rename">
			    <option value="Y"><?$message->text($TEXT[50],'title_form')?></option>
			    <option value="N"><?$message->text($TEXT[51],'title_form')?></option>
		</select>
		</td>
	</tr>
</table>
</div>
</div>
<input  type="hidden" name="action" value="74327">
<input  type="submit" name = "save" class="button_form" value="<?$message->text($TEXT[55],'')?>">
</form>

<?}else{?>
<?if($PHPfile->del){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[34], 'msg')?>
 </div>
 </div>
<?}?>
<br />

<a href="/?section=controlPanel&element=file_manager&type_add=<?=$PHPviewfiles->type?>" class="button_form" ><?=$message->text($TEXT[61],'')?></a>

<div class="view_files">
<table>
<?php

$file = @scandir($PHPviewfiles->dir);

$counter = 0; $counter2 = 0; while($counter < count($file)){ $counter++; 
	if($file[$counter] !== '.' AND $file[$counter] !== '..' AND $file[$counter]){ $counter2++;
	$FILE =$_SERVER[DOCUMENT_ROOT].$PHPviewfiles->folder.$file[$counter];
	$FILE_IMG = $PHPviewfiles->folder.$file[$counter];


$type_ = end(explode(".", $FILE));

switch ($type_) {
	case 'png': $type_ = 'img'; break;
	case 'PNG': $type_ = 'img'; break;
	case 'JPG': $type_ = 'img'; break;
	case 'jpg': $type_ = 'img'; break;
	case 'gif': $type_ = 'img'; break;
	case 'GIF': $type_ = 'img'; break;
	case 'jpeg': $type_ = 'img'; break;
	case 'JPEG': $type_ = 'img'; break;

	case 'rar': $type_ = 'arhive'; break;
	case 'zip': $type_ = 'arhive'; break;

	default: $type_ = 'system'; break;
}

if($type_ == 'img'){ $img = '<td><a href="'.$PHPviewfiles->folder.$file[$counter].'" target="parent"><img class="prev_img" src="'.$FILE_IMG.'" /></a></td>';  }
if($type_ == 'arhive'){ $img = '<td><img class="prev_img_system" src="/section/controlPanel/library/images/menu/arhive.png" /></td>'; }
if($type_ == 'system'){ $img = '<td><img class="prev_img_system" src="/section/controlPanel/library/images/menu/system.png" /></td>'; }
?>
<tr>
	<?=$img?>
	<td><?=filesize($FILE)/1000?> Kb.</td>
	<td><?=date ("F d.Y H:i:s.",filemtime($FILE))?></td>
		<td><a href="<?=$PHPviewfiles->folder?><?=$file[$counter]?>" target="parent" title="<?$message->text($TEXT[58],'')?>"><img class="icon2" src="/section/controlPanel/library/images/view_file.png"></a></td>
		<td>
		<script>
document.write('<input type="text"  class="link" onclick="this.select(); b1=true;" value="<?=$PHPviewfiles->folder?><?=$file[$counter]?>" size="60">');
</script> </td>
		<td><a href="/?section=controlPanel&element=file_manager&type=<?=$PHPviewfiles->type?>&del=<?=$PHPviewfiles->folder?><?=$file[$counter]?>" onClick="return window.confirm('<?=$message->text($TEXT[45],'')?>')"><img class="icon" src="/section/controlPanel/library/images/delete.png"></a></td>
	</tr>

<?
}}

if($counter2 == 0){ $message->text($TEXT[59],'file_no');?><a class="file_no_a" href="/?section=controlPanel&element=file_manager&type_add=<?=$PHPviewfiles->type?>"><?$message->text($TEXT[60],'');?></a> <? }

?>
</table>
</div>
<?}?>

