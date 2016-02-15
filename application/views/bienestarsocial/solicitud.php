<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
<?php echo $codigo?>
<div class="container .hide-on-small-only">
	
 
 

    <form class="col s12" action="solicitud" method="post">
      <!--  1.- CARTA EXPOSICION DE MOTIVOS -->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Exposición de Motivos</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Carta de Exposión de Motivos">
            </div>
          </div>
		</div>
      </div> 
      
      
      <!--  2.- CARTA AVAL DE SEGUROS HORIZONTE-->
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Carta Aval</span>
              <input type="file">
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
            <div class="btn">
              <span>Agotamiento de Cobertura</span>
              <input type="file">
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
            <div class="btn">
              <span>Deuda Contraida</span>
              <input type="file">
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
            <div class="btn">
              <span>Presupuesto de gastos</span>
              <input type="file">
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
            <div class="btn">
              <span>Informe Medico</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Adjuntar Informe Medico Firmado y Sellado">
            </div>
          </div>
		</div>
      </div> 
      
      
      <div class="row">
      	<div class="col s12">
			<button class="btn-large waves-effect waves-light" type="submit" name="action">Enviar Documentos
			    <i class="material-icons right">send</i>
			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>