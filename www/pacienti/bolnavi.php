<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Bolnavi cronici</title>
<script>
var temporar = 0;
$(document).ready(function () {
	$('#tabel-cu-cronici').dataTable();
});

</script>
</head>
<body>
    	<div class="panou_butoane">
    		<button class="btn btn-success" onclick="lanseaza_modal_cronic()"><i class="fa fa-plus "></i> Adaugă bolnav cronic în listă</button>
    	</div>
    	<div class="panou-tabel">
    	<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tabel-cu-cronici">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>CNP</th>
                                            <th>CID</th>
                                            <th>Sex</th>
                                            <th>Data nașterii</th>
                                            <th>Afecțiune</th>
                                            <th>Asig.</th>
                                            <th>Tratament</th>
                                            <th>Șterge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 8;
										$result = $conn->prepare("SELECT cronici.id, pacienti.nume, pacienti.prenume,pacienti.CNP, pacienti.CID, pacienti.sex, pacienti.datan, cronici.afectiune, pacienti.asigurat, cronici.tratament FROM pacienti INNER JOIN cronici ON cronici.id = pacienti.id;");
										$result->execute();
										for($j=0; $row = $result->fetch(); $j++){
											$id = $row['id'];
										?>
										<tr name="<?php echo $id; ?>">
										<?php for($i=0; $i<$n+2; $i++){ ?>
											<td onclick="lanseaza_modal_editare_cronici(<?php echo $id; ?>)"> <?php echo $row[$i]; ?></td>
										<?php } ?> 
											<td><a class="btn btn-danger" name="<?php echo $id; ?>" onclick="sterge_cronic(this.name)"><i class="fa fa-trash-o" ></i></a></td>
										</tr> 
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
<div class="modal fade" id="adauga_cronic_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Adaugă pacient în lista de bolnavi cronici</h4>
	</div>
<div class="modal-body">
	<form role="form" id="adauga_cronic_form">
    <div class="form-group input-group">
    	<span class="input-group-addon">CNP</span>
    	<input type="text" class="form-control" id="CNP_pacient_cronic">
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>
    <br>
    <hr>
    <div class="form-group input-group">
    	<span class="input-group-addon">Afecțiune</span>
    	<input type="text" class="form-control" id="afectiune_pacient_cronic">
    </div>
    <p class="form-group help-block">*Doar litere, numere şi spații permise. Minim 2 caractere.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Tratament</span>
    	<textarea cols="24" rows="7" id="tratament_pacient_cronic"></textarea>
    </div>
    <p class="form-group help-block">*Doar litere, numere şi spații permise. Minim 2 caractere.</p>

    </form>   
</div>
<div class="modal-footer">
	
	<button type="button" class="btn btn-warning" data-dismiss="modal">Închide fereastra</button>
	<button type="button" class="btn btn-primary" onclick="salveaza_pacient_cronic()">Adaugă în listă</button>
	<strong><p id="errorlog_cronici" class="help-block error_log"></p></strong>
</div>
</div>
</div>
</div>
<div class="modal fade" id="Editare_pacient_cronic_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Editare pacient din lista de bolnavi cronici</h4>
	</div>
<div class="modal-body">
	<form role="form" id="adauga_cronic_form">
    <div class="form-group input-group">
    	<span class="input-group-addon">CNP</span>
    	<input type="text" class="form-control" id="CNP_pacient_cronic_e" disabled>
    </div>
    <p class="form-group help-block">*Doar numere permise. Obligatoriu 13 caractere.</p>
    <br>
    <hr>
    <div class="form-group input-group">
    	<span class="input-group-addon">Afecțiune</span>
    	<input type="text" class="form-control" id="afectiune_pacient_cronic_e">
    </div>
    <p class="form-group help-block">*Doar litere, numere şi spații permise. Minim 2 caractere.</p>
    <div class="form-group input-group">
    	<span class="input-group-addon">Tratament</span>
    	<textarea cols="24" rows="7" id="tratament_pacient_cronic_e"></textarea>
    </div>
    <p class="form-group help-block">*Doar litere, numere şi spații permise. Minim 2 caractere.</p>

    </form>   
</div>
<div class="modal-footer">
	
	<button type="button" class="btn btn-warning" data-dismiss="modal">Închide fereastra</button>
	<button type="button" class="btn btn-primary" onclick="salveaza_pacient_cronic_edit()">Salvează</button>
	<strong><p id="errorlog_cronici_e" class="help-block error_log"></p></strong>
</div>
</div>
</div>
</div>
</body>
</html>