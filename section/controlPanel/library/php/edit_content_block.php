<?php

class PHPeditContentBlock {
	var $alias;
	var $title;
	var $type;
	var $status;
	var $sql_post;
	var $id;



	function valBlock($arDataBase){

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

	    $this->alias = htmlspecialchars($_GET[block]);

	    $sql= mysql_query("SELECT * FROM phpframe_content_block WHERE _alias = '$this->alias'  ORDER BY id  DESC ");
        $val = mysql_fetch_array($sql);

        $this->title        =  $val[_title];
        $this->type         =  $val[_type];
        $this->status       =  $val[_status];
        $this->id           =  $val[id];


	}

	function valPost($arDataBase){

		$this->sql_post = mysql_query("SELECT * FROM phpframe_post WHERE _content_block = 0 AND _element_cart = 'N'  ORDER BY id  DESC ");

	}

		function valPostInBlock($arDataBase){

		$this->sql_post_in_block = mysql_query("SELECT * FROM phpframe_post WHERE _content_block = '$this->id' AND _element_cart = 'N'  ORDER BY id  DESC ");

	}

	function add_block($arDataBase){

		$id = htmlspecialchars($_GET[add_block]);
		$query = "UPDATE phpframe_post SET _content_block  = '$this->id'   WHERE id='$id'"; 
        $sql = mysql_query($query);
        

		
	}

		function del_block($arDataBase){

		$id = htmlspecialchars($_GET[del_block]);
		$query = "UPDATE phpframe_post SET _content_block  = 'N'   WHERE id='$id'"; 
        $sql = mysql_query($query); 

     
		
	}

	     function switch_block() {

          if(htmlspecialchars($_POST[hid])){
          if(htmlspecialchars($_POST[status]) !== 'on' ){

	     	$query = "UPDATE phpframe_content_block SET _status  = 'P'   WHERE id='$this->id'"; 
	        $sql = mysql_query($query);
           
            if($sql){ header( 'Location: /?section=controlPanel&element=content_block_edit&block='.$this->alias.'', true, 303 ); }

	    }else{

	        $query = "UPDATE phpframe_content_block SET _status  = 'A'   WHERE id='$this->id'"; 
	        $sql = mysql_query($query);

            if($sql){ header( 'Location: /?section=controlPanel&element=content_block_edit&block='.$this->alias.'', true, 303 ); }
	      
	      }

	    }     
     	
     } 

}