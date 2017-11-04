<?php
include("../auth.php");
include("../header.php");
include("../dbconn.php");
?>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<title>Pacienti</title>
<script>
var temporar = 0;
$(document).ready(function () {
	$('#tabel-cu-pacienti').dataTable();
});
function lanseaza_modal(){
	$("#Adaugare_pacient_modal").modal()
}

</script>
</head>
<body>	
<?php include("../meniu.php");?>
<div class="sheet">
	
<div class="panel-body">
	<ul class="nav nav-tabs">
    	<li class="active"><a href="#lista" name="lista" data-toggle="tab">Listă cu pacienți</a></li>
    	<li class=""><a href="#bolnavi" name="bolnavi" data-toggle="tab">Bolnavi cronici</a></li>
		<li class=""><a href="#indexfisa" name="indexfisa" data-toggle="tab">Fișe medicale</a></li>
        <a class="btn btn-danger" href="../logout.php" id="logout">Deconectare</a>
	</ul>
</div>
<div class="tab-content">
	<br>
    <div class="tab-pane fade active in" id="lista">
    	<div class="panou_butoane">
    		<button class="btn btn-success" onclick="lanseaza_modal()"><i class="fa fa-plus "></i>  Adaugă pacient în listă</button>
    		<button class="btn btn-success" style="float:right"><i class="fa fa-edit "></i> Exportă tabelul in excel</button>
    	</div>
    	
    	<div class="panou-tabel">
    	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tabel-cu-pacienti">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>CNP</th>
                                            <th>CID</th>
                                            <th>Sex</th>
                                            <th>Data nașterii</th>
                                            <th>Asig.</th>
                                            <th>Șterge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 8;
										$result = $conn->prepare("SELECT * FROM pacienti ORDER BY id DESC");
										$result->execute();
										for($j=0; $row = $result->fetch(); $j++){
											$id = $row['id'];
										?>
										<tr name="<?php echo $id; ?>" >
										<?php for($i=0; $i<$n; $i++){ ?>
											<td onclick="lanseaza_modal_editare(<?php echo $id; ?>)"> <?php echo $row[$i]; ?></td>
										<?php } ?> 
											<td><a class="btn btn-danger" name="<?php echo $id; ?>" onclick="sterge_pacient(this.name);"><i class="fa fa-trash-o"></i></a></td>
										</tr> 
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
    	
    </div>
    <div class="tab-pane fade" id="bolnavi"><?php include("bolnavi.php") ?></div>
    <div class="tab-pane fade" id="indexfisa"></div>
</div>
</div>

<div class="modal fade" id="Adaugare_pacient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Adaugă pacient nou în listă</h4>
	</div>
<div class="modal-body">
	<form role="form" id="adauga_pacient_form">
    <div class="form-group input-group">
    	<span class="input-group-addon">Nume</span>
    	<input type="text" class="form-control" id="nume_pacient">
    </div>
    <p class="form-group help-block">*Doar litere și majuscule permise.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Prenume</span>
    	<input type="text" class="form-control" id="prenume_pacient">
    </div>
    <p class="form-group help-block">*Doar litere și majuscule permise.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">CNP</span>
    	<input type="text" class="form-control" id="CNP_pacient">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">CID</span>
    	<input type="text" class="form-control" id="CID_pacient">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 20 de caractere</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Sex</span>
        <select class="form-control" id="sex_pacient">
            <option>Bărbat</option>
            <option>Femeie</option>
        </select>
    </div>
    <p class="form-group help-block">*Apăsați pe căsuța de selectare. Opțiunea bărbat este default.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Data nașterii</span>
    	<input type="date" class="form-control" id="datan_pacient">
    </div>
    <p class="form-group help-block">*Formatul este Lună/Zi/An. Apăsați pe săgeata din dreapta.</p>
    <div class="form-group input-group">
      <span class="input-group-addon">
        <input type="checkbox" id="asigurare_pacient" value="Off"/>
      </span>
      <input type="text" class="form-control" value="Pacientul este asigurat?" disabled/>
    </div>
    <p class="form-group help-block">*Bifați căsuța pentru "Da". Debifați pentru "Nu".</p>

    </form>   
	
	
</div>
<div class="modal-footer">
	
	<button type="button" class="btn btn-warning" data-dismiss="modal">Închide fereastra</button>
	<button type="button" class="btn btn-primary" onclick="salveaza_pacient()">Salvează</button>
	<strong><p id="errorlog" class="help-block"></p></strong>
</div>
</div>
</div>
</div>

<div class="modal fade" id="Editare_pacient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Editare pacient</h4>
	</div>
<div class="modal-body">
	<form role="form" id="editare_pacient_form">
    <div class="form-group input-group">
    	<span class="input-group-addon">Nume</span>
    	<input type="text" class="form-control" id="nume_pacient_e">
    </div>
    <p class="form-group help-block">*Doar litere și majuscule permise.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Prenume</span>
    	<input type="text" class="form-control" id="prenume_pacient_e">
    </div>
    <p class="form-group help-block">*Doar litere și majuscule permise.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">CNP</span>
    	<input type="text" class="form-control" id="CNP_pacient_e">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">CID</span>
    	<input type="text" class="form-control" id="CID_pacient_e">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 20 de caractere</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Sex</span>
        <select class="form-control" id="sex_pacient_e">
            <option>Bărbat</option>
            <option>Femeie</option>
        </select>
    </div>
    <p class="form-group help-block">*Apăsați pe căsuța de selectare. Opțiunea bărbat este default.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Data nașterii</span>
    	<input type="date" class="form-control" id="datan_pacient_e">
    </div>
    <p class="form-group help-block">*Formatul este Lună/Zi/An. Apăsați pe săgeata din dreapta.</p>
    <div class="form-group input-group">
      <span class="input-group-addon">
        <input type="checkbox" id="asigurare_pacient_e"/>
      </span>
      <input type="text" class="form-control" value="Pacientul este asigurat?" disabled/>
    </div>
    <p class="form-group help-block">*Bifați căsuța pentru "Da". Debifați pentru "Nu".</p>

    </form>   
	
	
</div>
<div class="modal-footer">
	
	<button type="button" class="btn btn-warning" data-dismiss="modal">Închide fereastra</button>
	<button type="button" class="btn btn-primary" onclick="salveaza_pacient_edit()">Salvează</button>
	<strong><p id="errorlog_e" class="help-block"></p></strong>
</div>
</div>
</div>
</div>
</body>
</html>