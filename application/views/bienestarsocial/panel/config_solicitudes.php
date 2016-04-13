
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/solicitud.js"></script>


<div class="container">
<br>
<ul class="collection  with-header" style="">

	
		<?php 
			echo '<li class="collection-header"><h5>Listado de Documentos ( ' . $codigo . ' )</h5></li>';
			foreach ($detalles as $k => $v) {
				$fila = "";
				if($v->archivo != "") {
					$fila = '<li class="collection-item truncate" style="padding-bottom: 20px">
						' . $v->doc . ' <div class="chip right">
						 <a href="' . $ruta . $v->archivo . '" target="top">
					   ' . $v->archivo . '</a>
						  </div>  
							<a href="javascript:editarContenido(' . $v->oid . ')" class="secondary-content"><i class="material-icons green-text 
							text-darken-4">edit</i></a>
						  </li>';
				}
				echo $fila;
			}
		?>
		<li class="collection-item" >
		<br>
			<form class="col s12" 
		      action="<?php echo base_url();?>index.php/BienestarPanel/notificarCasos/"  method="post">

		      <div class="row">
		        <div class="row">
		         <div class="input-field col s12">

		          <select  id="descripciondocumento" name="nota">
		            <option value="0">----------</option>
		            <option value="SU SOLICITUD HA SIDO ACEPTADA Y ENVIADA A FINANZAS">SU SOLICITUD HA SIDO ACEPTADA Y ENVIADA A FINANZAS</option>
		            <option value="SU SOLICITUD PRESENTA ERROR EN LOS DOCUMENTOS">SU SOLICITUD PRESENTA ERROR EN LOS DOCUMENTOS</option>
		            <option value="SU SOLICITUD HA SIDO RECHAZADA (LOS DOCUMENTOS NO SON LEGIBLES)">SU SOLICITUD HA SIDO RECHAZADA (LOS DOCUMENTOS NO SON LEGIBLES)</option>
		          </select>
		          <label style="color:#000">OBSERVACIONES PRE-CARGADAS</label>
		        </div>



		        <div class="input-field col s12">
		          <i class="material-icons prefix">mode_edit</i>
		          <textarea id="icon_prefix2" class="materialize-textarea" length="256" name="observa"></textarea>
		          <label for="icon_prefix2">Escriba las observaciones que se enviaran al afiliado</label>
		        </div>
		      </div>

		      <input type="hidden" name="codigo" value="<?php echo $codigo;?>">
		      <input type="hidden" name="correo" value="<?php echo $correo;?>">
		      <input type="hidden" name="nombre" value="<?php echo $nombre;?>">
		      
		      <div class="row">
		      	<div class="col s12">        
		    		<button class="btn-large waves-effect waves-light" style="background-color:#00345A" type="submit">Notificar
		    			<i class="material-icons left">contact_mail</i>
		    		</button>
		      	</div>
		      </div>       
    		</form>

		</li>

</ul>

  <!-- Modal Structure -->
  <div id="selecciones" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Seleccionar y ubicar contenido</h4>
      <p id="contenidoDoc">
      	
 		<div class="row">
      <div class="input-field col s12">
          <input  id="fechaVence" class="datepicker" type="date">
          <label>Fecha de Vencimiento</label>
        </div>
        
        <div class="input-field col s12">
          <select  id="descripciondocumento" >
            <option value="0">----------</option>
            <?php
	            foreach ($combo as $k => $v) {
	            	echo '<option value="0">' . $v->nombre . '</option>';
	            }
            ?>
          </select>
          <label>Descripcion Del Documento</label>
        </div>
     </div>


      </p>

    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">
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
