
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>

<br>


<div class="container">
<div class="row" style="text-align: left;">

</div>
		<div class="row center">  	

      <div class="col s12 m3 13">   
        <div class="card hoverable botones-solicitud">
              <div class="card-image">
                <a href="<?php echo base_url(); ?>index.php/BienestarPanel/tratamiento" style="color:white">
                  <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg" class="responsive-img circle" >
                </a>
              </div>
              <div class="card-content">
                <p>Tratamientos Prolongados</p>
              </div>
              
            </div>
          
      </div>


  		<div class="col s12 m3 13" >
  		 <div class="card hoverable botones-solicitud">
              <div class="card-image">
                <a href="<?php echo base_url(); ?>index.php/BienestarPanel/medicamentos" style="color:white">
                  <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
                </a>
              </div>
              <div class="card-content">
                <p>Solicitud Medicamentos</p>
              </div>              
            </div>
  		</div>

      <div class="col s12 m3 13" >
       <div class="card hoverable botones-solicitud">
              <div class="card-image">
              <a href="<?php echo base_url(); ?>index.php/BienestarPanel/solicitudes" style="color:white">
                  <img src="<?php echo base_url(); ?>/public/img/reembolsos.jpg">
                </a>
              </div>
              <div class="card-content">
                <p>Reembolsos y Ayudas</p>
              </div>
            </div>
      </div>





	</div>
	

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
