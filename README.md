
ไฟล์ .htaccess บรรทัดที่ 3 และ 7 แก้ไข ชื่อโฟลเดอร์โปรเจค

	<IfModule mod_rewrite.c>
		RewriteEngine On
		RewriteBase /ชื่อโฟลเดอร์โปรเจค/
		RewriteRule ^index\.php$ - [L]
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . /ชื่อโฟลเดอร์โปรเจค/index.php [L]
		php_flag register_globals on
		php_value session.auto_start 1
	</IfModule>

	กรณีนำขึ้น HOST
	<IfModule mod_rewrite.c>
		RewriteEngine On
		RewriteBase /
		RewriteRule ^index\.php$ - [L]
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . /index.php [L]
		php_flag register_globals on
		php_value session.auto_start 1
	</IfModule>


ไฟล์ ./conf/_connect.php บรรทัดที่ 3-6 แก้ไขการเชื่อมต่อฐานข้อมูล

<?php
	try {
		$servername = "localhost";		//ชื่อ database server 
		$database = "example_db";		//ชื่อฐานข้อมูล
		$username = "root";				//ชื่อผู้ใช้เข้าสู่ฐานข้อมูล
		$password = "";					//รหัสผ่านเข้าสู่ฐานข้อมูล
		$conn_string = 'mysql:host='.$servername.'; dbname='.$database.';charset=utf8';
		$conn = new PDO($conn_string, $username, $password);
	} catch (PDOException $e) {
		//print "Error!: " . $e->getMessage() . "<br/>";
		echo json_encode($e->getMessage());
		die();
	}

?>


ไฟล์ index.php  บรรทัดที่ 7 แก้ไข ชื่อโฟลเดอร์โปรเจค
	$FORDER = "/ชื่อโฟลเดอร์โปรเจค";

	กรณี อัพขึ้น server แล้วอยู่ root path ของโฟเด้อเว็บ
	$FORDER = "/";


ไฟล์ htaccess.php แก้ไข ชื่อไฟล์ที่ใช้เป็น template
	เปลี่ยน default layout บรรทัดที่ 23
	$_SESSION['LAYOUT'] = "home";

	เพิ่ม template บรรทัดที่ 24
	$template = array("administrator", "auth");		//list template



./app/{table_name}/controller/ เก็บไฟล์ js

./app/{table_name}/model/ เก็บไฟล์ php

./app/{table_name}/view/ เก็บไฟล์ html (.php)



เก็บไฟล์ที่มีการอัพโหลดผ่านระบบ

./src/{table_name}/{field_name}/{filename} 
