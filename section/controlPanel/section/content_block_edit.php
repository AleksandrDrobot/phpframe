<div class="title_elem">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/edit_content_block.png"</td>
		<td><?$message->text($arParamSection[title],'title_')?> </td>
	</tr>
</table>
</div>

<script type="text/javascript">
            function mySubmit(el) {
                if(el.checked) {
                    document.getElementById("formsign").submit();
                }
                 if(!el.checked) {
                    document.getElementById("formsign").submit();
                }
            }
        </script>





<div class="edit_post">

<div class="edit_content_block">
<div class="wpapp_form_content_block">
<form id='formsign' action="" method="post">
	<input type="hidden" value="6767" name="hid">
	<input type="checkbox" <?if($ContentBlock->status == 'A'){echo 'checked';}?> onchange="mySubmit(this);" name="status"  class="checkbox" id="checkbox" />  
<label for="checkbox"><?$message->text($TEXT[41],'title_form')?></label>
<a href="/?section=content&block=<?=htmlspecialchars($_GET[block])?>" target="parent" class="view_block_in_site"><?$message->text($TEXT[42],'')?></a>
<a href="/?section=controlPanel&element=edit_post&content_block=<?=htmlspecialchars($_GET[block])?>&lim=10"  class="view_block_in_site"><?$message->text($TEXT[48],'')?></a>
</form>
</div>

<table>
	<tr>
	<td><?$message->text($TEXT[37],'title_td');?>
	
</form></td>
	<td><?$message->text($TEXT[38],'title_td');?></td>

	</tr>
	<tr>
		<td style="vertical-align: top;">

<?php while($val = mysql_fetch_array($ContentBlock->sql_post_in_block)) { $_SESSION[val] = true; ?>

<a href="/?section=controlPanel&element=content_block_edit&block=<?=$ContentBlock->alias?>&del_block=<?=$val[id]?>">
<div class="block_content_elem">
<img src="/section/controlPanel/library/images/icon_dell_post_to_content.png" />
<?$message->text(':: '.$val[_title].'','title')?>	
</div>
</a>




	


<?}

if(!$_SESSION[val])	{  print $message->error($TEXT[39], 'no_content'); } unset($_SESSION[val]);	?>

	</td>

		<td style="vertical-align: top;">
<?php while($val = mysql_fetch_array($ContentBlock->sql_post)) { $_SESSION[val] = true; ?>

<div class="free_content_wraper">
<a href="/?section=controlPanel&element=content_block_edit&block=<?=$ContentBlock->alias?>&add_block=<?=$val[id]?>">
<div class="free_content"><img src="/section/controlPanel/library/images/icon_add_post_to_content.png" />
<?$message->text('+ '.$val[_title].'','free_content_titile')?>	
</div></a>
</div>




<?}

if(!$_SESSION[val])	{  print $message->error($TEXT[40], 'no_content'); } unset($_SESSION[val]);	?>		
			
		</td>

	</tr>
</table>



</div>
</div>