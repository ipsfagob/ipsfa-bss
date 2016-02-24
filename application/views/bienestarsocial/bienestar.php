<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
<div class="container .hide-on-small-only">

 <div class="row">
 <div class="col s12">


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
  <form class="col s12" 
      action="<?php echo base_url() . 'index.php/BienestarSocial/' . $continuar ?>"  method="post">
      <input type="hidden" name="codigo" value="<?php echo $url; ?>"> </input>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="obs" id="obs" class="materialize-textarea" length="250"></textarea>
          <label for="obs">Introduzca una breve descripción, que nos permita evaluar su situación</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s12">
    			<button class="btn-large waves-effect waves-light"  style="background-color:#00345A" type="submit">Transcribir Planilla
    			    <i class="material-icons right">description</i>
    			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>