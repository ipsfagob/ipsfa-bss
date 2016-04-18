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
  		$icon = '<a class="waves-effect waves-light modal-trigger right" href="#modal1" 
	      	onclick="setMedicamento(\'' . $v->numero . '\', \'ACEPTADO\');">	      
	      <i class="material-icons green-text right">check_circle</i>
	      </a>

	      ';

		$valor = json_decode($v->detalle);
		$cadena .= '<li>
	      	<div class="collapsible-header">
	      	<i class="material-icons grey-text">playlist_add</i>
			<a class="waves-effect waves-light modal-trigger right" href="#modal1" 
	      	onclick="setMedicamento(\'' . $v->numero . '\', \'RECHAZADO\');">
	      	<i class="material-icons red-text ">remove_circle</i>	      	
	      	</a>
	      	<input id="corr' .  $v->numero . '" value="' . $v->corr . '" type="hidden"></input>
	      	<input id="nomb' .  $v->numero . '" value="' . $v->nomb . '" type="hidden"></input>
		      CODIGO <b><font color="green">' . $v->numero . '</font></b> CEDULA 
		      ( <b><font color="green">' . $v->cedula . '</font></b> )' . $icon . '
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



  <!-- Modal Structure  -->
 


   <div id="modal1" class="card modal modal-fixed-footer" style="width: 400px">
    <div  class="card-image waves-effect waves-block waves-light green center-align" style="height: 160px">
    	<i class="material-icons md-128 green-text text-lighten-2">contact_mail</i><br>
    	<span id="titulo" class="white-text">Nombre</span>
    </div>
    <div class="card-content">
       <div class="input-field col s12" style="display: none">
       		<input id="mail" type="text"></input>
       </div>
       <div class="input-field col s12" style="display: visibility" >
       		<input id="tipo" type="text" readonly></input>
       </div>
       <div class="input-field col s12" style="display: none">
       		<input id="nombre" type="text"></input>
       </div>
       <div class="input-field col s12" style="display: none">
       		<input id="codigo" type="text" ></input>
       </div>
       <div class="input-field col s12">
          <textarea id="contenido" class="materialize-textarea"></textarea>
          <label for="contenido">Introduzca el contenido</label>
        </div>

    </div>
	<div class="card-action">
        <a href="#" onclick="javascript:notificar()" class="right green-text waves-effect waves-block waves-light"> <i class="material-icons left green-text">done_all</i>Notificar</a>
        <a href="#" onclick="javascript:cancel('modal1')" class="right red-text waves-effect waves-block waves-light"> <i class="material-icons left red-text">cancel</i>Cancelar</a>
    </div>    
  </div>


	<div class="preloader-wrapper big active " >
	    <div class="spinner-layer spinner-blue-only">
	      <div class="circle-clipper left">
	        <div class="circle"></div>
	      </div><div class="gap-patch">
	        <div class="circle"></div>
	      </div><div class="circle-clipper right">
	        <div class="circle"></div>
	      </div>
	    </div>
	  </div>


<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/medicamento.js"></script>
