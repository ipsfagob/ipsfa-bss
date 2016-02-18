

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
	
		<div class="row center">  		
  		<div class="col s12 m3 13" >
  		 <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
                
              </div>
              <div class="card-content">
                <p>Consultar Medicamentos</p>
              </div>
              <div class="card-action">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me">Medicamentos</a>
              </div>
            </div>
  		</div>

      <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>/public/img/reembolsos.jpg">
                
              </div>
              <div class="card-content">
                <p>Notificar Reembolsos.</p>
              </div>
              <div class="card-action">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1">Reembolso</a>
              </div>
            </div>
      </div>

      <div class="col s12 m3 13" >
       <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/ayudasocial.jpg">
                
              </div>
              <div class="card-content">
                <p>Notificar Apoyos.</p>
              </div>
              <div class="card-action">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2">Apoyo</a>
              </div>
            </div>
      </div>



      <div class="col s12 m3 13">   
        <div class="card small hoverable">
              <div class="card-image">
                <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg" class="materialboxed">
                
              </div>
              <div class="card-content">
                <p>Farmacia y Drogueria.</p>
              </div>
              <div class="card-action">
                <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">Solicita Aquí</a>
              </div>
            </div>
          
      </div>

		</div> <!-- //Fin de la Fila -->

    <div class="row center">
      <div class="col s12 m3 13" >
        <img src="<?php echo base_url(); ?>public/img/badan.jpg" class="responsive-img">
      </div>
      <div class="col s12 m3 13" >
        <img src="<?php echo base_url(); ?>public/img/logo-locatel.png" class="responsive-img">
      </div>

    </div>


	</div>


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>
    