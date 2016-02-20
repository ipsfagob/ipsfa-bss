<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
<div class="container .hide-on-small-only">

 <div class="row">
 <div class="col s12">
  <?php 
    if($url == 2){
      $this->load->view('bienestarsocial/imp/detApoyo');
    }else{
       $this->load->view('bienestarsocial/imp/detReembolso');
    }
  ?>
  <form class="col s12" 
      action="<?php echo base_url(); ?>index.php/BienestarSocial/imprimirHoja"  method="post">
      <input type="hidden" name="codigo" value="<?php echo $url; ?>"> </input>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="obs" id="obs" class="materialize-textarea" length="250"></textarea>
          <label for="obs">Introduzca una breve descripción, que nos permita evaluar su situación</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s12">
    			<button class="btn-large waves-effect waves-light blue darken-1" type="submit">Notificar
    			    <i class="material-icons right">send</i>
    			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>