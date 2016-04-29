<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>
<div class="container">
<?php //print_r($data->rs); ?>
<h5>Reembolsos y Ayudas Solicitadas</h5>

<div class="row">
	<!--
		<div class="col s6 m3 l3"><i class="material-icons left amber-text text-darken-4">timer</i>Pendiente</div>
		<div class="col s6 m3 l3"><i class="material-icons left blue-text">description</i>Expediente Digital</div>
		<div class="col s6 m3 l2"><i class="material-icons left red-text text-darken-4">cancel</i>Rechazado</div>
	-->
	<div class="col s6 m3 l2"><i class="material-icons left amber-text text-darken-4">timer</i>Pendiente</div>
	<div class="col s6 m3 l2"><i class="material-icons left amber-text text-darken-4">assignment_returned</i>Recibido IPSFA</div>
	<div class="col s6 m3 l2"><i class="material-icons left green-text text-darken-4">settings</i>Procesando</div>
	<div class="col s6 m3 l2"><i class="material-icons left blue-text text-darken-4">done</i>Verificado</div>
	<div class="col s6 m3 l2"><i class="material-icons left blue-text text-darken-4">lock_open</i>Autorizado</div>
	<div class="col s6 m3 l2"><i class="material-icons left purple-text text-darken-4">local_shipping</i>En Finanzas</div>
	

</div>
<ul class="collapsible"  data-collapsible="accordion">


  <?php
 			$cadena = '';
			$monto = 0;
			foreach ($data->rs as $k => $val) {
				$arr = json_decode($val->detalle);
				$icon = '<i class="material-icons right amber-text text-darken-4">attach_file</i>';
				$cadena .= '<li>
		      	<div class="collapsible-header"><i class="material-icons grey-text hide-on-small-only">playlist_add</i>
		      		
			      ' . tipo($val->tipo)  . ' 
			      ' . substr($val->fecha,0,10 ). ' ( <b><font color="green">' . $val->numero . '</font></b> )
			      ' . estatus($val->estatus, $val->numero). '	      
			    </div>
			   	<div class="collapsible-body" style="padding:10px">	
			   	<table class="responsive-table">';	

				foreach ($arr->solicitud as $c => $v) {
					$cadena .=  '<tr><td>' . $v->parentesco . '</td>
							<td>' . $v->nombre . '</td>
							<td>' . $v->concepto . '</td>
							<td align="center">' . $v->monto . '</td>
							<td></td>
						</tr>';
					$monto += $v->monto; 
				}
				$cadena .= "</table></div></li>";	
				echo $cadena;
				$cadena = '';	
			}
			

 
    function estatus($id, $numero){
    	$msj = '';
    	$print = '<a target="top" href="' . base_url() . 'index.php/BienestarSocial/imprimirHoja/' . $numero . '/' . $id . '">
			      	<i class="material-icons right green-text hide-on-small-only">print</i>
			      </a>';
		switch ($id) {
			case 0:
				$msj = '<i class="material-icons left amber-text text-darken-4 hide-on-large-only">alarm_on</i>';
				$msj .= '<i class="material-icons right amber-text text-darken-4 hide-on-small-only">alarm_on</i>';
				$print = '<a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $numero . '/' . $id . '">
			      	<i class="material-icons right blue-text hide-on-small-only">description</i>
			      </a>';
				break;
			case 1:
				$msj = '<i class="material-icons left amber-text text-darken-4 hide-on-large-only">assignment_returned</i>';
				$msj .= '<i class="material-icons right amber-text text-darken-4 hide-on-small-only">assignment_returned</i>';
				break;
			case 2:
				//$msj = '<i class="material-icons right amber-text text-darken-4">alarm_on</i>';
				$msj = '<i class="material-icons left green-text text-darken-4 hide-on-large-only">settings</i>';
				$msj .= '<i class="material-icons right green-text text-darken-4 hide-on-small-only">settings</i>';
				break;
			case 3:
				$msj = '<i class="material-icons left blue-text text-darken-4 hide-on-large-only">done</i>';
				$msj .= '<i class="material-icons right blue-text text-darken-4 hide-on-small-only">done</i>';
				break;
			case 4:
				$msj = '<i class="material-icons left blue-text text-darken-4 hide-on-large-only">lock_open</i>';
				$msj .= '<i class="material-icons right blue-text text-darken-4 hide-on-small-only">lock_open</i>';
				break;
			case 5:
				$msj = '<i class="material-icons left purple-text text-darken-4 hide-on-large-only">local_shipping</i>';
				$msj .= '<i class="material-icons right purple-text text-darken-4 hide-on-small-only">local_shipping</i>';
				break;
			case 9:
				$print = '';
				$msj = '<i class="material-icons left red-text text-darken-4 hide-on-large-only">cancel</i>';
				$msj .= '<i class="material-icons right red-text text-darken-4 hide-on-small-only">cancel</i>';
				break;


			default:
				# code...
				break;
		}
		return $msj . $print;
    }


	function tipo($id){
		$msj = '';
		switch ($id) {
			case 1:
				$msj = 'REEMBOLSO';
				break;
			case 2:
				$msj = 'APOYO';
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