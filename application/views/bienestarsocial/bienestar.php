<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
<div class="container .hide-on-small-only">

 <div class="row">
 <div class="col s12">
  <?php 
    if($url == "ap"){
      $this->load->view('bienestarsocial/imp/detApoyo');
    }else{
       $this->load->view('bienestarsocial/imp/detReembolso');
    }
  ?>
  <form class="col s12" 
      action="<?php echo base_url(); ?>index.php/BienestarSocial/imprimirHoja/<?php echo $url; ?>" 
      method="post">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Por favor introduzca una breve descripción, que nos permita evaluar su situación de forma rápida y directa</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s12">
    			<button class="btn-large waves-effect waves-light" type="submit" name="action">Notificar
    			    <i class="material-icons right">send</i>
    			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>