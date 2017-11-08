<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$campuri = 'id';
	$valori = "'".$id."'";
	if(inserare($conn, 'fisa', $campuri, $valori) == 1){
		echo '1';
	}
}
?>