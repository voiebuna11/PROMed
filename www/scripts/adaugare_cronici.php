<?php
include("../functii.php");
include("../dbconn.php");

if(isset($_POST['CNP']) && isset($_POST['afectiune']) && isset($_POST['tratament'])){
	$afectiune = $_POST['afectiune'];
	$tratament = $_POST['tratament'];
	$CNP = $_POST['CNP'];
	$id = selectare($conn, 'pacienti', 'id', 'CNP', $CNP);
	if(verifica($conn, 'pacienti', 'CNP', $CNP) != 1) die("CNP-ul nu este înregistrat în baza de date.");
	if(verifica($conn, 'cronici', 'id', $id) == 1) die("Pacientul este înregistrat deja în listă.");
	//tipar valori $valori ="'".$exemplu."' , '".$exemplu."', '".$exemplu."'";
	$valori ="'".$id."' , '".$afectiune."', '".$tratament."'";
	$campuri = 'id, afectiune, tratament';
	if(inserare($conn, 'cronici', $campuri, $valori) == 1){
		die("1");
	}
}
echo 'Datele nu au fost înregistrate.';
?>