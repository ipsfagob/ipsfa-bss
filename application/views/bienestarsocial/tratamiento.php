<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<br>
<div class="container">
	
<div class="row">
	<ul class="collection with-header">
    	<li class="collection-header"><span class="titulo">Estatus del Tratamiento Prolongado</span></li>
	</ul>
</div>
<div class="row">
	<div class="col s6 m3 l3"><i class="material-icons left amber-text text-darken-4">assignment_returned</i>Recibido IPSFA</div>
	<div class="col s6 m3 l3"><i class="material-icons left green-text text-darken-4">settings</i>Procesando</div>
	<div class="col s6 m3 l3"><i class="material-icons left blue-text text-darken-4">done_all</i>Aceptado</div>
	<div class="col s6 m3 l3"><i class="material-icons left red-text text-darken-4">cancel</i>Rechazado</div>
</div>
<ul>


  <?php

	$cadena = '';
	$monto = 0;
	foreach ($cita->rs as $k => $val) {
		$arr = json_decode($val->detalle);
		$icon = '';
		//$sDiagnostico = explode("-", $val->observacion);
		$cadena .= '<li>
      	<div class="collapsible-header">
	      
	      ' . $arr->diagnostico . ' <b><font color="green">' . $val->numero . ' </font></b> a nombre de:
	      ' . $arr->nomb . ' 
	      
	      ' . estatus($val->estatus). '
	    </div>
	   	<div class="collapsible-body" style="padding:10px">

	   	</div>
	   	';

		echo $cadena;
		$cadena = '';	
	}

	function estatus($id){
    	$msj = '';
		switch ($id) {
			case 0:
				$msj = '<i class="material-icons left amber-text text-darken-4 hide-on-large-only">assignment_returned</i>';
				$msj .= '<i class="material-icons right amber-text text-darken-4 hide-on-small-only">assignment_returned</i>';				
				break;
			case 2:
				$msj = '<i class="material-icons left green-text text-darken-4 hide-on-large-only">settings</i>';
				$msj .= '<i class="material-icons right green-text text-darken-4 hide-on-small-only">settings</i>';
				break;
			case 3:
				$msj = '<i class="material-icons left blue-text text-darken-4 hide-on-large-only">done_all</i>';
				$msj .= '<i class="material-icons right blue-text text-darken-4 hide-on-small-only">done_all</i>';
				break;
			case 4:
				$msj = '<i class="material-icons left red-text text-darken-4 hide-on-large-only">cancel</i>';
				$msj .= '<i class="material-icons right red-text text-darken-4 hide-on-small-only">cancel</i>';
				break;

			


			default:
				# code...
				break;
		}
		return $msj;
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