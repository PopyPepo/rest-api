<?php 
include("../_connect.php");
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Bangkok');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$action = isset($_GET['action']) ? $_GET['action'] : null;

$json = array();
$c="";
$mass="";
$col = "";	$val = "";	$c="";

switch ($action) {

	case 'show_table':
		$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '".$database."'";
		$query = $conn->query($sql);
		while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {
			$json['instance'][] = $instance;
		}
	break;

	case 'getFoderInstance':
		$foder = "../app/".$_GET['forderName'];
		if (is_dir($foder)){
			$json['message']="yes";
			if ($handle = opendir($foder)) {
				while (false !== ($entry = readdir($handle))) {
					if (strlen($entry)>3){ 

						$json['instance'][] = $entry;
					}
				}
				closedir($handle);
			}

			$file = ($_GET['forderName']);

			if (file_exists($foder."/controller/".$file."Controller.js")){ 
				$json['instance'][]=$file."Controller.js";
			}
			if (file_exists($foder."/i18n/massages.json")){ 
				$json['instance'][]="massages.json";
			}
			if (file_exists($foder."/model/index.php")){ 
				$json['instance'][]="index.php";
			}

			$f = array(
				"model"=>array($file."Insert.php", $file."Show.php", $file."List.php", $file."Update.php", $file."Delete.php"), 
				"view"=>array("_menu.php", "create.php", "list.php", "show.php", "edit.php", "_form.php")
			);
			
			foreach ($f as $fol => $fis) {
				foreach ($fis as $xname) {
					if (file_exists($foder."/".$fol."/".$xname)){ 
						$json['instance'][]=$xname;
					}
				}
			}


			// $json.=$c;
			$json['instance'][] = "1";
		}else{
			$json['message']="no";
		}

	break;

	case 'createForder':
		$foder = "../app/".$_GET['forderName'];
		//$message = "Success";
		if (!mkdir($foder, 0777, true)) {
			$mass .= ('Failed to create view folders.');
		}else{
			$foder = "../app/".$_GET['forderName']."/controller";
			//$message = "Success";
			if (!mkdir($foder, 0777, true)) {
				$mass .= (' Failed to create controller folders.');
			}

			$foder = "../app/".$_GET['forderName']."/i18n";
			//$message = "Success";
			if (!mkdir($foder, 0777, true)) {
				$mass .= (' Failed to create i18n folders.');
			}

			$foder = "../app/".$_GET['forderName']."/model";
			//$message = "Success";
			if (!mkdir($foder, 0777, true)) {
				$mass .= (' Failed to create model folders.');
			}

			$foder = "../app/".$_GET['forderName']."/view";
			//$message = "Success";
			if (!mkdir($foder, 0777, true)) {
				$mass .= (' Failed to create view folders.');
			}
		}

		
	break;

	case 'createFile':	

		$table = $_POST['table'];
		$files = $_POST['files'];
		$functionFile = $files['path'].$files['file'];
		
		echo $filname = "../app/".$table['TABLE_NAME']."/".$files['path']."/".$files['file'];

		// if ($files['path']=='i18n'){
		// 	$filname .= $table['TABLE_NAME']."Controller.js";
		// }
		//else if ($files['path']=='view'){
		// 	$filname .= $files['file'];
		// }else{
		// 	$filname .= ($files['file'] ? $table['TABLE_NAME'].$files['file'] : ($files['path']=='i18n' ? 'massages.json' : 'index.php'));
		// }

		$functionFile = str_replace(".json", "", $functionFile);
		$functionFile = str_replace(".php", "", $functionFile);
		$functionFile = str_replace(".js", "", $functionFile);
		$functionFile = str_replace($table['TABLE_NAME'], "", $functionFile);

		include("generate/".$functionFile.".php");
		$table['database'] = $database;
		$html = $functionFile($conn, $table, $files);

		$objCreate = fopen($filname, 'wb');
		$ex = fwrite($objCreate, $html);
		if($objCreate){
			$json['message'] = "File Created.";
		}
		else{
			$json['message'] = "File Not Create.";
		}
		fclose($objCreate);
		chmod($filname, 0777);
		$json['post'] = $_POST;
		$json['filname'] = $filname;
		$json['functionFile'] = $functionFile;

		// $json['functionName'] = $functionName;
		// $json['result'] = $html;
	break;
}
	
echo json_encode($json);
?>
