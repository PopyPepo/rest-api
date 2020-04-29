<?php
	try {
		$servername = "localhost";
		$database = "example_db";
		$username = "root";
		$password = "";
		$conn_string = 'mysql:host='.$servername.'; dbname='.$database.';charset=utf8';
		$conn = new PDO($conn_string, $username, $password);
	} catch (PDOException $e) {
		//print "Error!: " . $e->getMessage() . "<br/>";
		echo json_encode($e->getMessage());
		die();
	}

?>