<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['email'])){
	$email = $_POST['email'];
	if(verifica($conn, 'users', 'user_email', $email) == 0){		 //verifica email
		die("Acest email nu este inregistrat.");
	}
	else{
		$digits = 4;
		$cod = rand(pow(10, $digits-1), pow(10, $digits)-1); //genereaza cod
		
		if(modifica($conn, 'users', 'reset_password', $cod, 'user_email', $email)){
			trimitere_email($email, $cod);
			
		}
	}
}
?>