<!DOCTYPE html>
<html>
<head>
<?php
include("../header.php");
?>
<title>Recover</title>
<script>
function recover(){
	var regex = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;
	var email = $("#e-mail").val();
	if(email.search(regex)==-1){
         	document.getElementById("errorlog").innerHTML = "Adresa de email invalida.";
         	$('#divadresa').addClass('has-error');
         	$("#email").select();
         	return 0;
    }
    $.ajax({
           url:"../scripts/forgot_pass.php",  
           method:"POST",
           data:{email: email},
           dataType:"text",  
           success:function(data){  
         		alert(data);
           }
		}); 
}

</script>
</head>
<body style="background-color: #f2f2f2">
	<img src="../bootstrap/images/image-2.png">
    <form role="form" class="login-form" style="max-width: 500px; height: 300px">
    <div class="form-group" id="divadresa" style="max-width: 420px">
    	<strong><p style="font-size:15px;">Introduceti adresa de email a contului dumneavoastra. O sa primiti un mail cu codul de resetare al parolei.<br> Click <a href="../index.php">aici</a> pentru a va intoarce la pagina de autentificare.</p></strong>
    	<label>Adresa dvs. de email</label><input class="form-control" type="text" id="e-mail" placeholder="adresa@exemplu.dom"/><br>
    	<a onclick="recover()" style="width:420px;" class="btn btn-primary">Trimite email</a>
   	 	<strong><p id="errorlog" class="help-block" style="margin-top: -10px" align="center"></p></strong>
    </div>
    </form>   
</body>
</html>