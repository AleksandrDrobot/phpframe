<?php

class PHPrevalContent {
	var $content_block;
	var $link;
	var $title;
	var $id;
	var $introtext;
	var $introtext_view;
	var $fulltext;
	var $fulltext_view;

	function view($arDataBase,$arParam) {

		$PHPdatabase = new PHPdatabase;
	    $PHPdatabase->connect($arDataBase);

		$this->content_block  = $arParam[content_block_id]; 
		$this->link           = $arParam[view_link];
		$this->introtext_view = $arParam[view_intro];
		$this->fulltext_view  = $arParam[view_full];

	    $sql= mysql_query("SELECT * FROM phpframe_post WHERE _content_block = '$this->content_block' AND _status = 'P' AND _element_cart = 'N'  ORDER BY RAND() LIMIT 3 ");
	    while($val = mysql_fetch_array($sql)){

	    	$this->title = $val[_title];
	    	$this->id = $val[id];
	    	$this->introtext     = $val[_introtext];
            $this->fulltext      = $val[_fulltext];

	    	if($this->link == 'Y') {

	    		   print '<a href="/?section=content&page='.$this->id.'">'.$this->title.'</a>&nbsp;';
	    	}else{
	    		   print '<span>'.$this->title.'</span>&nbsp;';
	    	}

	    	if($this->introtext_view == 'Y'){

	    		print '<span class="introtext_revalContent">'.$this->introtext.'</span>';
	    	}

	    	if($this->fulltext_view == 'Y'){
	    		
	    		print '<span class="full_revalContent">'.$this->fulltext.'</span>';
	    	}
	    }
	}
}