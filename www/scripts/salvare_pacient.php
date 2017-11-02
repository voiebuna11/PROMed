<?php
include("../functii.php");
include("../dbconn.php");
if(isset($_POST['nume']) && isset($_POST['prenume'])&& isset($_POST['CNP']) && isset($_POST['CID']) && isset($_POST['sex']) && isset($_POST['datan']) && isset($_POST['asigurare'])){
	$eroare = 0;
	$id = $_POST['id'];
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$CNP = $_POST['CNP'];
	$CID = $_POST['CID'];
	$sex = $_POST['sex'];
	$datan = $_POST['datan'];
	$asigurare = $_POST['asigurare'];
	if(verifica($conn, 'pacienti', 'CID', $CID) == 1) die("CID-ul este deja înregistrat.");	
	if(verifica($conn, 'pacienti', 'CNP', $CNP) == 1) die("CNP-ul este deja înregistrat.");
	//tipar valori $valori ="'".$exemplu."' , '".$exemplu."', '".$exemplu."'";
	if(update($conn, 'pacienti', 'nume', $nume, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'prenume', $prenume, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'CNP', $CNP, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'CID', $CID, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'sex', $sex, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'datan', $datan, 'id', $id) != 1) $eroare++ ;
	if(update($conn, 'pacienti', 'asigurat', $asigurare, 'id', $id) != 1) $eroare++ ;
	die($eroare);
}
?>