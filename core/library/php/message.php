<?php

/*

 Класс вывода текстовых сообщений

*/
 class message{
 	 var $message;
     var $css_class;
 	/*
 	для ошибок
 	*/
 	function error($message,$css_class){
 		$this->message = $message;
 		$this->css_class = $css_class;

 	 	if($this->css_class){
	    print '<div class="'.$this->css_class.'">';
 		print '<span>';
 		print $this->message;
 		print '</span>';
 		print '</div>';
 	}else{
 		print $this->message;
   }
 }#end function

 	/*
 	для сообщений о выполнении
 	*/
 	function skill($message,$css_class){
 		$this->message = $message;
 		$this->css_class = $css_class;
        
        if($this->css_class){
	    print '<div class="'.$this->css_class.'">';
 		print '<span>';
 		print $this->message;
 		print '</span>';
 		print '</div>';
 	}else{
 		print $this->message;
   }
 }#end function

 	/*
 	для текстовых строк
 	*/
 	 	function text($message,$css_class){
 		$this->message = $message;
 		$this->css_class = $css_class;

 	 	if($this->css_class){
 		print '<span class="'.$this->css_class.'">';
 		print $this->message;
 		print '</span>';
 	}else{
 		print $this->message;
   }

  }#end function

 }#end class

