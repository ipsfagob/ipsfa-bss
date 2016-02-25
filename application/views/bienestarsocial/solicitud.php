<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/solicitud.js"></script>
<br><br>
<?php //echo $codigo?>
<div class="container .hide-on-small-only">
	
  <div class="row">
        <div class="col s12">
          <h5>Nota:</h5>
          <p><font color="red" >* Los archivos adjuntos para el informe medico debe ser en extensión PDF</font></p>
        </div>
  </div>
 

    <form class="col s12" action="<?php echo base_url() . "index.php/BienestarSocial/subirArchivos";?>"  method="post" enctype="multipart/form-data">
      <!--  1.- CARTA EXPOSICION DE MOTIVOS -->
      <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
       <input type="hidden" value="<?php echo $url; ?>" name="url">
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Exposición de Motivos</span>
              <input type="file" accept=".pdf" name="exposicion">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Carta de Exposión de Motivos" >
            </div>
          </div>
		</div>
      </div> 
      
      
      <!--  2.- CARTA AVAL DE SEGUROS HORIZONTE-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Carta Aval</span>
              <input type="file" name="carta">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Carta Aval de Seguros Horizontes">
            </div>
          </div>
		</div>
      </div> 
      
      
      <!--  3.- CARTA AVAL DE SEGUROS HORIZONTE-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Agotamiento de Cobertura</span>
              <input type="file" name="cobertura">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Agotamiento de Cobertura">
            </div>
          </div>
		</div>
      </div> 
      
      
      <!--  4.- Deuda Contraida-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Deuda Contraida</span>
              <input type="file" name="deuda">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Constancia de la deuda contraida">
            </div>
          </div>
		</div>
      </div> 
      
      <!--  5.- Presupuesto de gastos-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Presupuesto de gastos</span>
              <input type="file" name="presupuesto">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Presupuesto de Gastos">
            </div>
          </div>
		</div>
      </div> 
      
      
      <!--  6.- Informe Medico-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Informe Medico</span>
              <input type="file" accept=".pdf" name="informe">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Informe Medico Firmado y Sellado">
            </div>
          </div>
		</div>
      </div> 
      
      
      <div class="row">
      	<div class="col s12">
			<button class="btn-large waves-effect waves-light" style="background-color:#00345A"  
      name="action" onclick="enviar(<?php echo $url?>)" type="submit">Enviar Documentos
			    <i class="material-icons right">send</i>
			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>