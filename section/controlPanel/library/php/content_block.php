<?php

class PHPcontentBlock {
	var $title;
	var $type;
	var $status;
	var $alias;
	var $add;
	var $sql;
	var $del;

function add($arDataBase){

	    $this->action       = htmlspecialchars($_POST[action]);
		$this->title        = htmlspecialchars($_POST[title]);
		$this->type         = htmlspecialchars($_POST[type]);
		$this->status       = htmlspecialchars($_POST[status]);

		if($this->action AND $this->title){

			$translit = new translit;
			$PHPdatabase = new PHPdatabase;
	        $PHPdatabase->connect($arDataBase);

			$this->alias = $translit->init($this->title); // преобразуем в транслит
			$this->alias = strtolower($this->alias); // в нижний регистр
			$this->alias = trim($this->alias); // тримим






$result = mysql_query ("INSERT INTO phpframe_content_block(
	 _title , 
	 _type, 
	 _status,
	 _alias
	

 ) VALUES (

				'$this->title' ,
				'$this->type' , 
				'$this->status' , 
				'$this->alias'
		

) ");

if($result){

	header( 'Location: ?section=controlPanel&element=content_block&add=tru', true, 303 );
}

 

          
		}
     }	

    function view($arDataBase){

    	$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);
    	$sql= mysql_query("SELECT * FROM phpframe_content_block  ORDER BY id  DESC ");
    	return $sql;

     } 

     function count_post_in_block($id){

     	$sql= mysql_query("SELECT * FROM phpframe_post WHERE _content_block = '$id' AND _element_cart = 'N'  ORDER BY id  DESC ");
     	$count = 0; while($wiev = mysql_fetch_array($sql)){ $count++; }
     	return $count;
       
     }

     function delete(){
       $id = htmlspecialchars($_GET[del]);
     	if($id){

		$sql = mysql_query("DELETE  FROM  phpframe_content_block WHERE id='$id' ");
	
		header( 'Location: ?section=controlPanel&element=content_block&del_comp=tru', true, 303 );


     	}

     } 

  }