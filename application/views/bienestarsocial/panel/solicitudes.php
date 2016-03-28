
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>



<div class="container">
<h5>Solicitud: Reembolso y Ayudas</h5>
R: Reembolsos | A: Ayudas
	<ul class="collapsible" data-collapsible="accordion" >
		<?php
			//<img class="responsive-img circle" src="http://www.ipsfa.gob.ve/SAEMI/xmlsHtmlsImgs/imgs.afiliados/pers.mil.act/' . $val->codigo . '.jpg">
			$cadena = '';
			$monto = 0;
			foreach ($Solicitudes->rs as $k => $val) {
				$arr = json_decode($val->detalle);

				$icon = '<i class="material-icons">attach_file</i>';
				$cadena .= '<li>
		      	<div class="collapsible-header">
		      		<ul class="collection">
					    <li class="collection-item avatar">
					       
					      ' . tipo($val->tipo) . '
					      <span class="title">CODIGO: <b>' . $val->numero . '</b></span>
					      <p>FECHA: ' . substr($val->fecha,0,10 ). '
					         AFILIADO: ' . $arr->responsable . '
					      </p>				       
					      	<a href="' . base_url() . 'index.php/Panel/solicitudesConfigurar/' . $val->numero . '/' . $val->tipo . '" class="secondary-content  waves-effect waves-light" >' . $icon . '</a>
					    </li>
					</ul>	    
			    </div>
			   	<div class="collapsible-body grey lighten-5" style="padding:10px;">	
			   	<table>';
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

			function tipo($iTipo){
				$tipo = '<i class="circle blue" style="height: 50px; width:50px; font-size: 2em; padding-right: 5px; padding-top: 5px">R</i>';
				if($iTipo == 2) $tipo = '<i class="circle green">A</i>';
				return $tipo;
			}
		?>
	</ul>
	<br style="">

	</div>
	</div>


  <!-- Modal Structure -->
  <div id="selecciones" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Seleccionar y ubicar contenido</h4>
      <p id="contenidoDoc">
      	
      </p>

    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
  </div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
