<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<br>
<div class="container">
	
<h5>Listado Tratamiento Prolongado Por Actualizar </h5>

<ul>


  <?php

	$cadena = '';
	$monto = 0;
	foreach ($cita->rs as $k => $val) {
		$arr = json_decode($val->detalle);
		$icon = '';
		$cadena .= '<li>
      	<div class="collapsible-header">
	      <a class="waves-effect waves-light modal-trigger" href="#modal1" 
	      onclick="setValor(\'' . $val->numero . '\', \'' . $val->codigo . '\', 0);">
	      	<i class="material-icons red-text left">remove_circle</i>
	      	<input type="hidden" value="' . $val->corr . '" id="corr' . $val->numero . '">
	      	<input type="hidden" value="' . $val->nomb . '" id="nomb' . $val->numero . '">
	      </a>
	      Actualizar tratamiento número ( <b><font color="green">' . $val->numero . ' </font></b> ) 
	      <a href="' . base_url() . 'index.php/BienestarPanel/solicitudesConfigurar/' . $val->numero . '/5" class="right">
	      <i class="material-icons green-text right">forward</i></a>
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





<input type="hidden" value="" id="codigo">  </input>
<input type="hidden" value="" id="id">  </input>
<input type="hidden" value="" id="tipo">  </input>

 <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Reportar Solicitud !!!</h4><br>
     	Mensaje: Su cita ha caducado favor ingresar nuevamente al sistema Ipsfa En linea
      
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Cancelar
      <i class="material-icons left">cancel</i>
      </a>
      <a href="#!" onclick="cancelarCita();" 
      class="modal-action modal-close waves-effect waves-blue btn-flat">Enviar Correo 
      <i class="material-icons left">contact_mail</i>
      </a>  
    </div>
  </div>






<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/citas.js"></script>
<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>