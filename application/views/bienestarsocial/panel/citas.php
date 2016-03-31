<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<br>
<div class="container">

<h5>Listado De Citas Para Tratamiento Prolongado </h5>
<ul>


  <?php

	$cadena = '';
	$monto = 0;
	foreach ($cita->rs as $k => $val) {
		$arr = json_decode($val->detalle);
		$icon = '';
		$cadena .= '<li>
      	<div class="collapsible-header">
	      <a class="waves-effect waves-light modal-trigger" href="#modal1">
	      <i class="material-icons red-text left">cancel</i>
	      </a>
	      Cita número ( <b><font color="green">' . $val->numero . ' </font></b> ) programada para el día : ' . substr($arr->hasta,0,10 ). ' 
	      <a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $val->numero . '" class="right"><i class="material-icons green-text right">done</i></a>
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


 <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Reportar Solicitud !!!</h4>
     	Mensaje: Su cita ha caducado favor ingresar nuevamente al sistema Ipsfa
      
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Cancelar</a>
      <a class="modal-action modal-close waves-effect waves-blue btn-flat" onclick="Salvar()">Reportar</a>  
    </div>
  </div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>