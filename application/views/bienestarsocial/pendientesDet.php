<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">
<h4>Casos Pendientes</h4>
<ul class="collapsible"  data-collapsible="expandable">
<li>
  <div class="collapsible-header"><i class="material-icons">filter_drama</i></div>
  <?php
    foreach ($listarPendientes as $key => $val) {
      $cadena = '
	    
	    <div class="collapsible-body"><p>
	      <i>Fecha de la solicitud:</i>  ' . $val->fechasolicitud . '<br>
	      <i>Fecha de la aprobación: </i> ' . $val->fechaaprobacion . '<br>
	      <i>Monto Solicitado: </i> ' . $val->montosolicitado . '<br>
	      </p>
		';
        echo $cadena;
    }
  ?>

  	</div>
	</li>
</ul>
<br>
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>