<?php
function i18n($conn){
	$json = array();
	$lang = isset($_SESSION['LANG']) ? $_SESSION['LANG'] : "Th";
	$domain = isset($_POST['domain']) ? $_POST['domain'] : array();
	$defaulLang = "En";
// 	$massages = isset($_POST['massages']) && $_POST['massages']!="" ? $_POST['massages'] : "massages";
	
	foreach($domain as $model=>$filename){
		$path = "../app/".$model."/i18n/".$filename.".json";
		if (file_exists($path)){
			$str = file_get_contents($path);
			$lable = json_decode($str, true); 
			$model = $model=="layout" ? 'default' : $model;
			$json[$model] = isset($lable[$lang]) ? $lable[$lang] : $lable[$defaulLang];
		}else{
			$json['path'][] = $path."/i18n/".$filename.".json";
		}
	}
	
	return $json;
}
?>