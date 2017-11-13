<?php
require_once('../dbconn.php');

$get_id=$_POST['id'];
$sql = "Delete from programari where id_p = '$get_id'";
if($conn->exec($sql)) echo 'Programare anulată cu succes!';

?>