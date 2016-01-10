

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
	
		<div class="row center">
		<div class="col s12 m4 13">
			  
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
		
		
		<div class="col s12 m4 13" >
		 <div class="card small hoverable">
            <div class="card-image">
              <img src="/ipsfa-bss/public/img/medicamentos.jpg">
              
            </div>
            <div class="card-content">
              <p>Medicamentos especializados.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">Reserva cita</a>
            </div>
          </div>
		</div>

    <div class="col s12 m4 13" >
     <div class="card small hoverable">
            <div class="card-image">
              <img src="/ipsfa-bss/public/img/ayudasocial.jpg">
              
            </div>
            <div class="card-content">
              <p>Protesis, dialisis.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">Reserva cita</a>
            </div>
          </div>
    </div>

		</div>
	</div>


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>
    