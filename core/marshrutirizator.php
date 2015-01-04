<?php
if($_ENGIINE_KEY_ACCESS)

$section = htmlspecialchars($_GET[section]);
$request = htmlspecialchars($arCatalog["$section"]);
		if($section){
			if($request){
				$request = $section;
				if( /* проверка на целостность структуры */
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/view.php')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/config/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/config/config.php')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/message/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/message/text.php')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/controller/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/controller/controller.php')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/library/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/library/php/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/library/css/index.html')
					AND
					file_exists($_SERVER[DOCUMENT_ROOT].'/section/'.$request.'/library/js/index.html')){
					$request_ = $request;
				}else{
					$message->error("$text_system[1]","error");
				exit();
			}
			}else{
				header("HTTP/1.0 404 Not Found");
				$message->error("$text_system[2]","error");
			exit();
		}
		}else{
		     $request_ = 'main';
	}



