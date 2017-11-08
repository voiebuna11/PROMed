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

<div id="test"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>

Hello world
</div>
</body>
</html>