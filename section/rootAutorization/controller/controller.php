<?
/*

контроллер авторизации на сайте

*/
session_start();

        $PHPdatabase = new PHPdatabase;
        $PHPaut      = new PHPauthorization;

	     	$PHPdatabase->connect($arDataBase);

        $PHPaut->user_exit($_GET[root]); 

		if(PHPauthorization::rootName()){

    header( 'Location: /?section=controlPanel&element=init', true, 303 );

        }else{

        	$login = htmlspecialchars($_POST[login]);
               if($login){
 

$PHParAut = array(

	"login"       =>  htmlspecialchars($_POST[login]),
	"password"    =>  htmlspecialchars($_POST[password]),
	"remember"    =>  htmlspecialchars($_POST[remember]),
	"login_DB"    =>  $arROOT[LOGIN],
    "password_DB" =>  $arROOT[PASSWORD]

	); $PHPaut->login($PHParAut,'root');
       

   }

        }

/* сохраняем значения */   

if($_SESSION[log_save]){

$val_login = $_SESSION[log_save];

}



/* реакция формы на ошибки */


//unset($_SESSION[time_aut]);

if(!$_SESSION[time_aut]){ $_SESSION[time_aut] = 3; }

if(strstr($_SERVER["REQUEST_URI"], 'login_false') || strstr($_SERVER["REQUEST_URI"], 'password_false')){
  $focus_login = 'autofocus';

  //$_SESSION[time_aut] = $_SESSION[time_aut] * 2;

  $aut = '<style type="text/css"> #login form span { color: #F40D0D; } </style>';
}




$time_aut = 3;



   