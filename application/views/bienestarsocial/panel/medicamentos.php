<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>

<br>
<div class="container">

<?php //print_r($data->rs); ?>
<h5>Solicitud de medicamentos</h5>
<ul class="collapsible"  data-collapsible="accordion">


  <?php
  	$cadena = '';
  	foreach ($data->rs as $c => $v) {
  		$icon = '<a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $v->numero . '" class="right">
	      
	      <i class="material-icons green-text right">check_circle</i>
	      </a>

	      ';

		$valor = json_decode($v->detalle);
		$cadena .= '<li>
	      	<div class="collapsible-header">
	      	<i class="material-icons grey-text">playlist_add</i>
			<a class="waves-effect waves-light modal-trigger right" href="#modal1" 
	      	onclick="setValor(\'' . $v->numero . '\', \'' . $v->codigo . '\', 0);">
	      	<i class="material-icons red-text ">remove_circle</i>
	      	<input type="hidden" value="' . $v->numero . '" id="corr' . $v->numero . '">
	      	<input type="hidden" value="' . $v->numero . '" id="nomb' . $v->numero . '">
	      	</a>
	      	
		      ' . substr($v->fecha,0,10 ). ' ( <b><font color="green">' . $v->numero . '</font></b> ) POR CEDULA 
		      ( <b><font color="green">' . $v->cedula . '</font></b> )
		      <a href="' . base_url() . 'index.php/bienestarsocial/panel/adjuntos/' . $v->numero . '">' . $icon . '</a>
		    </div>
		   	<div class="collapsible-body" style="padding:10px">
		   	<div class="row">	
		   	<div class="col s2 m2 l2" style="padding-left:30px">
		   		<img width="80px" height="80px" src="' . base_url() . 'public/doc/medicamento/' . $v->numero . '/' . $v->nombre . '" 
		   		class="img-respoonsive materialboxed">
		   	</div>
		   	<div class="col s10 m10 l10">';

		if(is_array($valor)){	
			foreach ($valor as $key => $value) {					
				$cadena .= $value->cantidad . '  |  ' . $value->nombre . '<br>';
			}
		}else{
			$cadena .= $valor->cantidad . '  |  ' . $valor->nombre . '<br>';
		}
		$cadena .= "</div></div></div></li>";	
	}

	echo $cadena;


  ?>
</ul>
<br>
</div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>