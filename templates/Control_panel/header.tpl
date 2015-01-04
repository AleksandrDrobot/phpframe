<?if(htmlspecialchars($_GET[un_set])) { exit(); }?>

<script>
/* присвоить класс контенту при загрузке  */
window.onload = function() {
  setTimeout(function() {
    document.getElementById('open_content').click();
  }, 100);
};


/* открытие контента */
$(document).ready(function(){
	$('#open_content').click(function () {
		$('.content').toggleClass('open_page');
		});
/* открытие панели */
	$('.wrap_icon_header').click(function () {
		$('.left').toggleClass('open_panel');
		});

	$('#load_').click(function () {
		$('.init_loader').toggleClass('load');
		});

		$('#finish').click(function () {
		$('.load_sustem_finish_start').toggleClass('load_sustem_finish');
		});

		$('#close_').click(function () {
		$('.close_loader').toggleClass('close');
		});

							$('#text_init_view_1').click(function () {
					$('.open_view1').toggleClass('view_init_stat');
					});
							$('#text_init_view_2').click(function () {
					$('.open_view2').toggleClass('view_init_stat');
					});
							$('#text_init_view_3').click(function () {
					$('.open_view3').toggleClass('view_init_stat');
					});
							$('#text_init_view_4').click(function () {
					$('.open_view4').toggleClass('view_init_stat');
					});

	});
</script>
<table class="tb" width="100%">
	<tr>
		<td style="vertical-align: top;">
			<div class="left">
				<div class="left_block"> 
				<div id="open_content"></div>
<h4>Контент</h4>
  <a class="menu" href="/?section=controlPanel&element=add_post&un_set=Y"><img class="icon" src="/section/controlPanel/library/images/menu/new_content.png" />Создать контент</a>
  <a class="menu" href="/?section=controlPanel&element=edit_post&lim=10"><img class="icon" src="/section/controlPanel/library/images/menu/edit_content.png" />Редактировать контент</a>
  <a class="menu" href="/?section=controlPanel&element=edit_post&cart=Y"><img class="icon" src="/section/controlPanel/library/images/menu/cart.png" />Корзина</a>
  <a class="menu" href="/?section=controlPanel&element=content_block"><img class="icon" src="/section/controlPanel/library/images/menu/content_block.png" />Контент блоки</a>

<br />
<h4>Файлы</h4>

<a class="menu" href="/?section=controlPanel&element=file_manager"><img class="icon" src="/section/controlPanel/library/images/menu/upload_file.png" />Загрузить</a>

<a class="menu" href="/?section=controlPanel&element=file_manager&type=m"><img class="icon" src="/section/controlPanel/library/images/menu/media.png" />Медиа-файлы</a>

<a class="menu" href="/?section=controlPanel&element=file_manager&type=a"><img class="icon" src="/section/controlPanel/library/images/menu/arhive.png" />Архивы</a>

<a class="menu" href="/?section=controlPanel&element=file_manager&type=s"><img class="icon" src="/section/controlPanel/library/images/menu/system.png" />Системные-файлы</a>

<br />
 <h4>Фото галереи</h4>

<a class="menu" href="/?section=controlPanel&element=galleries"><img class="icon" src="/section/controlPanel/library/images/menu/upload_file.png" />Создать</a>
  <a class="menu" href="/?section=controlPanel&element=galleries&edit=edit_all"><img class="icon" src="/section/controlPanel/library/images/menu/edit_content.png" />Редактировать</a>
                    <a class="menu" href="/?section=galleries" target="parent"><img class="icon" src="/section/controlPanel/library/images/menu/media.png" />Просмотр всех галерей</a>




                    <br />
<h4>Обратная связь</h4>
<?
        $count_feedback = 0; $sql = mysql_query("SELECT * FROM phpframe_feedback WHERE _viewed = 'N' ORDER BY id  DESC ");
        while($view = mysql_fetch_array($sql)){ $count_feedback++; }
        if($count_feedback > 0) { $count_feedback = '<b>('.$count_feedback.')</b>'; }else{ unset($count_feedback); }
                    ?>
                    <a class="menu" href="/?section=controlPanel&element=feedback"><img class="icon" src="/section/controlPanel/library/images/menu/feedback.png" />Обращения <?=$count_feedback?></a>
                    <a class="menu" href="/?section=controlPanel&element=feedback&send=mail"><img class="icon" src="/section/controlPanel/library/images/menu/send_mail.png" />Отправить e-mail </a>




                    <br />
<h4>Система</h4>
     <a class="menu" href="/section/controlPanel/section/phpinfo.php" target="parent"><img class="icon" src="/section/controlPanel/library/images/menu/php.png" />php</a></li>
     <a class="menu" href="/?section=controlPanel&element=init"><img class="icon" src="/section/controlPanel/library/images/menu/reboot.png" />Reboot</a></li>
                    <a class="menu" href="/?section=rootAutorization&root=EX"><img class="icon" src="/section/controlPanel/library/images/menu/exit.png" />Logout</a></li>
  </div>
	 </div>
		</td>
		<td style="vertical-align: top;">
			<div class="right">
				<div class="content">
					<div class="header">
<div class="wrap_icon_header"><div class="open_naw"><img  src="/section/controlPanel/library/images/panel.png"></div></div>
<a href="/?section=controlPanel"><div class="username"><img src="/section/controlPanel/library/images/user.png" /><?=PHPauthorization::rootName()?></div></a>
<a href="/" class="site" target="parent"><img class="icon" src="/section/controlPanel/library/images/insite.png" />На сайт</a>
<a href="" class="refresh"><img class="icon" src="/section/controlPanel/library/images/refresh.png" />Обновить</a>
<div class="phpframe"><img src="/section/controlPanel/library/images/phpframe.png" />phpframe ver. <?=$version?></div>
</div>
