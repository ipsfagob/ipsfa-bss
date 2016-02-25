<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br>
<div class="container">
<?php //print_r($data->rs); ?>
<h4>Solicitudes </h4>
<ul class="collapsible popout"  data-collapsible="accordion">


  <?php
 			$cadena = '';
			$monto = 0;
			foreach ($data->rs as $k => $val) {
				$arr = json_decode($val->detalle);
				$icon = '<i class="material-icons right amber-text text-darken-4">attach_file</i>';
				$cadena .= '<li>
		      	<div class="collapsible-header"><i class="material-icons grey-text">playlist_add</i>
			      ' . tipo($val->tipo)  . ' - 
			      ' . substr($val->fecha,0,10 ). ' ( <b><font color="green">' . $val->numero . '</font></b> )
			      <a href="' . base_url() . 'index.php/BienestarSocial/adjuntos/' . $val->numero . '">' . $icon . '</a>
			    </div>
			   	<div class="collapsible-body" style="padding:10px">	
			   	<table>
			   	';	

				foreach ($arr as $c => $v) {
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
</div>

<?php 
	$this->load->view("bienestarsocial/inc/pie.php");
?>