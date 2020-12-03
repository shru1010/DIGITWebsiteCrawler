<!--local host connection -->
<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "IT-Task1";
//import phpmyadmin,create sql
	$connect = mysqli_connect($host, $user, $password, $db_name);
	if(!$connect){
		echo "Cannot connect to database $db_name." . mysqli_connect_error();
		exit();
	}
?>
