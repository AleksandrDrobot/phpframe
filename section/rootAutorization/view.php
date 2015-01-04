<?php if(!$_ENGIINE_KEY_ACCESS) exit(); ?>


<?$PHPpreloaderSystem->load_page("ON","$time_aut");?>

      <?$message->error($aut, '')?>
       <div id="login">
     <h1>phpfraMe</h1>
        <form action="" method="post">
            <fieldset class="clearfix">
                <p><span  class="fontawesome-user"></span><input name="login" type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span  class="fontawesome-lock"></span><input name="password" type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input  type="submit" value="ВОЙТИ"></p>
            </fieldset>
        </form>




