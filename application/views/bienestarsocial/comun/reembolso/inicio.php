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
    


     <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Mensaje!!!</h4>
      <p>¿Está seguro que desea realizar la siguiente solicitud?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"  onclick="salvarR('<?php echo $Codigo?>')">Si</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
  </div>




    <div class="row">
  	<div class="col s12">
      <input type="hidden" value=0 id="total"></input>
      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="atras('<?php echo $Codigo?>','1')">Atrás
          <i class="material-icons left">skip_previous</i>
      </button>
  		<button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="mensaje('<?php echo $Codigo?>','1')">Adjuntar Requisitos
  		    <i class="material-icons right">attach_file</i>
  		</button>
      
  	</div>
  </div>
  </div>
  <?php 
    $this->load->view("bienestarsocial/inc/pie.php");
  ?>