<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">

<h4>Casos Generales</h4>
<ul class="collapsible popout"  data-collapsible="accordion">
  <?php
    foreach ($Militar as $key => $val) {
    	foreach ($val as $c => $v) {
    		$icon = '<i class="material-icons right amber-text text-darken-4">alarm_on</i>';
    		$aprobado = '<font color="RED"><b>PENDIENTE</b></font>';
    		if($v->fechaAprobado != '') {
    		  $icon = '<i class="material-icons right green-text">done</i>';
    		  $aprobado = $v->fechaAprobado;
    		}
    		$cadena = '<li>
	      	<div class="collapsible-header"><i class="material-icons grey-text">playlist_add</i>
		      ' . $v->tipo . ' ( <b><font color="green">' . $v->codigo . '</font></b> )
		      ' . $icon . '
		    </div>
		   	<div class="collapsible-body" style="padding:10px">	    	
			      <table class="responsive-table highlight">
			      	<thead class="light-green lighten-3">
				      	<tr><th>Parentesco</th>
				      		<th>Nombre</th>
				      		<th>Concepto</th>
				      		<th>M. Solicitado</th>
				      		<th>%</th>
				      	</tr>
			      	</thead>
			      	<tbody>';
			      	$total = 0;
			      	foreach ($v->detalle as $k => $d) {
			      		$cadena .= '<tr>
				      		<td>' . $d->parentesco . '</td>
				      		<td>' . $d->nombre . '</td>
				       		<td>' . strtoupper($d->concepto) . '</td>
				      		<td>' . $d->monto . '</td>
				      		<td>' . $d->porcentaje . '</td>
				      	</tr>';
				      	$total += $d->monto; 
			      	}
				     $cadena .= '</tbody></table><br><div class="divider"></div><br>
				     <table class="responsive-table highlight">
				    </tbody>
				    <thead class="light-blue lighten-3">
				      	<tr><th>Solicitud</th>
				      		<th>Aprobación</th>
				      		<th>Monto</th>
				      		<th>Aprobado</th>
				      		
				      	</tr>
			      	</thead>
			      	<tbody>
				      	<tr>
				      		<td>' . $v->fechaSolicitado . '</td>
				      		<td>' . $aprobado . '</td>
				       		<td>' . $v->montoSolicitado . '</td>
				      		<td>' . $v->montoAprobado . '</td>
				      	</tr>
			      	</tbody>
			      </table>
			    </div>
		    </li>';
	        echo $cadena;	
    	}
    }
  ?>
</ul>
<br>
</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>