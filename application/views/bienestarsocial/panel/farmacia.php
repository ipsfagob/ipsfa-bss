
<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<div class="container">
<br>
<div class="row">
      <ul class="collection with-header">
          <li class="collection-header"><center><span class="titulo" style="font-size: 19px;color: #000;font-weight: bold;">Droguería y Farmacia</span></center>
          
          </li>
      </ul>
    </div>
  <div class="row" >
      
     

      <div class="col s12 m3 l3">
          
          <div class="btns-smin">
            <div class="btns-sminf small">Citas Para Tratamiento</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons white-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/citas">
              <div class="__ctdrs_xxmall cortar">Este programa está diseñado para la entrega del Kit de medicamentos a los pacientes con tratamientos de por vida</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/farmaipsfa.jpg" style="width:215px;height: 100px">
              </div>
            </a> 
          </div> 
        </div>

     <div class="col s12 m3 l3">
          
          <div class="btns-smin">
            <div class="btns-sminf small">Tratamientos Prolongados</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons white-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/tratamiento">
              <div class="__ctdrs_xxmall cortar">Kit para tratamiento prolongado</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/aval.jpg" style="width:215px;height: 100px">
              </div>
            </a> 
          </div> 
        </div>


      <div class="col s12 m3 l3">
          <div class="btns-smin">
            <div class="btns-sminf small">Medicamentos solicitados</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons white-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/medicamentos">
              <div class="__ctdrs_xxmall cortar">Medicamentos solicitados por afiliados</div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg" style="width:215px;height: 100px">
              </div>
            </a>
          </div>  
        </div>

    
       <div class="col s12 m3 l3" style="display: none">
          <div class="btns-smin">
            <div class="btns-sminf small">Estadisticas Generales</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons white-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/estadistica">
              <div class="__ctdrs_xxmall cortar">Solicitar Deevolución de una cantidad de dinero </div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/estadistica.jpg" style="width:215px;height: 100px">
              </div>
            </a>
          </div>  
        </div>
        <div class="col s12 m3 l3">
          <div class="btns-smin">
            <div class="btns-sminf small">Reportes</div>
            <div class="btns-sminh tooltipped dropdown-button" data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates='dropdown1' >
              <a href="#"><i class="material-icons white-text">more_vert</i></a>
            </div>
            <a href="<?php echo base_url(); ?>index.php/BienestarPanel/reporte">
              <div class="__ctdrs_xxmall cortar">Reportes Generales del Sistema </div>
              <div >
                <img src="<?php echo base_url(); ?>public/img/reporte.jpg" style="width:215px;height: 100px">
              </div>
            </a>
          </div>  
        </div>
        
  </div>

</div>
		

  

     



<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/inicio.js"></script>