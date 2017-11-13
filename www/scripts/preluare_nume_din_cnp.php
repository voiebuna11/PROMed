<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['cnp'])){
	$CNP = $_POST['cnp'];

	$nume = selectare($conn, 'pacienti', 'nume', 'CNP', $CNP);
	$prenume = selectare($conn, 'pacienti', 'prenume', 'CNP', $CNP);
	echo $nume.' '.$prenume;
}
?>