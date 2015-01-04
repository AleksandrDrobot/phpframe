<?php

/*************************************************************

php-frame

класс авторизации

версия класса: 1.4

*************************************************************/

class PHPauthorization{
	var $login;
	var $password;
	var $remember;
    var $Db_login;
    var $Db_password;
    var $exit;


function  login($PHParAut,$root){


	/* Задаем входные данные из формы */

	$this->login = htmlspecialchars($PHParAut[login]);
	$this->password = htmlspecialchars($PHParAut[password]);
	$this->remember = htmlspecialchars($PHParAut[remember]);
	$this->Db_login = htmlspecialchars($PHParAut[login_DB]);
	$this->Db_password = htmlspecialchars($PHParAut[password_DB]);

	/* Проверяем если авторизация в coocies */

	if($_COOKIE[php_frame_aut] == md5($this->Db_login.$this->Db_password)){

    /*Если проверка пройдена, то запускаем сессию*/

	$_SESSION[USER] = $_COOKIE[php_frame_aut_login];


	}else{

    /* Проверка на заполненность полей */

	if($this->login  || $this->password || $this->remember){

       /* Проверка логина */

		if($this->login == $this->Db_login){

           /* Проверка пароля */

			if($this->password == $this->Db_password){

               /* Если все верно, то запускаем сессию */

               if($root !== 'root') {

				$_SESSION[USER] = $this->login;

		     	}else{

		     	$_SESSION[ROOT] = $this->login;
		     		
		     	}


					/* Если передан параметр coocies, то сохраняем авторизацию у клиента */

						if($this->remember){
                        
                        /* Шифруем логи и паролль */

                        $name = 'php_frame_aut';
						setcookie($name, md5($this->login.$this->password), time() + 3600*24*7, "/");

                         /*Присваеваем coocies имя пользователя*/

                        $name = 'php_frame_aut_login';
						setcookie($name, $this->login, time() + 3600*24*7, "/");
						
						}

                     /* Обновляем данные страницы */

            header( 'Location: /?section=rootAutorization&PHPauthorization=login_true_and_password_true', true, 303 );

					}else{

					  header( 'Location: /?section=rootAutorization&PHPauthorization=password_false', true, 303 );
					}

	   			  }else{

            header( 'Location: /?section=rootAutorization&PHPauthorization=login_false', true, 303 );
	   			
	   			  }
	
	   			}

    		 }

   		  }

   /* Выход из сайта */

   function user_exit($exit){

   	$this->exit = $exit;
  
    /*Если задан параметр на выход*/

   	if($this->exit == 'EX'){

   		/*Чистим сессии и куки*/

   		unset($_SESSION[USER]);
   		unset($_SESSION[ROOT]);

   		 $name = 'php_frame_aut';
		 setcookie($name, "", time() + 3600*24*7, "/");

   		 /* Обновляем данные страницы */

         header( 'Refresh: 0; url=/?section=rootAutorization&PHPauthorization=exit_true' );

   	}

   }

   /*Метод отображения ошибок и уведомлений класса*/

   function aut_message(){

   	switch (htmlspecialchars($_GET[PHPauthorization])) {

   		case 'login_true__passwordtrue':
   			
   			break;

   			case 'password_false':
   				print('Не верный пароль!');
   				break;

   				case 'login_false':
   				   print('Не верный логин!');
   					
   					break;

   					case 'exit_true':
   					
   						break;
   		
   		default:

   			break;
   	}

   }

   /*Получаем логин авторизированного пользователя*/

   function userName(){
           
         /*Если пользователь авторизован, то возвратим его логин*/

   	     if($_SESSION[USER]){

     	return $_SESSION[USER];

     }

   }

      function rootName(){
           
         /*Если пользователь авторизован, то возвратим его логин*/

   	     if($_SESSION[ROOT]){

     	return $_SESSION[ROOT];

     }

   }

 }
