
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
	alert_danger_out();
}
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
function lanseaza_modal_cronic(){
	document.getElementById("errorlog_cronici").innerHTML = '';
	$("#adauga_cronic_modal").modal();
}
function lanseaza_modal(){
	document.getElementById("errorlog").innerHTML = '';
	$("#Adaugare_pacient_modal").modal()
}
function salveaza_pacient(){
	var nume = $("#nume_pacient").val();
	nume = toTitleCase(nume);
	var prenume = $("#prenume_pacient").val();
	prenume = toTitleCase(prenume);
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
	if(nume.search(regex)==-1 || nume.length < 2 || nume[0] == ' ' || prenume[0] == ' ' || prenume.search(regex)==-1 || prenume.length < 2 || CNP.search(regex_numere)==-1 || CID.search(regex_numere)==-1 || CNP.length != 13 || CID.length !=20 || datan.length == 0){
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
	nume = toTitleCase(nume);
	var prenume = $("#prenume_pacient_e").val();
	prenume = toTitleCase(prenume);
	var CNP = $("#CNP_pacient_e").val();
	var CID = $("#CID_pacient_e").val();
	var sex = $("#sex_pacient_e").val();
	var datan = $("#datan_pacient_e").val();
	var inputs = document.getElementsByClassName("modal_edit");
	if($("#asigurare_pacient_e").is(':checked')){
		var asigurare = 'Da';
	}
	else{
		var asigurare = 'Nu';
	}
	var regex = /^[a-zA-Z\s]*$/;
	var regex_numere = /^\d+$/;
	if(nume.search(regex)==-1 || nume.length < 2 || nume[0] == ' ' || prenume[0] == ' ' || prenume.search(regex)==-1 || prenume.length < 2 || CNP.search(regex_numere)==-1 || CID.search(regex_numere)==-1 || CNP.length != 13 || CID.length !=20 || datan.length == 0){
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
           		$('#tabel-cu-pacienti tr:nth-child('+ nr +')').hide();
           		nr = nr%10;
           		for(i = 2; i <= 7; i++){
           			val = inputs[i-2].value;
           			$('#tabel-cu-pacienti tr:nth-child('+ nr +') td:nth-child('+ i +')').html(val);
           		}
           		$("#Editare_pacient_modal").modal('toggle');
           		$('#tabel-cu-pacienti tr:nth-child('+ nr +')').fadeIn();
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
function lanseaza_modal_editare(id, numar){
	nr = numar;
	document.getElementById("errorlog_e").innerHTML = ''; 
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
function sterge_cronic(id){
	if(confirm('Sunteti sigur ca vreti sa stergeti acest pacient din lista de bolnavi cronici?'))
	$.ajax({  
           url:"../scripts/stergere_cronic.php",  
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
function lanseaza_modal_editare_cronici(id){
	document.getElementById("errorlog_cronici_e").innerHTML = ''; 
	temporar = id;
	$.ajax({  
           url:"../scripts/preluare_date_pacient_cronic.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){  
           		var v = data.split("\n");
           		$("#CNP_pacient_cronic_e").val(v[0]);
           		$("#afectiune_pacient_cronic_e").val(v[1]);
				$("#tratament_pacient_cronic_e").val(v[2]);
           }
		});
	$("#Editare_pacient_cronic_modal").modal();
}
function salveaza_pacient_cronic(){
	var CNP = $("#CNP_pacient_cronic").val();
	var afectiune = $("#afectiune_pacient_cronic").val();
	var tratament = $("#tratament_pacient_cronic").val();
	var regex = /^[A-Za-z0-9]+$/;
	var regex_2 = /^[A-Za-z0-9\s]+$/;
	var regex_numere = /^\d+$/;
	if(CNP.search(regex_numere)==-1 || CNP.length != 13 || afectiune.length < 2 || tratament.lenght < 2 || tratament.search(regex_2)==-1 || afectiune.search(regex_2)==-1){
		document.getElementById("errorlog_cronici").innerHTML = "Formatul datelor este incorect.";
		return 0;
	}
	$.ajax({  
           url:"../scripts/adaugare_cronici.php",  
           method:"POST",
           data:{ CNP: CNP, afectiune: afectiune, tratament: tratament}, 
           dataType:"text",  
           success:function(data){
           	if(data == '1') {
           		document.getElementById('adauga_cronic_form').reset();
           		$("#errorlog_cronici").css("color", "green");
           		document.getElementById("errorlog_cronici").innerHTML = 'Pacient salvat cu succes.'
           	}
           	else{
           		document.getElementById("errorlog_cronici").innerHTML = data;
           	}
           }
		});
}
function salveaza_pacient_cronic_edit(){
	var id = temporar;
	var afectiune = $("#afectiune_pacient_cronic_e").val();
	var tratament = $("#tratament_pacient_cronic_e").val();
	var regex_2 = /^[A-Za-z0-9\s]+$/;
	var regex_numere = /^\d+$/;
	if(afectiune.length < 2 || tratament.lenght < 2 || tratament.search(regex_2)==-1 || afectiune.search(regex_2)==-1){
		document.getElementById("errorlog_cronici_e").innerHTML = "Formatul datelor este incorect.";
		return 0;
	}
	$.ajax({  
           url:"../scripts/salvare_pacient_cronic.php",  
           method:"POST",
           data:{ id: id, afectiune: afectiune, tratament: tratament}, 
           dataType:"text",  
           success:function(data){
           	if(data == 0) {
           		window.location.reload("pacienti.php");
           	}
         	document.getElementById("errorlog_cronici_e").innerHTML = data; 
           }
		});
}
function plusSlides(n) {
  showSlides(slideIndex += n);
  
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  if(n == 1 || n == nr_maxim+1){
  	$("#optionsRadios1").prop("checked", true);
  }
  else if(n == 2){
  	$("#optionsRadios2").prop("checked", true);
  }
  else if(n > 2 && n < nr_maxim){
  	$("#optionsRadios3").prop("checked", true);
  }
  else if(n == nr_maxim){
  	$("#optionsRadios4").prop("checked", true);
  }
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
function incarca_date_fisa(){
	$.ajax({  
           url:"../scripts/preluare_date_fisa.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){
           	if(data != '0'){
          	 	
           		var v = data.split("\n");
           		$("#prenume_t").val(v[0]);
           		$("#prenume_m").val(v[1]);
				$("#varsta_t").val(v[2]);
				$("#varsta_m").val(v[3]);
				$("#localitate").val(v[4]);
				$("#strada").val(v[5]);
				$("#nr").val(v[6]);
				$("#antecedente_f").val(v[7]);
				$("#saptamani").val(v[8]);
				$("#greutate").val(v[9]);
				$("#inaltime").val(v[10]);
				$("#PC").val(v[11]);
				$("#PT").val(v[12]);
				$("#asistat").val(v[13]);
				$("#rang").val(v[14]);
				$("#alimentat").val(v[15]);
				$("#malformatii").val(v[16]);
				$("#antecedente_p").val(v[17]);
				$("#boli").val(v[18]);
				
				$("#nume").val(v[19]);
				$("#prenume").val(v[20]);
				$("#datan").val(v[21]);
				$("#CNP").val(v[22]);
				$("#slide-show").fadeIn();
			 }
			 else{
			 	$("#creeaza_fisa").fadeIn();
			 }
			}
           
		});
}
function save(nume){
	var reg_1 = /^[a-zA-Z\s]*$/; //litere + spatii
	var reg_2 = /^\d+$/; //doar numere
	var reg_3 = /^[A-Za-z0-9\s]+$/; //litere + numere + spatii
	var divs = document.getElementsByClassName("input-group");
	var inputs = document.getElementsByClassName("form-control");
	var v = nume.split(" ");
	camp = v[0];
	reg = v[1];
	tabel = v[2];
	temp = '#' + camp;
	valoare = $(temp).val();
	for(j=0; j<21; j++){
		if(inputs[j].getAttribute('id') == camp){
			i = j;
			k = j;
			if(i > 7)  i--;
			if(i > 8)  i--;
			if(i > 9) i--;	
			if(i > 11) i--;
			if(i > 12) i--;
		}
	}
	if(reg == 'reg_1'){
		reg = reg_1;
	}
	else if(reg == 'reg_2'){
		reg = reg_2;
	}
	else if(reg == 'reg_3'){
		reg = reg_3;
	}
	if(camp == 'nume' || camp == 'prenume' || camp == 'prenume_t' || camp == 'prenume_m' || camp == 'localitate'){
		valoare = toTitleCase(valoare);
	}
	if(camp == 'malformatii' || camp == 'antecedente_p' || camp == 'antecedente_f' || camp == 'boli') valoare = toTitleCase(valoare);
	if((valoare.search(reg)==-1 && camp != 'datan') || (camp == 'CNP' && valoare.length != 13)) {
		divs[i].className = divs[i].className.replace(" has-success", "");
		divs[i].className += " has-error";
		$(temp).select();
		erori++;
		return 0;
	}
	if(camp == 'datan' && !isValidDate(valoare)){
		divs[i].className = divs[i].className.replace(" has-success", "");
		divs[i].className += " has-error";
		$(temp).select();
		erori++;
		return 0;
	}
	
	
		if(v[3] == undefined){
			camp2 = null;
			valoare2 = null;
		}else{
			camp2 = v[3];
			reg2 = v[4];
			temp = '#' + camp2;
			valoare2 = $(temp).val();
			if(reg2 == 'reg_1'){
				reg2 = reg_1;
			}
			else if(reg2 == 'reg_2'){
				reg2 = reg_2;
			}
			else if(reg2 == 'reg_3'){
				reg2 = reg_3;
			}
			if(valoare2.search(reg2)==-1 && camp2 != 'bloc') {
				divs[i].className = divs[i].className.replace(" has-success", "");
				divs[i].className += " has-error";
				$(temp).select();
				erori++;
				return 0;
			}
		}
	
	$.ajax({  
           url:"../scripts/salvare_fisa.php",  
           method:"POST",
           data: {id: id, camp: camp, tabel: tabel, valoare: valoare, camp2: camp2, valoare2: valoare2},
           dataType:"text",  
           success:function(data){  
           		if(data == '1'){
           			divs[i].className = divs[i].className.replace(" has-error", "");
           			divs[i].className += " has-success";
           		}else{
           			erori++;
           		}
           }
		});
}
function isValidDate(dateString) {
  var regEx = /^\d{4}-\d{2}-\d{2}$/;
  if(!dateString.match(regEx)) return false;  // Invalid format
  var d = new Date(dateString);
  if(!d.getTime()) return false; // Invalid date (or this could be epoch)
  return d.toISOString().slice(0,10) === dateString;
}
function creeaza_fisa(){
	$.ajax({  
           url:"../scripts/creare_fisa.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){  
           		window.location.reload("fisa.php?id=" + id);
           }
		});
}
function lanseaza_modal_creare_programare(){
	document.getElementById("adauga_programare_form").reset();
	$("#data_p").val(curent_day);
	document.getElementById("errorlog").innerHTML = '';
	$("#creeaza_programare_modal").modal();
}
function adauga_programare(){
	$("#errorlog").css("color", "red");
	var regex_nr = /^\d+$/;
	data_p = $("#data_p").val();
	CNP = $("#CNP_pacient").val();
	ora_p = $("#ora_p").val();
	nume_p = $("#nume_p").val();
	var ora = ora_p.substring(0, 2);
	if(CNP.search(regex_nr)==-1 || CNP.length != 13 || ora_p.length != 5 || ora < 8 || ora > 16) {
		document.getElementById("errorlog").innerHTML = "CNP incorect sau ora nu corespunde programului.";
		return 0;
	}
	$.ajax({  
           url:"../scripts/adaugare_programare.php",  
           method:"POST",
           data: {data_p: data_p, CNP: CNP, ora_p: ora_p, nume_p: nume_p, ora: ora}, 
           dataType:"text",  
           success:function(data){
           		if(data == "1"){
           			$("#errorlog").css("color", "green");
           			document.getElementById("errorlog").innerHTML = 'Programare salvată cu succes.';
           			return 0;
           		}
           		document.getElementById("errorlog").innerHTML = data;
           }
	});
}
function incarca_programari(){
	$('.casuta_programare > .programare').remove();
	$('.casuta_programare > .programare').hide();
	$.ajax({  
           url:"../scripts/preluare_programari.php",  
           method:"POST",
           data: {data_p: curent_day}, 
           dataType:"text",  
           success:function(data){  
           		temp = data.split("\n");
           		var n = temp.length
           		n--;
           		
           	for(i = 0; i < n; i++){
    			
           		v = temp[i].split("\t");
           		id_p = v[0];
           		if(v[4] == 'Consultație'){
           			culoare = 'red';
           		}
           		else if(v[4] == 'Imunizare'){
           			culoare = 'green';
           		}
           		else if(v[4] == 'Serviciu gravide'){
           			culoare = 'blue';
           		}
				id = v[2].substring(0, 2) + '_00';
				id = '#' + id + ' .casuta_programare';
				ora = v[2];
				if(v[2].substring(0, 2) > 12){
					ora = '0' + (ora[1]-2) + ':' + ora[3] + ora[4] + 'pm';
				}
				else{
					ora = ora + 'am';
				}
				if(v[2].substring(0, 2) == 12){
					ora = ora.replace("am", "pm");
				}
				nume = v[3];
           		$(id).append('<div class="programare"><span class="dot dot-'+ culoare +'"><i class="fa fa-circle"></i></span>'+ ora +' - <div class="nume">'+ nume +'</div><a class="anulare" onclick="anuleaza_programarea('+ id_p +')"><i class="fa fa-times"></i></a></div>');
           		$('.casuta_programare > .programare').fadeIn("slow");
           	}
           }
		});	
}
function anuleaza_programarea(id){
	if(confirm('Doriti sa anulati programarea?')){
		$.ajax({  
           url:"../scripts/anuleaza_programarea.php",  
           method:"POST",
           data: {id: id}, 
           dataType:"text",  
           success:function(data){  
           		alert_success(data);
           		incarca_programari();
           }
		});	
	}
}
function intoarce_ziua(){
	curent_day = today;
	$("#curent_day").hide();
	document.getElementById("curent_day").innerHTML = curent_day;
	$("#curent_day").fadeIn();
	incarca_programari();
	$(lastselected).css("background-color", "transparent");
}