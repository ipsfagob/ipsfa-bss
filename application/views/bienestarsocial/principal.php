

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
<div class="row" style="text-align: left;">

</div>
		<div class="row center">  	

      <div class="col s12 m6 l3">
        
        <div class="btns-smin">
          <div class="btns-sminf small">Tratamiento Prolongado</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="#"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <a href="<?php echo base_url(); ?>index.php/BienestarSocial/tratamiento">
            <div class="__ctdrs_xxmall cortar">Este programa está diseñado para la entrega del Kit de medicamentos a los pacientes con tratamientos de por vida</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg">
            </div>
          </a> 
        </div> 
      </div>

      <div class="col s12 m6 l3">
        <div class="btns-smin">
          <div class="btns-sminf small">Consultar Medicamentos</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <div class="__ctdrs_xxmall cortar">Permite ver la disponibilidad interna</div>
          <div >
            <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
          </div>
        </div>  
      </div>

      <div class="col s12 m6 l3">
        <div class="btns-smin">
          <div class="btns-sminf small">Notificar Reembolsos</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <div class="__ctdrs_xxmall cortar">Solicitar Deevolución de una cantidad de dinero </div>
          <div >
            <img src="<?php echo base_url(); ?>public/img/reembolsos.jpg">
          </div>
        </div>  
      </div>

      <div class="col s12 m6 l3">
        <div class="btns-smin">
          <div class="btns-sminf small">Notificar Ayuda</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <div class="__ctdrs_xxmall cortar">Solicituar ayuda para adquiri medicamentos</div>
          <div >
            <img src="<?php echo base_url(); ?>public/img/ayudasocial.jpg">
          </div>
        </div>  
      </div>

      <div class="col s12 m6 l3">
        <div class="btns-smin">
          <div class="btns-sminf small">Medicamentos Badan</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <div class="__ctdrs_xxmall cortar">Consultar Existencias Badan</div>
          <div >
            <img src="<?php echo base_url(); ?>public/img/badan.jpg">
          </div>
          
        </div>  
      </div>



      <div class="col s12 m6 l3">
        <div class="btns-smin">
          <div class="btns-sminf small">Carta Aval</div>
          <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
            <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba"><i class="material-icons black-text">more_vert</i></a>
          </div>
          <div class="__ctdrs_xxmall cortar">Realizar Citas Para la el proceso</div>
          <div >
            <img src="<?php echo base_url(); ?>public/img/aval.jpg">
          </div>
          
        </div>  
      </div>






<!--
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
    