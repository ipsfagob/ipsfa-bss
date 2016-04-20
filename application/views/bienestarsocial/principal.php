

<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container">
<div class="row" style="text-align: left;">

</div>
		<div class="row center">  	

      <div class="col s12 m4 l4">
        
        <div class="btns-smin">
          <div class="btns-sminf small">Tratamiento Prolongado</div>
          <div class="btns-sminh  dropdown-button">
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="<?php echo base_url(); ?>index.php/BienestarSocial/tratamiento">
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
          <!-- data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates="dropdown1" -->
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me">
            <div class="__ctdrs_xxmall cortar">Permite ver la disponibilidad interna</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg">
            </div>
          </a>
        </div>  
      </div>


      <?php 

        $menu = '<div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Notificar Reembolsos</div>
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="' . base_url() . 'index.php/BienestarSocial/bienestar/1">
            <div class="__ctdrs_xxmall cortar">Solicitar Devolución de una cantidad de dinero </div>
            <div >
              <img src="' . base_url() . 'public/img/reembolsos.jpg">
            </div>
          </a>
        </div>  
      </div>';


        if($_SESSION['cedula'] == '2888818' || $_SESSION['cedula'] == '2894093'){
          $menu = '';
        }
        echo $menu;
      ?>

      

      <?php 

        $menu = '<div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Notificar Ayuda</div>
          <div class="btns-sminh  dropdown-button"  >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="' . base_url() . 'index.php/BienestarSocial/bienestar/2">
            <div class="__ctdrs_xxmall cortar">Solicitar ayuda para adquirir medicamentos</div>
            <div >
              <img src="' . base_url() . 'public/img/ayudasocial.jpg">
            </div>
          </a>
        </div>  
      </div>';


        if($_SESSION['cedula'] == '2888818' || $_SESSION['cedula'] == '2894093'){
          $menu = '';
        }
        echo $menu;
      ?>
      



      <div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Medicamentos Badan</div>
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba">
            <div class="__ctdrs_xxmall cortar">Consultar Existencias Badan</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/badan.jpg">
            </div>
          </a>
        </div>  
      </div>




      <?php 

        $menu = '<div class="col s12 m4 l4" style="display:visibility">
        <div class="btns-smin">
          <div class="btns-sminf small">Carta Aval</div>
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="' . base_url() . 'index.php/BienestarSocial/cartaaval">
            <div class="__ctdrs_xxmall cortar">Realizar Citas Para la el proceso</div>
            <div >
              <img src="' . base_url() . 'public/img/aval.jpg">
            </div>
          </a>
        </div>  
      </div>';

      
        if($_SESSION['cedula'] == '2888818' || $_SESSION['cedula'] == '2894093'){
          $menu = '';
        }
        echo $menu;
      ?>

      






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
    