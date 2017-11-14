<?php
include("../functii.php");
include("../dbconn.php");

if(isset($_POST['data_p']) && isset($_POST['CNP'])&& isset($_POST['ora_p']) && isset($_POST['nume_p'])){
	$nr = "0";
	$data_p = $_POST['data_p'];
	$ora_p = $_POST['ora_p'];
	$CNP = $_POST['CNP'];
	$nume_p = $_POST['nume_p'];
	$ora = $_POST['ora'];
	$sql = "SELECT * FROM programari WHERE data_p = '".$data_p."' AND ora_p LIKE '".$ora."%'";
	$result = $conn->query($sql);
	foreach($result as $row){
		$nr = $nr + 1;
	}
	if($nr >= 4){
		die('Numărul maxim de programări pe oră a fost atins.');
	}
	if(verifica2($conn, 'programari', 'ora_p', $ora_p, 'data_p', $data_p) == 1) die("Există deja o programare la această oră.");
	if(verifica($conn, 'pacienti', 'CNP', $CNP) != 1) die("CNP-ul nu este înregistrat în baza de date.");
	//tipar valori $valori ="'".$exemplu."' , '".$exemplu."', '".$exemplu."'";
	$valori ="'".$data_p."' , '".$ora_p."', '".$CNP."' , '".$nume_p."'";
	$campuri = 'data_p, ora_p, cnp_pacient, nume_p';
	if(inserare($conn, 'programari', $campuri, $valori) == 1){
		die("1");
	}
}
echo 'Datele nu au fost înregistrate.'; 
?>