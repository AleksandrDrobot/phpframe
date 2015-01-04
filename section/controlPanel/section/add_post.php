<div class="title_elem">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/content.png"</td>
		<td><?$message->text($arParamSection[title],'title_')?></td>
	</tr>
</table>
</div>


<?if($PHPpostRoot->updatamsg){?>
 <div id="div"> 
 <div class="complete">
 <a onClick="hide_show();return false;" class="icon_cl" id="link"><img  class="hidden_link_icon" src="/section/controlPanel/library/images/hidden_icon.png"></a>
 <?$message->text($TEXT[25], 'msg')?>
 </div>
 </div>
 <?}?>

<div class="block_content_form">
<!-- tinymce -->
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
    language:"ru",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>


<form action="" method="post">
<div class="block_title_category_status">
<table>
	<tr>
		<td><?$message->text($TEXT[4],$title_error)?></td>
		<td><input name="title"  value="<?=$PHPpostRoot->title?>"  type="text"></td>
		<td style="padding-top: 14px;">
		</td>
	</tr>
	<tr>
		<td><?$message->text($TEXT[10],'title_form')?></td>
		<td>
		<select name="type" onChange="history(this);">
		<?if($PHPpostRoot->type == 'm'){?><option value="m"><?$message->text($TEXT[11],'title_form')?></option><?}?>
			<?if($PHPpostRoot->type !== 'm'){?><option value="m"><?$message->text($TEXT[11],'title_form')?></option><?}?>
		</select>
		</td>
	</tr>
		<tr>
		<td><?$message->text($TEXT[13],'title_form')?></td>
		<td>
		<select name="status">
		    <?if($PHPpostRoot->status == 'P'){?><option value="P"><?$message->text($TEXT[14],'title_form')?></option><?}?>
		    <?if($PHPpostRoot->status == 'N'){?><option value="N"><?$message->text($TEXT[15],'title_form')?></option><?}?>
		    <?if($PHPpostRoot->status == 'R'){?><option value="R"><?$message->text($TEXT[16],'title_form')?></option><?}?>
			     <?if($PHPpostRoot->status !== 'P'){?><option value="P"><?$message->text($TEXT[14],'title_form')?></option><?}?>
			     <?if($PHPpostRoot->status !== 'N'){?><option value="N"><?$message->text($TEXT[15],'title_form')?></option><?}?>
			     <?if($PHPpostRoot->status !== 'R'){?><option value="R"><?$message->text($TEXT[16],'title_form')?></option><?}?>
		</select>
		</td>
	</tr>
</table>
</div>
<?$message->text($TEXT[6], $introtext_error)?>
<textarea name="intotext" class="text_area_intro"><?=$PHPpostRoot->introtext?></textarea>
<?$message->text($TEXT[7], $fulltext_error)?>
<textarea  name="fulltext" class="text_area_full"><?=$PHPpostRoot->fulltext?></textarea><br /><br />
<input type="checkbox"  name="publish_main" <?if($PHPpostRoot->publish_main){echo 'checked';}?> class="checkbox" id="checkbox" />  
<label for="checkbox"><?$message->text($TEXT[17],'title_form')?></label>
<br /><br />
<input  type="hidden" name="action" value="74327">
<?if(!$PHPpostRoot->updata){?>
<input  type="submit" name = "add" class="button_form" value="<?$message->text($TEXT[5],'')?>">
<?}else{?>
<input name="updatamsg" type="hidden" value="672367">
<?}?>
<input  type="submit" name = "use_" class="button_form" value="<?$message->text($TEXT[8],'')?>">
</form>
</div>




