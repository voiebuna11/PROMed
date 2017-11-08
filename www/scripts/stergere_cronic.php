<?php
require_once('../dbconn.php');

$get_id=$_POST['id'];
$sql = "Delete from cronici where id = '$get_id'";
if($conn->exec($sql)) echo 'Pacient sters cu succes!';

?>