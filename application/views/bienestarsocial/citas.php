<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<br>
<div class="container">

<h4>Modulo de Citas </h4>
<ul  >


  <?php

	$cadena = '';
	$monto = 0;
	foreach ($cita->rs as $k => $val) {
		$arr = json_decode($val->detalle);
		$icon = '';
		$cadena .= '<li>
      	<div class="collapsible-header">
	      Pendiente ( <b><font color="green">' . $val->numero . ' </font></b> ) y vence : ' . substr($arr->hasta,0,10 ). '
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
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>