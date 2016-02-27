

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
<div class="row" style="text-align: left;"> BIENVENIDO, 
<?php echo $Militar->Componente->rango . " " . $Militar->Persona->primerNombre . " " . $Militar->Persona->primerApellido ?></div>
		<div class="row center">  	

      <div class="col s12 m3 13">   
        <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg" class="materialboxed">
                
              </div>
              <div class="card-content">
                <p>Tratamiento Prolongado</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/tratamiento" style="color:white">Tratamiento</a>
              </div>
            </div>
          
      </div>


  		<div class="col s12 m3 13" >
  		 <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
                
              </div>
              <div class="card-content">
                <p>Consultar Medicamentos</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                

                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me" style="color:white">Consultar</a>

              </div>
            </div>
  		</div>

      <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>/public/img/reembolsos.jpg">
                
              </div>
              <div class="card-content">
                <p>Notificar Reembolsos</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1" style="color:white">Reembolso</a>
              </div>
            </div>
      </div>

      <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/ayudasocial.jpg">
                
              </div>
              <div class="card-content">
                <p>Notificar Ayuda</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2" style="color:white">Ayuda Medica</a>
              </div>
            </div>
      </div>

      <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/badan.png">
                
              </div>
              <div class="card-content">
                <p>Medicamentos Badan</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba" style="color:white">Badan</a>
              </div>
            </div>
      </div>
<!-- 

     <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/aval.jpg">
                
              </div>
              <div class="card-content">
                <p>Carta Aval.</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2" style="color:white">Carta Aval</a>
              </div>
            </div>
      </div>

   <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/locatel.jpg">
                
              </div>
              <div class="card-content">
                <p>Carta Aval.</p>
              </div>
              <div class="card-action" style="background-color:#00345A">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2" style="color:white">Locatel</a>
              </div>
            </div>
      </div>

		</div> 

    <div class="row center">
      <div class="col s12 m3 13" >
        <img src="<?php echo base_url(); ?>public/img/badan.jpg" class="responsive-img">
      </div>
      <div class="col s12 m3 13" >
        <img src="<?php echo base_url(); ?>public/img/logo-locatel.png" class="responsive-img">
      </div>

    </div>
 -->

	</div>


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>
    