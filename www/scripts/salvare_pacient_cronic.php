<?php
include("../functii.php");
include("../dbconn.php");

if(isset($_POST['id']) && isset($_POST['afectiune']) && isset($_POST['tratament'])){
	$eroare = 0;
	$afectiune = $_POST['afectiune'];
	$tratament = $_POST['tratament'];
	$id = $_POST['id'];
	if(verifica($conn, 'cronici', 'id', $id) != 1) die("Pacientul nu este înregistrat în listă.");
	if(update($conn, 'cronici', 'afectiune', $afectiune, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'cronici', 'tratament', $tratament, 'id', $id) != 1) $eroare++ ;
	die($eroare);
}
echo 'Datele nu au fost înregistrate.';
?>