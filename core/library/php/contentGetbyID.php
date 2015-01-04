<?php

class PHPcontentGetbyID {
	var $id;
	var $arData;

	var $title;
	var $time;
	var $date;
	var $introtext;
	var $fulltext;
	var $date_create;
	var $content_block;

	function view($arDataBase,$arParam){

		$this->id = $arParam[ID];

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

	    $sql= mysql_query("SELECT * FROM phpframe_post WHERE id = '$this->id' AND _status = 'P' AND _element_cart = 'N'  ORDER BY id  DESC ");
	    $val = mysql_fetch_array($sql);

	   $this->title         = $val[_title];
       $this->time          = $val[_time];
       $this->date          = $val[_date];
       $this->introtext     = $val[_introtext];
       $this->fulltext      = $val[_fulltext];
       $this->date_create   = $val[_date_create];
       $this->content_block = $val[_content_block];
		
	}
}