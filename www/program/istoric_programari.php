<? include("../dbconn.php"); ?>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Istoric programari</title>
<script>
var temporar = 0;
$(document).ready(function () {
	$('#tabel-cu-programari').dataTable();
});

</script>
</head>
<body>
	<?php
		date_default_timezone_set("Europe/Bucharest");
		 $data = date("Y-m-d");
		 $ora = date("H:i");
	?>
    	<div class="panou-tabel">
    	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tabel-cu-programari">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Ora</th>
                                            <th>CNP pacient</th>
                                            <th>Tip</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 5;
                                      
										$result = $conn->prepare("SELECT * from programari WHERE data_p <= '".$data."' AND ora_p < '".$ora."'");
										$result->execute();
										for($j=0; $row = $result->fetch(); $j++){
										?>
										<tr name="<?php echo $id; ?>">
										<?php for($i=0; $i<$n; $i++){ ?>
											<td> <?php echo $row[$i]; ?></td>
										<?php } ?> 
											
										</tr> 
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>

</body>
</html>