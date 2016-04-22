
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>



<div class="container">
<h5><?php echo $titulo; ?></h5>
R: Reembolsos | A: Ayudas
	<ul class="collapsible" data-collapsible="accordion" >
		<?php
			//<img class="responsive-img circle" src="http://www.ipsfa.gob.ve/SAEMI/xmlsHtmlsImgs/imgs.afiliados/pers.mil.act/' . $val->codigo . '.jpg">
			$cadena = '';
			$monto = 0;
			foreach ($Solicitudes->rs as $k => $val) {
				$arr = json_decode($val->detalle);
				

				$acc = estatus($val->estatus,  $val->numero, $val->tipo);
				if($accion == 1) {
					$acc = '<a href="' . base_url() . 'index.php/BienestarPanel/autorizarSolicitud/' . $val->numero . '/4" 
					class="secondary-content  waves-effect waves-light tooltipped" 
					data-position="top" data-delay="10" data-tooltip="Autorizar Solicitud">
					<i class="material-icons purple-text">lock_open</i></a>';
				}

					
				$cadena .= '<li>
		      	<div class="collapsible-header">
		      		<ul class="collection">
					    <li class="collection-item avatar">
					       
					      ' . tipo($val->tipo) . '
					      <span class="title">CODIGO: <b>' . $val->numero . '</b></span>
					      <p>FECHA: ' . substr($val->fecha,0,10 ). '
					         AFILIADO: ' . $arr->responsable . '
					      </p>				       
					      	' . $acc . '
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
				$tipo = '<i class="circle blue">R</i>';
				if($iTipo == 2) $tipo = '<i class="circle green">A</i>';
				return $tipo;
			}

			function estatus($id, $numero, $tipo){
				$contenido = '<a href="' . base_url() . 'index.php/BienestarPanel/solicitudesConfigurar/' . $numero . '/' . $tipo . '" class="secondary-content  waves-effect waves-light tooltipped" 
					data-position="top" data-delay="10" data-tooltip="Procesar Solicitud"><i class="material-icons">forward</i></a>';
				if($id == 4)
					$contenido = '<a href="' . base_url() . 'index.php/BienestarPanel/autorizarSolicitud/' . $numero . '/5" class="secondary-content  waves-effect waves-light tooltipped" 
					data-position="top" data-delay="10" data-tooltip="Enviar a Finanzas"><i class="material-icons purple-text text-darken-4">local_shipping</i></a>';
				
				return $contenido;
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
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Notificar</a>
    </div>
  </div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
