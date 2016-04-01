
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>

<br>


<div class="container">
<div class="row" style="text-align: left;">

</div>
		<div class="row center">  	

      <div class="col s12 m4 l4">
        
        <div class="btns-smin">
          <div class="btns-sminf small">Tratamiento Prolongado</div>
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

  


    <div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Consultar Medicamentos</div>
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


      <div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Notificar Reembolsos</div>
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
	

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>
