<script>
	
</script>

<div class="navbar-program" id="navbar-program">
  <!-- Responsive calendar - START -->
  <div class="responsive-calendar" align="center">
  	<h4 style="margin-top: -20px"><span id="curent_day"></span></h4>
  	<br>
    <div class="controls">
        <a class="pull-left" data-go="prev">&#10094;</a>
        <h4><span data-head-month></span></h4>
        <a class="pull-right" data-go="next">&#10095;</a>
    </div><hr>
    <a id="back_to_today" class="btn" onClick="intoarce_ziua()">înapoi la ziua de azi</a><br><br>
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
    <hr>
    <a id="back_to_today" class="btn" onClick="lanseaza_modal_creare_programare()">Programare nouă</a>
    <div class="info" align="justify">
    <div class="dot"><span class="dot dot-red"><i class="fa fa-dot-circle-o"></i></span> Consultatii </div>    
    <div class="dot"><span class="dot dot-green"><i class="fa fa-dot-circle-o"></i></span> Imunizari </div> 
    <div class="dot"><span class="dot dot-blue"><i class="fa fa-dot-circle-o"></i></span> Servicii gravide </div>
    </div>
  </div>
</div>