
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/solicitud.js"></script>


<div class="container">

<div class="row">
		<ul class="collection with-header">
        	<li class="collection-header"><span class="titulo">Configuración de Documento ( <?php echo $codigo ?> )</span>
        	<i class="material-icons blue-text right">help</i>
        	</li>
		</ul>
	</div>
<div class="row white">
	<ul class="collection  with-header" >
			<?php 
			 	$edit = '';
			 	$vence = '';
				if($tipo > 4) {
					$edit = '<a href="javascript:editarContenido(' . $v->oid . ')" class="secondary-content"><i class="material-icons green-text text-darken-4">edit</i></a>';
					$vence = 'y vence el <label id="f' . $v->oid . '" class="orange-text"> ' . $v->fecha . '</label>';
				}

				echo '<li class="collection-header"><h5>Listado de Documentos </h5></li>';
				foreach ($detalles as $k => $v) {
					$fila = "";
					if($v->archivo != "") {
						$fila = '<li class="collection-item truncate" style="padding-bottom: 20px">
							' . $v->doc . '  <div class="chip right">
							 <a href="' . $ruta . $v->archivo . '" target="top">
						   ' . $v->archivo . '</a>
							  </div>  
								' . $edit . ' 
							  </li>';
					}
					echo $fila;
				}
			?>
			<li class="collection-item" >
			
				<form id="frmData"
			      action="<?php echo base_url();?>index.php/BienestarPanel/notificarCasos/"  method="post">

			      <div class="row">
			        <div class="row">
			         <div class="input-field col s12">

			          <select  id="nota" name="nota">
			            <option value="0">----------</option>
			            <option value="3">SU SOLICITUD HA SIDO VERIFICADA</option>
			            <option value="4">SU SOLICITUD HA SIDO RECHAZADA</option>
			          </select>
			          <label style="color:#000">RESPUESTAS</label>
			        </div>



			        <div class="input-field col s12">
			          <i class="material-icons prefix">mode_edit</i>
			          <textarea id="icon_prefix2" class="materialize-textarea" length="256" name="observa" maxlength="256"></textarea>
			          <label for="icon_prefix2">Escriba las observaciones que se enviaran al afiliado</label>
			        </div>
			      </div>

			      <input type="hidden" name="codigo" value="<?php echo $codigo;?>">
			      <input type="hidden" name="correo" value="<?php echo $correo;?>">
			      <input type="hidden" name="nombre" value="<?php echo $nombre;?>">
			      
			      <div class="row">
			      	<div class="col s6">
			      			<a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" 
			      				onclick="irAtras()">Volver atrás
								<i class="material-icons left">arrow_back</i>       
							</a>
			      	</div>
			      	<div class="col s6">        
			    		<a class="right btn-large waves-effect waves-light" style="background-color:#00345A" onclick="notificarSolicitud()">Notificar
			    			<i class="material-icons left">contact_mail</i>
			    		</a>
			      	</div>
			      </div>       
	    		</form>
			</li>

	</ul>
</div>
  <!-- Modal Structure -->
  <div id="selecciones" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5>Ubicar Contenido</h5>
      <p id="contenidoDoc">
      	
 		<div class="row">
      	<div class="input-field col s12">
          <input  id="fechaVence" class="datepicker imagen-text-right" type="date">
          <label>Fecha de Vencimiento</label>
          <input type="hidden" id="oid">
        </div>
        
        <div class="input-field col s12">
          <select  id="coddoc" >
            <option value="0">----------</option>
            <?php
	            foreach ($combo as $k => $v) {
	            	echo '<option value="' . $v->oid . '">' . $v->nombre . '</option>';
	            }
            ?>
          </select>
          <label>Descripcion Del Documento</label>
        </div>
     </div>


      </p>

    </div>
    <div class="modal-footer">
      <a href="#!" onclick="salvar()" class=" modal-action modal-close waves-effect waves-green btn-flat">
      	<i class="material-icons left green-text text-darken-4">done_all</i>Aceptar
      </a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">
      	<i class="material-icons left red-text text-darken-4">cancel</i>Cancelar
      </a>
    </div>
  </div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
