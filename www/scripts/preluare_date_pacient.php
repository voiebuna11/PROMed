<?php
include("../dbconn.php");
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql ="SELECT * FROM pacienti WHERE id ='".$id."'";
	$result = $conn->query($sql);
foreach($result as $row)
    {
        $data = $row['nume'] . "\n";
		$data .=  $row['prenume'] . "\n";
		$data .=  $row['CNP'] . "\n";
		$data .=  $row['CID'] . "\n";
		$data .=  $row['sex'] . "\n";
		$data .=  $row['datan'] . "\n";
		$data .=  $row['asigurat'];
    }
	echo $data;
}
?>