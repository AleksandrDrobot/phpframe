<?php

class PHPeditPost {
	var $title;
	var $catid;
	var $type;
	var $status;
	var $publish_main;
	var $introtext;
	var $fulltext;
	var $date_create;
	var $sql;
	var $add;
	var $post_cart;
	var $dell_cart;
	var $add_post_cart;
	var $cart_unlink;

	function view($arDataBase){

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

        $lim = 10;
        if(htmlspecialchars($_POST[count])) { $lim = htmlspecialchars($_POST[count]);}

     $this->post_cart = htmlspecialchars($_GET[cart]);

	 if($this->post_cart == 'Y'){ $element_cart = 'Y';  }else{ $element_cart = 'N'; } // принадлежность к корзине

     $content_clock = htmlspecialchars($_GET[content_block]);
     if($content_clock){

     $sql= mysql_query("SELECT * FROM phpframe_content_block WHERE _alias ='$content_clock'ORDER BY id  DESC ");
     $val = mysql_fetch_array($sql);

     $sql = mysql_query("SELECT * FROM phpframe_post WHERE _element_cart = '$element_cart' AND _content_block = '$val[id]'  ORDER BY id  DESC LIMIT $lim");
     return $sql;

    
     }else{
     $sql = mysql_query("SELECT * FROM phpframe_post WHERE _element_cart = '$element_cart'   ORDER BY id  DESC LIMIT $lim");
     return $sql;
     }
	





	}

	function cart_post($arDataBase){

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

	    $this->post_cart = htmlspecialchars($_GET[delete]);

	    if($this->post_cart){

	    	$query = "UPDATE phpframe_post SET  _element_cart = 'Y' WHERE id='$this->post_cart'";  
	    	mysql_query($query) or die(mysql_error()); 
	    	header( 'Location: ?section=controlPanel&element=edit_post&del_cart=true', true, 303 );

	    }

	    $this->post_cart = htmlspecialchars($_GET[delete_cart]);

	    if( $this->post_cart){

	    	$query = "UPDATE phpframe_post SET  _element_cart = 'N' WHERE id='$this->post_cart'";  
	    	mysql_query($query) or die(mysql_error()); 
            header( 'Location: /?section=controlPanel&element=edit_post&cart=Y&add_post_cart=true', true, 303 );


	    }

	    $this->post_cart = htmlspecialchars($_GET[delete_in_cart]);

	    if($this->post_cart){

	    	$sql= mysql_query("DELETE  FROM  phpframe_post WHERE id='$this->post_cart' ");

            header( 'Location: /?section=controlPanel&element=edit_post&cart=Y&cart_unlink=Y', true, 303 );


	    }


	}

}

