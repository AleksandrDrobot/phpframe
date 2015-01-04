<?php

class PHPviewfiles {
	var $type;
	var $dir;
	var $folder;

	function view(){

		$this->type = htmlspecialchars($_GET[type]);

		if($this->type){

			switch ($this->type) {
				case 'm': $this->dir = '/media/'; break;
				case 's': $this->dir = '/system/'; break;
				case 'a': $this->dir = '/arhive/'; break;
				
				
			}
            
            $this->folder = '/upload'.$this->dir.'';
		    $this->dir = $_SERVER[DOCUMENT_ROOT].'/upload'.$this->dir.'';
		    
		}

	}
}