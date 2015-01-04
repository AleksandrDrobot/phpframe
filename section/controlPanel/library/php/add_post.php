<?php

class PHPpostRoot{

	var $title;
	var $catid;
	var $type;
	var $status;
	var $publish_main;
	var $introtext;
	var $fulltext;
	var $date_create;
	var $action;
	var $updatamsg;


	function add($arDataBase){ session_start();

		$this->action       = htmlspecialchars($_POST[action]);
		$this->title        = htmlspecialchars($_POST[title]);
		$this->catid        = htmlspecialchars($_POST[category]);
		$this->type         = htmlspecialchars($_POST[type]);
		$this->status       = htmlspecialchars($_POST[status]);
		$this->publish_main = htmlspecialchars($_POST[publish_main]);
		$this->introtext    = $_POST[intotext];
		$this->fulltext     = $_POST[fulltext];
		$this->add          = htmlspecialchars($_POST[add]);
		$this->use          = htmlspecialchars($_POST[use_]);
		$this->updata       = htmlspecialchars($_GET[updata]);

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);


if(htmlspecialchars($_GET[un_set]) == 'Y'){

	    unset($_SESSION[title]        );
	    unset( $_SESSION[catid]        );
		unset( $_SESSION[type]         );
		unset( $_SESSION[status]       );
		unset( $_SESSION[publish_main] );
		unset( $_SESSION[introtext]    );
	    unset( $_SESSION[fulltext]     );

	    header( 'Refresh: 0; url=/?section=controlPanel&element=add_post' );

}

 

		if($this->action AND $this->title AND $this->introtext AND $this->fulltext){


if(!$this->updata){

	$date = date("Y-m-d");
	$time = date("H:m:s");
	$this->introtext = mysql_real_escape_string($this->introtext);
	$this->fulltext = mysql_real_escape_string($this->fulltext);

$result = mysql_query ("INSERT INTO phpframe_post(
	 _title , 
	 _catid,
	 _type, 
	 _status,
	 _publish_main,
	 _introtext,
	 _fulltext,
	 _element_cart,
	 _content_block ,
	 _date, 
	 _time     

 ) VALUES (

				'$this->title' ,
				'$this->catid ' ,
				'$this->type' , 
				'$this->status' , 
				'$this->publish_main' , 
				'$this->introtext' , 
				'$this->fulltext',
				'N',
				'',
				'$date',
				'$time'


) ");

}else{

	$query = "UPDATE phpframe_post SET

	 _title        = '$this->title' ,
	 _catid        = '$this->catid ' ,
	 _type         = '$this->type' , 
	 _status       = '$this->status' , 
	 _publish_main = '$this->publish_main' , 
	 _introtext    = '$this->introtext' , 
	 _fulltext     = '$this->fulltext'


	 WHERE id='$this->updata'"; 
mysql_query($query) or die(mysql_error()); 

}

/* Если новость успешно добавлена */
        
if($result === true){
    
    if($this->use){

    $sql= mysql_query("SELECT * FROM phpframe_post  ORDER BY id  DESC ");
    $last_rec = mysql_fetch_array($sql);
	
	header( 'Location: /?section=controlPanel&element=add_post&updata='.$last_rec[id].'&add=true', true, 303 );

    }else{

    	if($this->add){

    		header( 'Location: /?section=controlPanel&element=edit_post&add=true', true, 303 );
    	}

     }
	
  }#end  result

}#end add post


if($this->updata){

/*  Значение при редактировании   */

$sql    = mysql_query("SELECT * FROM phpframe_post WHERE id='$this->updata' ORDER BY id  DESC ");
$updata = mysql_fetch_array($sql);

        $this->title        = $updata[_title];
		$this->catid        = $updata[_catid];
		$this->type         = $updata[_type];
		$this->status       = $updata[_status];
		$this->publish_main = $updata[_publish_main];
		$this->introtext    = $updata[_introtext];
		$this->fulltext     = $updata[_fulltext];



}else{

/*  Память форм  */

		if($this->title)         { $_SESSION[title]          = $this->title;         }
		if($this->catid)         { $_SESSION[catid]          = $this->catid;         }
		if($this->type)          { $_SESSION[type]           = $this->type;          }
		if($this->status)        { $_SESSION[status]         = $this->status;        }
		if($this->publish_main)  { $_SESSION[publish_main]   = $this->publish_main;  }
		if($this->introtext)     { $_SESSION[introtext]      = $this->introtext;     }
		if($this->fulltext)      { $_SESSION[fulltext]       = $this->fulltext;      } 

		$this->title        = $_SESSION[title];
		$this->catid        = $_SESSION[catid];
		$this->type         = $_SESSION[type];
		$this->status       = $_SESSION[status];
		$this->publish_main = $_SESSION[publish_main];
		$this->introtext    = $_SESSION[introtext];
		$this->fulltext     = $_SESSION[fulltext];

		
      }#end updata

	}#and add

}#end Class PHPpostRoot