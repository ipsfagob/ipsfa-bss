<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">

<?php //print_r($data->rs); ?>
<h4>Solicitud</h4>
<ul class="collapsible"  data-collapsible="accordion">


  <?php
  	$cadena = '';
  	foreach ($data->rs as $c => $v) {
  		$icon = '<i class="mdi-content-link right amber-text text-darken-4"></i>';
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
		}elseif (is_object($valor)){
			$cadena .= $valor->cantidad . '  |  ' . $valor->nombre . '<br>';
		}else{
			$cadena .= tipo($valor);
		}
		$cadena .= "</div></li>";	
	}

	echo $cadena;


	function tipo($id){
		$msj = '';
		switch ($id) {
			case 1:
				$msj = 'SOLICITUD DE REEMBOLSO PENDIENTE';
				break;
			case 2:
				$msj = 'SOLICITUD DE AYUDA PENDIENTE';
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
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>