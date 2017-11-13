<?php
include("../auth.php");
include("../header.php");
?>

<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Dashboard</title>
<script>
$(document).ready(function(){
	div = '<div id="menu_arrow"><br>&#10095;</div>';
	$('#meniu_1').append(div);
});
</script>
</head>
<body>	
<?php include("../meniu.php");?>
<div class="sheet">
	
<div class="panel-body">
	<ul class="nav nav-tabs">
    	<li class="active"><a href="#program" name="Program" data-toggle="tab">Program de lucru</a></li>
        <a class="btn btn-danger" href="../logout.php" id="logout">Deconectare</a>
	</ul>
</div>
<div class="tab-content">
 	<div class="tab-pane fade" id="program"></div>
</div>
</div>

</body>
</html>