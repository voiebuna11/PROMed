<?php
include("../dbconn.php");
include("../functii.php");
if(isset($_POST['id'])){
	$id = $_POST['id'];
	if(verifica($conn, 'fisa', 'id', $id) == 1){
	$sql ="SELECT * FROM fisa WHERE id ='".$id."'";
	$result = $conn->query($sql);
foreach($result as $row)
    {
        $data = $row['prenume_t'] . "\n";
		$data .=  $row['prenume_m'] . "\n";
		$data .=  $row['varsta_t'] . "\n";
		$data .=  $row['varsta_m'] . "\n";
		$data .=  $row['localitate'] . "\n";
		$data .=  $row['strada'] . "\n";
		$data .=  $row['nr'] . "\n";
		$data .=  $row['antecedente_f'] . "\n";
		$data .=  $row['saptamani'] . "\n";
		$data .=  $row['greutate'] . "\n";
		$data .=  $row['inaltime'] . "\n";
		$data .=  $row['PC'] . "\n";
		$data .=  $row['PT'] . "\n";
		$data .=  $row['asistat'] . "\n";
		$data .=  $row['rang'] . "\n";
		$data .=  $row['alimentat'] . "\n";
		$data .=  $row['malformatii'] . "\n";
		$data .=  $row['antecedente_p'] . "\n";
		$data .=  $row['boli'] . "\n";
    }
	$sql ="SELECT * FROM pacienti WHERE id ='".$id."'";
	$result = $conn->query($sql);
	foreach($result as $row)
    {
		$data .=  $row['nume'] . "\n";
		$data .=  $row['prenume'] . "\n";
		$data .=  $row['datan'] . "\n";
		$data .=  $row['CNP'];
    }
	
		echo $data;
	}
	else{
		echo '0';
	}
	
}
?>