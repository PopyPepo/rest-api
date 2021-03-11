<?php 
// pagination หน้าปัจจุบัน, จำนวนทั้งหมด, จำนวนที่จะแสดงใน 1 หน้า 	
function pagination($p, $all, $perPage){
// function pagination($conn){
// 	$p = 5;
// 	$all = 172;
// 	$perPage = 10;

	$json = array();
	$totalPage = ceil($all/$perPage);

	if ($p>1){	$json[] = array("text"=>"Previous", "page"=>1);}

	for ($i=1;$i<=$totalPage;$i++){
		if ($totalPage>15){
			if ($p<=10 && $i>10 && $i<($totalPage-2)){

				$json[] = array("text"=>"...", "page"=>ceil($totalPage/2));
				$i += $totalPage - 12;
	
			}else if ($p>10 && $i>2 && $i<($p-5)){
				$json[] = array("text"=>"...", "page"=>ceil($p/2));
				$i += $p-8;
				
			}
			else if ($p>10 && $i>2 && $i>($p+5)){
				$json[] = array("text"=>"...", "page"=>ceil(($totalPage-$p)/2+$p));
				$i += $totalPage - $p - 6;
			
			}
		}

		if ($i==$p){	$json[] = array("text"=>$i, "page"=>$i, "active"=>"active");	 }
		else{	$json[] = array("text"=>$i, "page"=>$i);	}
	}


	if ($p<$totalPage){	$json[] = array("text"=>"Next", "page"=>$i-1); }


	return $json;
}
?>