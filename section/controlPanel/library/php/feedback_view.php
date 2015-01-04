<?php

class PHPfeedback_view {
    var $action;
    var $adress;
    var $message;
    var $send;



    function view($arDataBase){
        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        return mysql_query("SELECT * FROM phpframe_feedback  ORDER BY id  DESC ");




    }
    function send_mail(){

        $this->action = htmlspecialchars($_POST[action]);
        $this->adress = htmlspecialchars($_POST[adress]);
        $this->message = htmlspecialchars($_POST[message]);

        if($this->action AND $this->adress AND $this->message){

            $headers= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

          $this->send = mail("$this->adress", "Ответ с сайта [ $_SERVER[SERVER_NAME] ]", "$this->message", "$headers");
        }
    }
}