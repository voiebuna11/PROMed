<?php
 include("../header.php");
 include("../dbconn.php"); 
 if(isset($_GET['id'])){
 	$id = $_GET['id'];
 }
?>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="../bootstrap/assets/css/fisa.css" rel="stylesheet" />
<title>Fisa</title>
<script>
var slideIndex = 1;
var id = <?php echo $id; ?>;
var total;
var erori = 0;
$(document).ready(function(){
	var slides = document.getElementsByClassName("mySlides");
	total = slides.length;
	document.getElementById("id_fisa_menu").innerHTML += id;
	slides[slideIndex-1].style.display = "block";
	incarca_date_fisa();
	nr_maxim = $('.mySlides').length;
});
$(document).ready(function () {
	$('#tabel-consultatii').dataTable({
    	"aLengthMenu" : [6] ,
	});
	
	
});
function save_all(){
	var buttons = document.getElementsByClassName("btn-success");
	erori = 0;
	for(i = 0; i < 17 ; i++){
		nume = buttons[i].getAttribute('name');
		save(nume);
	}
	if(erori == 0){
	var divs = document.getElementsByClassName("input-group");
	setTimeout(function() {
		for(i=0;i<18;i++){
			divs[i].className = divs[i].className.replace(" has-error", "");
			divs[i].className += " has-success";
		}
		
	}, 1200);
	}
}

</script>
</head>
<body>
<?php include("meniu_fisa.php"); ?>
<div class="sheet">
<img id="background-indexfisa" src="../bootstrap/images/fise1-70%.jpg">
<button class="btn btn-primary btn-lg" type="button" onclick="creeaza_fisa()" id="creeaza_fisa"><i class="fa fa-plus-square"></i> Creează o fișă nouă</button>

<div class="slideshow-container" id="slide-show">
<a id="prev" onclick="plusSlides(-1)">&#10094;</a>
<div class="mySlides fade">
  <div class='left-col'>
  	<h3 align="center">Informații generale</h3>
  <form role="form" class="fisa_form">
  <div class="form-group input-group">
  	<span class="input-group-addon">Numele</span>
  	<input type="text" class="form-control" id="nume"/>
  	<span class="input-group-btn"><button class="btn btn-success" type="button" name="nume reg_1 pacienti" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere și majuscule permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Prenumele</span>
  	<input type="text" class="form-control" id="prenume"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="prenume reg_1 pacienti" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere și majuscule permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Data naşterii</span>
  	<input type="text" class="form-control" id="datan"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="datan reg_4 pacienti" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Formatul este An/Lună/Zi.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">CNP</span>
  	<input type="text" class="form-control" id="CNP"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="CNP reg_2 pacienti" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>

	<div id="descr"><strong>Prenumele:</strong></div>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Tatălui</span>
  	<input type="text" class="form-control" id="prenume_t"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="prenume_t reg_1 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere și majuscule permise.</p>
  <div class="form-group input-group">
  	<span class="input-group-addon">Mamei</span>
  	<input type="text" class="form-control"/ id="prenume_m">
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="prenume_m reg_1 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>

  <p class="form-group help-block">*Doar litere și majuscule permise.</p>
	<div id="descr"><strong>Domiciliu:</strong></div>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Localitatea</span>
  	<input type="text" class="form-control" id="localitate"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="localitate reg_1 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere și majuscule permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Strada</span>
  	<input type="text" class="form-control" id="strada"/>

  	<span class="input-group-addon">Nr.</span>
  	<input type="text" class="form-control" id="nr"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="strada reg_3 fisa nr reg_3" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, numere şi spații permise.</p>
  </form>
  </div>
  
  
  <div class='right-col'>
  	<h3 align="center">Anamneza</h3>
  <form role="form" class="fisa_form_2">
  <div class=" form-group input-group">
  	<span class="input-group-addon">Antecedente fiziologice</span>
  	<input type="text" class="form-control" id="antecedente_f"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="antecedente_f reg_3 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, numere şi spații permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Născut la</span>
  	<input type="text" class="form-control" id="saptamani"/>
  	<span class="input-group-addon">săptămâni</span>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="saptamani reg_3 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar numere permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Greutatea</span>
  	<input type="text" class="form-control" id="greutate"/>
  	<span class="input-group-addon">g.</span>
  	
  	<span class="input-group-addon">Inălțimea</span>
  	<input type="text" class="form-control" id="inaltime"/>
  	<span class="input-group-addon">cm.</span>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="greutate reg_2 fisa inaltime reg_2" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar numere permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">PC</span>
  	<input type="text" class="form-control" id="PC"/>
  	<span class="input-group-addon">cm.</span>

  	<span class="input-group-addon">PT</span>
  	<input type="text" class="form-control" id="PT"/>
  	<span class="input-group-addon">cm.</span>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="PC reg_2 fisa PT reg_2" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar numere permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Asistat la naștere</span>
  	<input type="text" class="form-control" id="asistat"/>
  	
  	<span class="input-group-addon">Rangul copilului</span>
  	<input type="text" class="form-control" id="rang"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="asistat reg_1 fisa rang reg_2" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, respectiv numere permise.</p>
  <div class="form-group input-group">
  	<span class="input-group-addon">Alimentat natural până la</span>
  	<input type="text" class="form-control" id="alimentat"/>
  	<span class="input-group-addon">luni</span>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="alimentat reg_2 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar numerepermise.</p>
  <div class="form-group input-group">
  	<span class="input-group-addon">Malformații congenitale</span>
  	<input type="text" class="form-control" id="malformatii"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="malformatii reg_3 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, numere şi spații permise.</p>
  <div class=" form-group input-group">
  	<span class="input-group-addon">Antecedente patologice</span>
  	<input type="text" class="form-control" id="antecedente_p"/>
  	<span class="input-group-btn" ><button class="btn btn-success" type="button" name="antecedente_p reg_3 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, numere şi spații permise.</p>
  <div class="form-group input-group">
  	<span class="input-group-addon">Boli</span>
  	<input type="text" class="form-control" id="boli"/>
  	<span class="input-group-btn"><button class="btn btn-success" type="button" name="boli reg_3 fisa" onclick="save(this.name)"><i class="fa fa-floppy-o"></i></button></span>
  </div>
  <p class="form-group help-block">*Doar litere, numere şi spații permise.</p>
  </form>
  </div>
</div>

<div class="mySlides fade">
  <div class="panou-tabel">
    	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tabel-consultatii">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Simptome</th>
                                            <th>Diagnostic</th>
                                            <th>Prescriptii</th>
                                            <th>Zile de concediu*</th>
                                            <th>Adeverinta elib.</th>
           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 7;
										$result = $conn->prepare("SELECT id_c, data_c, simptome, diagnostic, prescriptii, concediu, nume_adev FROM consultatii WHERE id = $id");
										$result->execute();
										$nr = 0;
										for($j=0; $row = $result->fetch(); $j++){
											$nr++;
										?>
										<tr>
										<?php for($i=0; $i<$n; $i++){ ?>
											<td> <?php echo $row[$i]; ?></td>
										<?php } ?> 
										</tr> 
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
      </div>
</div>

<div class="mySlides fade">
  3
</div>

<div class="mySlides fade">
  4
</div>

<div class="mySlides fade">
  5
</div>

<a id="next" onclick="plusSlides(1)">&#10095;</a>
</div>
</div>
	
</body>
</html>