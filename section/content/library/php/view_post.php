<?php

/*

Класс отображения поста

*/

class PHPviewPostOnce {
	    var $id;
		var $title;
	    var $introtext;
	    var $fulltext;
	    var $date_create;
	    var $content_block;

	function view($arDataBase){

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

		$this->id = htmlspecialchars($_GET[page]); 



	   if(preg_match("#^[0-9]+$#",$this->id)) {

	   $sql= mysql_query("SELECT * FROM phpframe_post WHERE id = '$this->id' AND _status = 'P' AND _element_cart = 'N'  ORDER BY id  DESC ");

       $val = mysql_fetch_array($sql);

       $this->title        = $val[_title];
       $this->time         = $val[_time];
       $this->date         = $val[_date];
       $this->introtext    = $val[_introtext];
       $this->fulltext     = $val[_fulltext];
       $this->date_create  = $val[_date_create];
       $this->content_block = $val[_content_block];

		}

	}
}