<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Index Fisa</title>
<script>
function deschide_fisa(){
	CNP = $("#search-box").val();
	var regex_tel = /^\d+$/;
	if(CNP.search(regex_tel)==-1 || CNP.length!=13) {
		alert_danger("Format CNP invalid.");
		return 0;
	}
	$.ajax({  
           url:"../scripts/deschide_fisa.php",  
           method:"POST",
           data:{CNP: CNP}, 
           dataType:"text",  
           success:function(data){  
         		if(data == '1'){
         			alert_warning("CNP-ul nu este înregistrat în baza de date.");
         			return 0;
         		}else{
         			window.location.replace("fisa.php?id=" + data);
         		}
           }
		}); 
}
$(document).keypress(function(e) {
    if(e.which == 13) deschide_fisa();
});
</script>
</head>
<body>
	<img id="background-indexfisa" src="../bootstrap/images/fise1.jpg" alt="Smiley face" height="92%" width="100%">

<div class="search-box">
<div class="form-group input-group input-group-lg">
  <span class="input-group-addon">Căutare</span>
  <input type="text" class="form-control" placeholder="Introdu CNP-ul pacientului" id="search-box"/>
  <span class="input-group-btn"><button class="btn btn-default" onclick="deschide_fisa()" type="button"><i class="fa fa-search"></i></button></span>
</div>
</div>
</body>
</html>