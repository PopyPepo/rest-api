<?php
function i18nmassages($conn, $tableIns, $fileIns){
$table = $tableIns['TABLE_NAME'];
    $c= "";
    $th = '"Th": {';
    $en = '"En": {';

    $tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
    $tableexcute = $conn->query($tableSql);
    $tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);
    $title = $tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : ucfirst($tableInstanc->TABLE_NAME);
    
    $sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
    $excute = $conn->query($sql);
    $th .= '
        "domain": "'.$title.'",
        "list": "รายการข้อมูล '.$title.'",
        "show": "แสดงข้อมูล '.$title.'",
        "create": " เพิ่มข้อมูล '.$title.'",
        "edit": "แก้ไขข้อมูล '.$title.'"';
    $TITLE = ucfirst($tableInstanc->TABLE_NAME);
    $en .= '
        "domain": "'.$TITLE.'",
        "list": "List '.$TITLE.'",
        "show": "Detail '.$TITLE.'",
        "create": "Create '.$TITLE.'",
        "edit": "Edit '.$TITLE.'"';
    $c = ",";
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
        $label = "";

        if (strpos($instanc->Comment, "@{")){
            $dataSpri = explode("@{", $instanc->Comment);
            $label = trim($dataSpri[0]);
        }else{
            $label = $instanc->Comment ? $instanc->Comment : $instanc->Field;
        }

        $th .= $c.'
        "'.$instanc->Field.'": "'.$label.'"';
        $en .= $c.'
        "'.$instanc->Field.'": "'.ucfirst($instanc->Field).'"';
        $c = ",";
    }

    $th .= '
    },';
    $en .= '
    }';

    $txt = '{'.$th.$en.'
}';
    return $txt;
}
?>
