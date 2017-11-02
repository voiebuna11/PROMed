<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['nume']) && isset($_POST['parola'])){
	$nume = $_POST['nume'];
	$parola = $_POST['parola'];
	if(verifica($conn, 'users', 'user_name', $nume) == 0){		 //verifica numele
		die("1");
	}
	if(verifica2($conn, 'users', 'user_password', md5($parola), 'user_name', $nume) == 0){	//verifica parola
		die("2");
	}
	session_start();
	$_SESSION['nume'] = $nume;
	die("3");
}
?>