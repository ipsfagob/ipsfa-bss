<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">

<?php //print_r($data->rs); ?>
<h5>Solicitud de medicamentos</h5>
<ul class="collapsible popout"  data-collapsible="accordion">


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