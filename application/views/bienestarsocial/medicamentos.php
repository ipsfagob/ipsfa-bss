<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">

	<div class="row">
		<ul class="collection with-header">
        	<li class="collection-header"><span class="titulo">Solicitud de Medicamentos Badan</span>
        	<i class="material-icons blue-text right">help</i>
        	</li>
		</ul>
	</div>

<div class="row">
	<div class="col s6 m2 l2"><i class="material-icons left amber-text text-darken-4">timer</i>Pendientes</div>
	<div class="col s6 m2 l2"><i class="material-icons left amber-text text-darken-4">assignment_returned</i>Recibido IPSFA</div>
	<div class="col s6 m2 l2"><i class="material-icons left green-text text-darken-4">done</i>Procesando</div>
	<div class="col s6 m2 l2"><i class="material-icons left blue-text text-darken-4">done_all</i>Aceptado</div>
	<div class="col s6 m2 l2"><i class="material-icons left purple-text text-darken-4">lock_open</i>Autorizado</div>
	<div class="col s6 m2 l2"><i class="material-icons left red-text text-darken-4">cancel</i>Rechazado</div>
</div>
<ul class="collapsible"  data-collapsible="accordion">


  <?php
  	$cadena = '';
  	foreach ($data->rs as $c => $v) {
  		$icon = '';//'<i class="mdi-content-link right amber-text text-darken-4"></i>';
		$valor = json_decode($v->detalle);
		$cadena .= '<li>
	      	<div class="collapsible-header"><i class="material-icons grey-text">playlist_add</i>
		      ' . substr($v->fecha,0,10 ). ' ( <b><font color="green">' . $v->numero . '</font></b> )
		      <a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $v->numero . '">' . $icon . '</a>
		    </div>
		   	<div class="collapsible-body" style="padding:10px">	';
		if(is_array($valor)){	
			foreach ($valor as $key => $value) {					
				$cadena .= $value->cantidad . '  |  ' . $value->nombre . '<br>';
			}
		}else{
			$cadena .= $valor->cantidad . '  |  ' . $valor->nombre . '<br>';
		}
		$cadena .= "</div></li>";	
	}

	echo $cadena;


  ?>
</ul>
<br>
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>