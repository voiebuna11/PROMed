<?php
include("../dbconn.php");
if(isset($_POST['id'])){
	$data = '';
	$id = $_POST['id'];
	$sql ="SELECT * FROM pacienti WHERE id ='".$id."'";
	$result = $conn->query($sql);
foreach($result as $row)
    {
		$data .=  $row['CNP'] . "\n";
    }
	$sql ="SELECT * FROM cronici WHERE id ='".$id."'";
	$result = $conn->query($sql);
foreach($result as $row)
    {
		$data .=  $row['afectiune'] . "\n";
		$data .=  $row['tratament'];
    }
	echo $data;
}
?>