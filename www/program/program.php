<?php
include("../auth.php");
include("../header.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="../bootstrap/assets/css/calendar.css" rel="stylesheet" />
<script src="../bootstrap/assets/js/calendar.js"></script>
<title>Program</title>
<script>
var curentselected = null;
var lastselected = null;
var nume_p;
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10) {
    dd = '0'+dd
} 
if(mm<10) {
    mm = '0'+mm
} 
today = yyyy + '-' + mm + '-' + dd;
var curent_day = today;

var date = new Date();
var minutes = date.getMinutes();
var hour = date.getHours();
var now = hour + ':' + minutes;

$(document).ready(function(){
	div = '<div id="menu_arrow"><br>&#10095;</div>';
	$('#meniu_5').append(div);
	nr = 0;
	document.getElementById("curent_day").innerHTML = curent_day;

	incarca_programari();
	var temp = '';
	
});

</script>
</head>
<body>	
<?php include("../meniu.php");?>
<div class="sheet">
	
<div class="panel-body">
	<ul class="nav nav-tabs" id="test">
    	<li class="active"><a href="#program" name="Program" data-toggle="tab">Programări</a></li>
    	<li><a href="#istoric" name="Istoric" data-toggle="tab">Istoricul programărilor</a></li>
        <a class="btn btn-danger" href="../logout.php" id="logout">Deconectare</a>
	</ul>
</div>
<div class="tab-content">
 	<div class="tab-pane fade active in" id="program">
	<div class="grup_programare" style="margin-top: -2%" id="08_00">
		<div class="ora">8am</div>
			<div class="casuta_programare">
			</div>
		
	</div>
	<div class="grup_programare" id="09_00">
		<div class="ora">9am</div>
			<div class="casuta_programare">
			</div>
	</div>
	<div class="grup_programare" id="10_00">
		<div class="ora">10am</div>
		<div class="casuta_programare">
		</div>
		
	</div>
	<div class="grup_programare" id="11_00">
		<div class="ora">11am</div>
		<div class="casuta_programare">	
		</div>
	</div>
	<div class="grup_programare" id="12_00">
		<div class="ora">Amiază</div>
		<div class="casuta_programare">	
		</div>
	</div>
	<div class="grup_programare" id="13_00">
		<div class="ora">1pm</div>
		<div class="casuta_programare">
		</div>
	</div>
	<div class="grup_programare" id="14_00">
		<div class="ora">2pm</div>
		<div class="casuta_programare">
		</div>
	</div>
	<div class="grup_programare" id="15_00" >
		<div class="ora">3pm</div>
		<div class="casuta_programare">
		</div>
	</div>
	<div class="grup_programare" id="16_00">
		<div class="ora">4pm</div>
		<div class="casuta_programare">
		</div>
	</div>
 		<?php include("meniu_program.php");?>
 	</div>
 	<div class="tab-pane fade" id="istoric">
 		<?php include("istoric_programari.php"); ?>
 	</div>
</div>

</div>
<div class="modal fade" id="creeaza_programare_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Adaugă o programare nouă</h4>
	</div>
<div class="modal-body">
	<div class="responsive-calendar" align="center">
  	<h4 style="margin-top: -20px"><span id="curent_day"></span></h4>
  	<br>
    <div class="controls">
        <a class="pull-left" data-go="prev">&#10094;</a>
        <h4><span data-head-month></span> <span data-head-year></span></h4>
        <a class="pull-right" data-go="next">&#10095;</a>
    </div>
    <div class="day-headers">
      <div class="day header">Lun</div>
      <div class="day header">Mar</div>
      <div class="day header">Mie</div>
      <div class="day header">Joi</div>
      <div class="day header">Vin</div>
      <div class="day header">Sâm</div>
      <div class="day header">Dum</div>
    </div>
    	<div class="days" data-group="days"></div>
    </div>
    <form role="form" id="adauga_programare_form">
    	<div class="form-group input-group">
    		<span class="input-group-addon">Data programării</span>
    		<input type="text" class="form-control" id="data_p" disabled >
    	</div>
    <p class="form-group help-block">*Selectați data in calendarul de mai sus.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">CNP</span>
    	<input type="text" class="form-control" id="CNP_pacient">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Ora</span>
    	<input type="time" class="form-control" id="ora_p">
    </div>
    <p class="form-group help-block">*Apasă pe săgeata din dreapta. AM/PM - inainte/după amiază.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Sex</span>
        <select class="form-control modal_edit" id="nume_p">
            <option>Consultație</option>
            <option>Imunizare</option>
            <option>Serviciu gravide</option>
        </select>
    </div>
    <p class="form-group help-block">*Apasă pe căsuța de select. Opțiunea consultație este default.</p>
    </form> 
  </div>  
<div class="modal-footer">
	<button type="button" class="btn btn-warning" data-dismiss="modal">Închide fereastra</button>
	<button type="button" class="btn btn-primary" onclick="adauga_programare()">Adaugă</button>
	<strong><p id="errorlog" class="help-block error_log"></p></strong>
</div>
</div>
</div>
</div>
</body>
</html>