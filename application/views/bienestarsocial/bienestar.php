<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/bienestar.js"></script>

<div class="container">


 <div class="row"  >
 <div class="col s12 " id='main'>

  <?php 
    $continuar = 'continuarReembolso';
    if($url == 2){
      $this->load->view('bienestarsocial/comun/apoyo/doc/leeme');
      $continuar = 'continuarApoyo';
    }else{
       $this->load->view('bienestarsocial/comun/reembolso/doc/leeme');
       
      //$this->load->view('bienestarsocial/imp/formReembolso');
    }
 
  ?>
 </div>
 <div class="col s12" id='cargando' style="display: none">
   
  <center><b>Cargando por favor espere</b></center>
  <div class="progress">

      <div class="indeterminate"></div>
  </div> 

 </div>

 <div class="col s12">
  <form class="col s12" 
      action="<?php echo base_url() . 'index.php/BienestarSocial/' . $continuar ?>"  method="post">
      <input type="hidden" name="codigo" value="<?php echo $url; ?>"> </input>
      <div class="row" style="display: none">
        <div class="input-field col s12">
          <textarea name="obs" id="obs" class="materialize-textarea" length="250"></textarea>
          <label for="obs">Introduzca una breve descripción, que nos permita evaluar su situación</label>
        </div>
      </div> 
      <div class="row" >
      	<div class="col s6">
          <a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
          </a>
          </div>
          <div class="col s6">
    			<button class="right btn-large waves-effect waves-light" onclick="cargando()" style="background-color:#00345A" type="submit">llenar Planilla
    			    <i class="material-icons right">description</i>
    			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>