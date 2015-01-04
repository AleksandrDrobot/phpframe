<div class="title_elem">
<table>
	<tr>
		<td><img src="/section/controlPanel/library/images/hello.png"</td>
		<td><?$message->text($arParamSection[title],'title_')?></td>
	</tr>
</table>
</div>

<div class="loader_INIT">

<script>
/* присвоить класс контенту при загрузке  */

  setTimeout(function() {
    document.getElementById('load_').click();
  }, 1000);

    setTimeout(function() {
    document.getElementById('finish').click();
  }, 12000);



			          setTimeout(function() {
			    document.getElementById('text_init_view_1').click();
			  }, 3000);

			               setTimeout(function() {
			    document.getElementById('text_init_view_2').click();
			  }, 6000);

			                    setTimeout(function() {
			    document.getElementById('text_init_view_3').click();
			  }, 8000);

			                         setTimeout(function() {
			    document.getElementById('text_init_view_4').click();
			  }, 10000);



</script>


<div id="text_init_view_1"></div>
<div id="text_init_view_2"></div>
<div id="text_init_view_3"></div>
<div id="text_init_view_4"></div>

<div id="finish"></div>
<div id="load_"></div>





<div class="init_loader"></div>

<div class="init_1"><?$message->text($TEXT[62],'')?></div>


<div class="open_view1"><?$message->text($TEXT[63],'')?></div>

<div class="open_view2"><?$message->text($TEXT[64],'')?></div>

<div class="open_view3"><?$message->text($TEXT[65],'')?></div>

<div class="open_view4"><?$message->text($TEXT[66],'')?></div>






</div>






