<!DOCTYPE html>
<html>
<head>
<?php
include("../header.php");
?>
<title>Forgot</title>
<script>
function reset_pass(){
	var regex = /^[A-Za-z0-9]+$/
	code = $("#cod").val();
	password = $("#parola").val();
    if(password.search(regex)==-1 || password.length<4){
    	$('#divcod').removeClass('has-error');
        document.getElementById("errorlog").innerHTML = "Parola trebuie contina doar litere si cifre.";
        $('#divparola').addClass('has-error');
        $("#parola").select();
        return 0;
    }
	$.ajax({
           url:"../scripts/reset_pass.php",  
           method:"POST",
           data:{cod: code, parola: password},
           dataType:"text",  
           success:function(data){  
         		log = data;
         		if(log == 0){
        			document.getElementById("errorlog").innerHTML = "Codul este invalid.";
        			$('#divparola').addClass('has-error');
      				$("#cod").select();
         		}
         		else if(log == 1){
         			document.getElementById("errorlog").innerHTML = "Modificat cu succes.";
         		}
           }
		}); 
}
</script>
</head>
<body style="background-color: #f2f2f2">
	<img src="../bootstrap/images/image-2.png">
    <form role="form" class="login-form">
    <div class="form-group" id="divcod">
    	<label>Cod de resetare</label><input class="form-control" type="text" id="cod"/>
    </div>
    <div class="form-group" id="divparola">
    	<label>Parola noua</label><input class="form-control" type="password" id="parola"/>
    </div>
    <div class="form-group">
   	 	<a href="../index.php" class="login-link">Inapoi la Log In</a>
   	 	<a onclick="reset_pass()" style="float:right" class="btn btn-primary">Salveaza</a><br>
   	 	<strong><p id="errorlog" class="help-block" align="center"></p></strong>
    </div>
    </form>
</body>
</html>