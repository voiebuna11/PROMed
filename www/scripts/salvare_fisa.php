<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['camp']) && isset($_POST['valoare']) && isset($_POST['id']) && isset($_POST['tabel'])){
	$id = $_POST['id'];
	$camp = $_POST['camp'];
	$valoare = $_POST['valoare'];
	$camp2 = $_POST['camp2'];
	$valoare2 = $_POST['valoare2'];
	$tabel = $_POST['tabel'];
	$data = $id. "\tcamp " .$camp. "\tvaloare " .$valoare. "\tcamp2 " .$camp2. "\tvaloare2 " .$valoare2. "\ttabel " .$tabel;
   
	if(modifica($conn, $tabel, $camp, $valoare, 'id', $id)){
		if($valoare2 != null){
    		if(modifica($conn, $tabel, $camp2, $valoare2, 'id', $id)){
    			echo '1';
    		}
    	}else{
    		echo '1';
    	}
	}
	
}


?>