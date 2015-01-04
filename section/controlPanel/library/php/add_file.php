<?php


class PHPfile {
	var $file;
	var $type;
	var $rename;
	var $action;

	var $system_catalog;
	var $media_catalog;
	var $arhive_catalog;
	var $catalog;
	var $link;
	var $del;

	function add(){
         $this->file   = htmlspecialchars($_POST[file]);
         $this->type   = htmlspecialchars($_POST[type]);
         $this->rename = htmlspecialchars($_POST[rename]);
         $this->action = htmlspecialchars($_POST[action]);

         $this->catalog          = $_SERVER[DOCUMENT_ROOT].'/upload/';
         $this->system_catalog   = $this->catalog.'system/';
         $this->media_catalog    = $this->catalog.'media/';
         $this->arhive_catalog   = $this->catalog.'arhive/';


		if($this->action){

			/* Создадим структуру */

			 @mkdir($this->catalog);
			 @mkdir($this->system_catalog);
             @mkdir($this->media_catalog);
			 @mkdir($this->arhive_catalog);

            switch ($this->type) {

            	case 'm': $uploaddir = $this->media_catalog;  $catalog = 'media'; break;
            	case 's': $uploaddir = $this->system_catalog; $catalog = 'system'; break;
            	case 'a': $uploaddir = $this->arhive_catalog; $catalog = 'arhive';  break;
       
            }


         $uploadfile = $uploaddir.basename($_FILES['file']['name']);

         $copy_file = @copy($_FILES['file']['tmp_name'], $uploadfile);

         if($copy_file == 1){

         $this->file  = $_FILES['file']['name'];
         $this->type  = $_FILES['file']['type'];

if($this->rename == 'Y'){
	/* переименовуем */

	    $prefix = mt_rand(1000,999999999).'';
	    $prefix = $prefix.md5($prefix);
	    $prefix = md5($prefix).$prefix;
	    $prefix = $prefix.mt_rand(1000,999999999);
	    $new_name = $uploaddir.$prefix.$this->file;

	    $type_ = end(explode(".", $new_name));

						switch ($this->type) {
							case 'image/png': $type = '.png'; break;
							case 'text/plain': $type = '.txt'; break;
							case 'application/octet-stream': $type = '.zip'; break;
							case 'image/jpeg': $type = '.jpeg'; break;
							case 'image/gif': $type = '.gif'; break;
							case 'image/jpg': $type = '.jpg'; break;
							default: $nt = 1; break;
						}


if($nt !== 1){ $new_name = $uploaddir.md5($new_name).$type; }

$new_name2 = md5($new_name).'.'. $type_;
$new_name = $uploaddir.md5($new_name).'.'. $type_;


rename($uploaddir.$this->file,$new_name);



}else{

	$new_name2 = $this->file; 
}


$this->link = '/upload/'.$catalog.'/'.$new_name2 .'';

            }
		}
	}

	function del(){

     $this->del = htmlspecialchars($_GET[del]);

     if($this->del){

     	$this->del = $_SERVER[DOCUMENT_ROOT].$this->del;
if(file_exists($this->del)){
$this->del = @unlink($this->del);
$this->type = htmlspecialchars($_GET[type]);
header( 'Location: /?section=controlPanel&element=file_manager&type='.$this->type.'&dell=tru', true, 303 );
}
     	
        }
	}
}