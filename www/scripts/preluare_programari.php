<?php
include("../dbconn.php");
include("../functii.php");

if(isset($_POST['data_p'])){
	$data_p = $_POST['data_p'];
	$sql ="SELECT * FROM programari WHERE data_p ='".$data_p."' ORDER BY ora_p ASC";
	$result = $conn->query($sql);
	$data = '';
foreach($result as $row)
    {
        $data .= $row['id_p'] . "\t";
		$data .=  $row['data_p'] . "\t";
		$data .=  $row['ora_p'] . "\t";
		$CNP =  $row['cnp_pacient'];
		$nume = selectare($conn, 'pacienti', 'nume', 'CNP', $CNP);
		$prenume = selectare($conn, 'pacienti', 'prenume', 'CNP', $CNP);
		$data .= $nume.' '.$prenume . "\t";
		$data .=  $row['nume_p'] . "\n";
    }
	echo $data;
}
?>