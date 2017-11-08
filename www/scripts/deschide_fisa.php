<?php
include("../functii.php");
include("../dbconn.php");

if(isset($_POST['CNP'])){
	$CNP = $_POST['CNP'];
	if(verifica($conn, 'pacienti', 'CNP', $CNP) != 1) die("1");
	$id = selectare($conn, 'pacienti', 'id', 'CNP', $CNP);
	echo $id;
}
?>