<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>

<br>
<div class="container">

<div class="row">
	<ul class="collection with-header">
    	<li class="collection-header"><span class="titulo">Solicitud de Medicamentos Badan</span>
    	<i class="material-icons blue-text right">help</i>
    	</li>
	</ul>
</div>
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
	      	
		      CODIGO <b><font color="green">' . $v->numero . '</font></b> CEDULA 
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
</div>



  <!-- Modal Structure -->
 


   <div id="modal1" class="card modal modal-fixed-footer" style="width: 560px">
    <div class="card-image waves-effect waves-block waves-light green center-align" style="height: 160px">
    	<br>
    	<i class="material-icons md-128 white-text">contact_mail</i>
    </div>
    <div class="card-content">
       <div class="input-field col s12">
       		<input id="mail" type="text"></input>
       		<label for="mail">Correo Electronico</label>
       </div>
       <div class="input-field col s12">
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <label for="icon_prefix2">Introduzca el contenido</label>
        </div>

    </div>
	<div class="card-action">
        <a href="#" class="right green-text waves-effect waves-block waves-light"> <i class="material-icons left green-text">done_all</i>Notificar</a>
        <a href="#" class="right red-text waves-effect waves-block waves-light"> <i class="material-icons left red-text">cancel</i>Cancelar</a>
    </div>    
  </div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>