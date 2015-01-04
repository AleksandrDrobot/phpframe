<?php

class PHProotInti {

	function init($arDataBase){

		session_start();

		$_SESSION[rooter] = 'Y';

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

	    session_start();
	

/*  Создание таблиц   */


		 $query = "create table phpframe_post (id int(2) primary key auto_increment, 

  	     _title        varchar(100), 
  	     _date        varchar(100),
  	     _time        varchar(100), 
		 _catid        int, 
		 _type         varchar(10),
		 _status       varchar(10),
		 _publish_main varchar(10),
		 _introtext    text, 
		 _fulltext     text,
		 _content_block int,
		 _element_cart varchar(10)


  )"; mysql_query($query); // материалы

  $query = "create table phpframe_content_block (id int(2) primary key auto_increment,

  	     _title        varchar(100), 
		 _type         varchar(10),
		 _alias        varchar(10),
		 _status       varchar(10),
		 _count        int
		 
  )"; mysql_query($query); // контент блоки 

 $query = "create table phpframecounter_stat_ (id int(2) primary key auto_increment,

  	     _day        varchar(100), 
		 _count         int,
		 _count_all     int
	
		 
  )"; mysql_query($query); // статистика

$query = "create table phpframe_feedback (id int(2) primary key auto_increment,

  	     _name        varchar(50),
		 _mail         varchar(50),
		 _phone        varchar(50),
         _date        varchar(100),
  	     _time        varchar(100),
		 _message      text,
		 _viewed       varchar(1)



  )"; mysql_query($query); // обратная связь

$query = "create table phpframe_galleries (id int(2) primary key auto_increment,

  	     _title        varchar(50),
		 _desc         text


  )"; mysql_query($query); // галереи

$query = "create table phpframe_galleries_img (id int(2) primary key auto_increment,

  	     _title         varchar(50),
		 _desc          text,
		 _sort          int,
		 _path_orig     varchar(100),
         _path_norm     varchar(100),
         _path_min      varchar(100),
         _link_orig     varchar(80),
         _link_norm     varchar(80),
         _link_min      varchar(80),
         _date          varchar(50),
         _time          varchar(50),
         _id_galleries  int



  )"; mysql_query($query); // галереи изображения

		header( 'Refresh: 11; url=/?section=controlPanel'); // перенаправление
	}
}