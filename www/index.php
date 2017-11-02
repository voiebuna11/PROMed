<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link href="bootstrap/assets/css/bootstrap.css" rel="stylesheet" />
<link href="bootstrap/assets/css/font-awesome.css" rel="stylesheet" />
<link href="bootstrap/assets/css/custom.css" rel="stylesheet" />
<link href="bootstrap/assets/css/mycss.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="bootstrap/assets/js/bootstrap.min.js"></script>
<script src="bootstrap/assets/js/jquery.metisMenu.js"></script>
<script src="bootstrap/assets/js/custom.js"></script>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<title>Login</title>
<style>
	img {
    display: block;
    margin: 0 auto;
    margin-top: 4%;
    width:120px; height: 120px;
}
</style>
<script>
$(document).ready(function(){
	
});
function login(){
	var regex = /^[A-Za-z0-9]+$/
	username = $("#nume").val();
	password = $("#parola").val();
	if(username.search(regex)==-1 || username.length<4){
           	$('#divparola').removeClass('has-error');
         	document.getElementById("errorlog").innerHTML = "Numele trebuie contina doar litere si cifre.";
         	$('#divnume').addClass('has-error');
         	$("#nume").select();
         	return 0;
    }
    if(password.search(regex)==-1 || password.length<4){
    	$('#divnume').removeClass('has-error');
        document.getElementById("errorlog").innerHTML = "Parola trebuie contina doar litere si cifre.";
        $('#divparola').addClass('has-error');
        $("#parola").select();
        return 0;
    }
	$.ajax({
           url:"scripts/login_scr.php",  
           method:"POST",
           data:{nume: username, parola: password},
           dataType:"text",  
           success:function(data){  
         		log = data;
         		if(log == 1){
         			$('#divparola').removeClass('has-error');
         			document.getElementById("errorlog").innerHTML = "Numele introdus este gresit.";
         			$('#divnume').addClass('has-error');
         			$("#nume").select();
         		}
         		else if(log == 2){
         			$('#divnume').removeClass('has-error');
         			document.getElementById("errorlog").innerHTML = "Parola introdusa este gresita.";
         			$('#divparola').addClass('has-error');
         			$("#parola").select();
         		}
         		else if(log == 3){
         			window.location.replace("dashboard/dashboard.php");
         		}
           }
		}); 
}
</script>
</head>
<body style="background-color: #f2f2f2">
	<img src="bootstrap/images/image-2.png">
    <form role="form" class="login-form">
    <div class="form-group" id="divnume">
    	<label>Nume de utilizator</label><input class="form-control" type="text" id="nume"/>
    </div>
    <div class="form-group" id="divparola">
    	<label>Parola</label><input class="form-control" type="password" id="parola"/>
    </div>
    <div class="form-group">
   	 	<a href="forgot/recover.php" class="login-link">Ai uitat parola?</a>
   	 	<a onclick="login()" style="float:right" class="btn btn-primary">Log In</a><br>
   	 	<strong><p id="errorlog" class="help-block" align="center"></p></strong>
    </div>
    </form>   
</body>
</html>