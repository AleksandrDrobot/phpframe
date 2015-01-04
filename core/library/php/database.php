<?php

/*************************************************************

php-frame

класс работы с базой данных Mysql 

версия класса: 1.0

*************************************************************/

class PHPdatabase{
        var $userDB;
        var $passwordDB;
        var $hostDB;
        var $nameBD;
        var $mysql_query;

        function connect($arDataBase){

   /*Задаем параметры подлючения*/

   $this->userDB      = $arDataBase[userDB];       
   $this->passwordDB  = $arDataBase[passwordDB];    
   $this->hostDB      = $arDataBase[hostDB];    
   $this->nameBD      = $arDataBase[nameBD];    

            /*Подключаемся к базе*/

                    $this->mysql_query = @mysql_connect(
                            $this->hostDB,
                             $this->userDB,
                              $this->passwordDB);

            /*Выбираем базу данных в которой будем работать*/

            $this->mysql_query = @mysql_select_db(
                    $this->nameBD,
                    $this->mysql_query);

            /*Проверка соединения*/

            if($this->mysql_query){

            /*Если соединение успешно*/

             return 'database: Connect';

            }else{

            /*Если соединение не успешно*/

             return 'database: NOT Connect... ERROR';
            }

            /*Устанавливаем кодировку базы данных utf8 */

                        $this->mysql_query = mysql_query("SET NAMES 'utf8'");
                        $this->mysql_query = mysql_query("SET CHARACTER SET 'utf8'");
            $this->mysql_query =  mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
        }

}


/**********************************************

  Краткая документация

/**********************************************

/Класс базы данных

для инициализации класса используйте строку:  

$PHPdatabase = new PHPdatabase;

параметры подключения к базе

$arDataBase = array(

"userDB" => "root",
"passwordDB" => "password",
"hostDB" => "localhost",
"nameBD" => "mysql", 

); #end Array



/методы

метод подключения к базе
$PHPdatabase->connect($arDataBase);


выведет на экран сообщение о состоянии подключения
echo $PHPdatabase->connect($arDataBase);

*/
