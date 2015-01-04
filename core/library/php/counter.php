<?php

class PHPcounterStat {
	var $day;
	var $count;
	var $count_all;

	function hendler($arDataBase) {

		if(htmlspecialchars($_GET[section]) !== 'controlPanel' AND htmlspecialchars($_GET[section]) !== 'rootAutorization' AND !$_SESSION[rooter]) {

		session_start();

        $PHPdatabase = new PHPdatabase;
		$PHPdatabase->connect($arDataBase);

		$this->day = date('Ymd');

		


$sql= mysql_query("SELECT * FROM phpframecounter_stat_ WHERE _day = '$this->day'  ORDER BY id  DESC ");
$val = mysql_fetch_array($sql);
$this->count     = $val[_count] + 1;
$this->count_all = $val[_count_all] + 1;

if(!$_SESSION[counter]) {

		if(!$val[id] AND $this->day !== $val[_day]){
		 
		   $result = mysql_query ("INSERT INTO phpframecounter_stat_ (_day , _count , _count_all ) VALUES ( '$this->day' ,  '1' , '1') ");

		}else{
		    
			$result = mysql_query ("UPDATE phpframecounter_stat_ SET  _count = '$this->count' WHERE _day='$this->day' ");
		}

		$_SESSION[counter] = true;

		}

		$result = mysql_query ("UPDATE phpframecounter_stat_ SET  _count_all = '$this->count_all' WHERE _day='$this->day' ");
	 }
   }
 }