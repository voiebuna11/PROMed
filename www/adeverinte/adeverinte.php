<?php
include("../auth.php");
include("../header.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Adeverinte</title>
<script>
$(document).ready(function(){
	div = '<div id="menu_arrow"><br>&#10095;</div>';
	$('#meniu_4').append(div);
});
</script>
</head>
<body>
	<?php include("../meniu.php");?>
   <div class="sheet">Adeverinte</div>
</body>
</html>