<?php
session_start();
if(!isset($_SESSION['nume'])){
		header('Location: ../login.php');
		exit();
}
?>
