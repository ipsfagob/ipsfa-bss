<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<br>
<div class="container">

<h4>Modulo de Citas </h4>
Deberá asistir a la Gerencia de Droguería y Farmacia del Instituto. en horario de oficina
<ul  >


  <?php

	$cadena = '';
	$monto = 0;
	foreach ($cita->rs as $k => $val) {
		$arr = json_decode($val->detalle);
		$icon = '';

		$fecha = explode("-", substr($arr->hasta,0,10 ));
		$sFech = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
		$cadena .= '<li>
      	<div class="collapsible-header">
	      Su cita número ( <b><font color="green">' . $val->numero . ' </font></b> ) 
	      ha sido programada para el día : ' . $sFech . '
	      <a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $val->numero . '">' . $icon . '</a>
	    </div>
	   	<div class="collapsible-body" style="padding:10px">

	   	</div>
	   	';

		echo $cadena;
		$cadena = '';	
	}
  ?>
</ul>
<br>
<a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
	<i class="material-icons left">arrow_back</i>       
</a>
</div>


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>