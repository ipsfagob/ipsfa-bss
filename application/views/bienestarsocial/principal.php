

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
	
		<div class="row center">

<div class="col s12 m3 13" >
     
            
              <img src="/ipsfa-bss/public/img/clave.png">
              
            
     
    </div>




		<div class="col s12 m3 13">	  
		  <div class="card small hoverable">
            <div class="card-image">
              <img src="/ipsfa-bss/public/img/farmaipsfa.jpg" class="materialboxed">
              
            </div>
            <div class="card-content">
              <p>Farmacia y Drogueria.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">Solicita Aquí</a>
            </div>
          </div>
			  
		</div>
		
		
		<div class="col s12 m3 13" >
		 <div class="card small hoverable">
            <div class="card-image">
              <img src="/ipsfa-bss/public/img/medicamentos.jpg">
              
            </div>
            <div class="card-content">
              <p>Notificar Reembolsos.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">Reserva cita</a>
            </div>
          </div>
		</div>

    <div class="col s12 m3 13" >
     <div class="card small hoverable">
            <div class="card-image">
              <img src="/ipsfa-bss/public/img/ayudasocial.jpg">
              
            </div>
            <div class="card-content">
              <p>Notificar Apoyos.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">Reserva cita</a>
            </div>
          </div>
    </div>

		</div>

    <div class="row center">
      <div class="col s12 m3 13" >
        <img src="/ipsfa-bss/public/img/badan.jpg" class="responsive-img">
      </div>
      <div class="col s12 m3 13" >
        <img src="/ipsfa-bss/public/img/logo-locatel.png" class="responsive-img">
      </div>

    </div>


	</div>


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>
    