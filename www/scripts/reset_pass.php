<?php
include("../functii.php");
include("../dbconn.php");
if(isset($_POST['parola']) && isset($_POST['cod'])){
	$parola = $_POST['parola'];
	$cod = $_POST['cod'];
	$nume = 'admin';
	if(verifica2($conn, 'users', 'reset_password', $cod, 'user_name', $nume) == 1){
		if(modifica($conn, 'users', 'reset_password', NULL, 'user_name', $nume) == 1 && modifica($conn, 'users', 'user_password', md5($parola), 'user_name', $nume)){
			die("1");
		}
	}
	else{
		die('0');
	}	
}
?>