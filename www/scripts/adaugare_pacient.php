<?php
include("../functii.php");
include("../dbconn.php");

if(isset($_POST['nume']) && isset($_POST['prenume'])&& isset($_POST['CNP']) && isset($_POST['CID']) && isset($_POST['sex']) && isset($_POST['datan']) && isset($_POST['asigurare'])){
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
	$valori ="'".$nume."' , '".$prenume."', '".$CNP."' , '".$CID."', '".$sex."' , '".$datan."', '".$asigurare."'";
	$campuri = 'nume, prenume, CNP, CID, sex, datan, asigurat';
	if(inserare($conn, 'pacienti', $campuri, $valori) == 1){
		die("Pacient salvat cu succes.");
	}
}
echo 'Datele nu au fost înregistrate.';
?>