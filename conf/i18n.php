<?php
header('Cache-Control: max-age=84600');
function i18n($conn){
	$json = array();
	$defaulLang = "Th";
	$lang = isset($_SESSION['LANG']) ? $_SESSION['LANG'] : $defaulLang;
	$domain = isset($_POST['domain']) ? $_POST['domain'] : array();
	
	
	foreach($domain as $model=>$file){
		foreach ($file as $filename) {
			$path = "../app/".$model."/i18n/".$filename.".json";
			if (file_exists($path)){
				$str = file_get_contents($path);
				$lable = json_decode($str, true); 
				$m = $model=="layout" ? 'default' : $model;
				if ($filename!="massages"){
					$m = $filename;
				}
				$json[$m] = isset($lable[$lang]) ? $lable[$lang] : $lable[$defaulLang];
			}else{
				$json['path'][] = $path."/i18n/".$filename.".json";
			}
		}
	}
	
	return $json;
}
?>