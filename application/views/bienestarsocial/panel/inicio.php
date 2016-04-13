
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<div class="container">
<br>

  <div class="row" >
      
     



      <div class="col s12 m3 l3">
          
          <div class="btns-smin">
            <div class="btns-sminf small">Citas Para Tratamiento</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons black-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/citas">
              <div class="__ctdrs_xxmall cortar">Este programa está diseñado para la entrega del Kit de medicamentos a los pacientes con tratamientos de por vida</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg">
              </div>
            </a> 
          </div> 
        </div>

     <div class="col s12 m3 l3">
          
          <div class="btns-smin">
            <div class="btns-sminf small">Actualizar Tratamiento</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons black-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/tratamiento">
              <div class="__ctdrs_xxmall cortar">Este programa está diseñado para la entrega del Kit de medicamentos a los pacientes con tratamientos de por vida</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg">
              </div>
            </a> 
          </div> 
        </div>


      <div class="col s12 m3 l3">
          <div class="btns-smin">
            <div class="btns-sminf small">Solicitud Medicamentos</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons black-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/medicamentos">
              <div class="__ctdrs_xxmall cortar">Permite ver la disponibilidad interna</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
              </div>
            </a>
          </div>  
        </div>

      <div class="col s12 m3 l3">
          <div class="btns-smin">
            <div class="btns-sminf small">Listar Inventario</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons black-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/sidrofan">
              <div class="__ctdrs_xxmall cortar">Permite ver la disponibilidad Sidrofan</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
              </div>
            </a>
          </div>  
        </div>


        <div class="col s12 m3 l3">
          <div class="btns-smin">
            <div class="btns-sminf small">Reemb/Apoyo Pendientes</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons black-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/solicitudes">
              <div class="__ctdrs_xxmall cortar">Solicitar Deevolución de una cantidad de dinero </div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/reembolsos.jpg">
              </div>
            </a>
          </div>  
        </div>
  </div>

</div>
		

  

     





<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
