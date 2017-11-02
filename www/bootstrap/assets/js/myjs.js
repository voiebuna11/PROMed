function alert_success_out(){
	$('.alert-success').delay(1500).fadeOut('slow');
}
function alert_success(text){
	$("body").append('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + text + '</div>');
	$('.alert-success').fadeIn('slow');
	alert_success_out();
}

function alert_warning_out(){
	$('.alert-warning').delay(1500).fadeOut('slow');
}
function alert_warning(text){
	$("body").append('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + text + '</div>');
	$('.alert-warning').fadeIn('slow');
	alert_warning_out();
}
function alert_danger_out(){
	$('.alert-danger').delay(1500).fadeOut('slow');
}
function alert_danger(text){
	$("body").append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + text + '</div>');
	$('.alert-danger').fadeIn('slow');
	alert_warning_out();
}
function salveaza_pacient(){
	var nume = $("#nume_pacient").val();
	var prenume = $("#prenume_pacient").val();
	var CNP = $("#CNP_pacient").val();
	var CID = $("#CID_pacient").val();
	var sex = $("#sex_pacient").val();
	var datan = $("#datan_pacient").val();
	if($("#asigurare_pacient").is(':checked')){
		var asigurare = 'Da';
	}
	else{
		var asigurare = 'Nu';
	}
	var regex = /^[a-zA-Z\s]*$/;
	var regex_numere = /^\d+$/;
	if(nume.search(regex)==-1 || nume.length < 2 || prenume.search(regex)==-1 || prenume.length < 2 || CNP.search(regex_numere)==-1 || CID.search(regex_numere)==-1 || CNP.length != 13 || CID.length !=20 || datan.length == 0){
		document.getElementById("errorlog").innerHTML = "Formatul datelor este incorect.";
		return 0;
	}
	$.ajax({  
           url:"../scripts/adaugare_pacient.php",  
           method:"POST",
           data:{nume: nume, prenume: prenume, CNP: CNP, CID: CID, sex: sex, datan: datan, asigurare: asigurare}, 
           dataType:"text",  
           success:function(data){
           	if(data == 'Pacient salvat cu succes.') {
           		document.getElementById('adauga_pacient_form').reset();
           		$("#errorlog").css("color", "green");
           	}
         	document.getElementById("errorlog").innerHTML = data;
           }
		});
}
function salveaza_pacient_edit(){
	id = temporar;
	var nume = $("#nume_pacient_e").val();
	var prenume = $("#prenume_pacient_e").val();
	var CNP = $("#CNP_pacient_e").val();
	var CID = $("#CID_pacient_e").val();
	var sex = $("#sex_pacient_e").val();
	var datan = $("#datan_pacient_e").val();
	if($("#asigurare_pacient_e").is(':checked')){
		var asigurare = 'Da';
	}
	else{
		var asigurare = 'Nu';
	}
	var regex = /^[a-zA-Z\s]*$/;
	var regex_numere = /^\d+$/;
	if(nume.search(regex)==-1 || nume.length < 2 || prenume.search(regex)==-1 || prenume.length < 2 || CNP.search(regex_numere)==-1 || CID.search(regex_numere)==-1 || CNP.length != 13 || CID.length !=20 || datan.length == 0){
		document.getElementById("errorlog_e").innerHTML = "Formatul datelor este incorect.";
		return 0;
	}
	$.ajax({  
           url:"../scripts/salvare_pacient.php",  
           method:"POST",
           data:{id: id, nume: nume, prenume: prenume, CNP: CNP, CID: CID, sex: sex, datan: datan, asigurare: asigurare}, 
           dataType:"text",  
           success:function(data){
           	if(data == 0) {
           		window.location.reload("pacienti.php");
           	}
         	document.getElementById("errorlog_e").innerHTML = data; 
           }
		});
}
function sterge_pacient(id){
	if(confirm('Sunteti sigur ca vreti sa stergeti acest pacient ?'))
	$.ajax({  
           url:"../scripts/stergere_pacient.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){  
           		alert_success(data);
           		nume = 'tr[name='+ id +']';
           		$(nume).hide();
           }
		});	
}
function lanseaza_modal_editare(id){
	temporar = id;
	$.ajax({  
           url:"../scripts/preluare_date_pacient.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){  
           		var v = data.split("\n");
           		$("#nume_pacient_e").val(v[0]);
           		$("#prenume_pacient_e").val(v[1]);
				$("#CNP_pacient_e").val(v[2]);
				$("#CID_pacient_e").val(v[3]);
				$("#sex_pacient_e").val(v[4]);
				$("#datan_pacient_e").val(v[5]);
				if(v[6] === 'Da'){
					$("#asigurare_pacient_e").prop('checked', true);
				}
				else{
					$("#asigurare_pacient_e").prop('checked', false);
				}
           }
		});
	$("#Editare_pacient_modal").modal();
}