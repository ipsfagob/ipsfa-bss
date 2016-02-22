  <?php 
    $this->load->view("bienestarsocial/inc/cabecera.php");
  ?>

  <br><br>
  <div class="container .hide-on-small-only">

  <h5>Reembolso (<?php echo $Codigo?>)</h5>

  <?php      
     $this->load->view('bienestarsocial/comun/reembolso/frm/datos'); 
  ?>

  <ul class="collection with-header" id='dtReembolso'>
    <li class="collection-header"><h5>Datos de selección</h5></li>
    
  </ul>
  
  <br>

  <ul class="collection with-header" id='dtReembolso'>
    <li class="collection-header"><h5 id="htotal">Total 0 Bs.</h5></li>
    
  </ul>

  <br><br>
    
    <div class="row">
  	<div class="col s12">
      <input type="hidden" value=0 id="total"></input>
  		<button class="btn-large waves-effect waves-light blue darken-1" onclick="salvarR('<?php echo $Codigo?>')">Continuar
  		    <i class="material-icons right">send</i>
  		</button>
  	</div>
  </div>
  </div>
  <?php 
    $this->load->view("bienestarsocial/inc/pie.php");
  ?>