

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
	
		<div class="row center">
		<div class="col s12 m4 13">
			  
		  <div class="card medium hoverable">
            <div class="card-image">
              <img src="/ipsfa-dg/public/img/farmaipsfa.jpg" class="materialboxed">
              
            </div>
            <div class="card-content">
              <p>Poseemos una amplia gama en medicamentos no dejes de consultarnos.</p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">Solicita Aquí</a>
            </div>
          </div>
			  
		</div>
		
		
		<div class="col s12 m4 13" >
		 <div class="card medium hoverable">
            <div class="card-image">
              <img src="/ipsfa-dg/public/img/ayudasocial.jpg">
              
            </div>
            <div class="card-content">
              <p>Te ayudamos con protesis, dialisis y medicamentos de alto costo.</p>
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
    