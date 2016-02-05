<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">
<h4>Casos Pendientes</h4>
<ul class="collapsible"  data-collapsible="expandable">
  <?php
    foreach ($listarPendientes as $key => $val) {
      $cadena = '<li>
      	<div class="collapsible-header"><i class="material-icons grey-text">playlist_add</i>
	      ' . $val->tipo . ' ( <b><font color="green">' . $val->oid . '</font></b> )
	      <a href="solicitud"><i class="material-icons right green-text">visibility</i></a>
	    </div>
	    <div class="collapsible-body"><p>
	      <i>Fecha de la solicitud:</i>  ' . $val->fechasolicitud . '<br>
	      <i>Fecha de la aprobación: </i> ' . $val->fechaaprobacion . '<br>
	      <i>Monto Solicitado: </i> ' . $val->montosolicitado . '<br>
	      <i>Monto Aprobado: </i> ' . $val->montoaprobado . '<br>
	      </p>
		</div>
	    </li>';
        echo $cadena;
    }
  ?>
</ul>
<br>
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>