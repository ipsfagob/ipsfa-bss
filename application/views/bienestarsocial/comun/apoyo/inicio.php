  <?php 
    $this->load->view("bienestarsocial/inc/cabecera.php");
  ?>

  <br><br>
  <div class="container .hide-on-small-only">

  <h5>Ayuda (<?php echo $Codigo?>)</h5>

  <?php      
     $this->load->view('bienestarsocial/comun/apoyo/frm/datos'); 
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
      <p>¿Está seguro que sus datos son correctos?, una vez realizada la solicitud no podrá realizar cambios</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="salvarA('<?php echo $Codigo?>')">Si</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
  </div>




    <div class="row">
    <div class="col s12">
      <input type="hidden" value=0 id="total"></input>
      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="atras('<?php echo $Codigo?>','2')">Atrás
          <i class="material-icons left">skip_previous</i>
      </button>
      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="mensaje('<?php echo $Codigo?>','2')">Adjuntar Requisitos
          <i class="material-icons right">attach_file</i>
      </button>
      
    </div>
  </div>
  </div>
  <?php 
    $this->load->view("bienestarsocial/inc/pie.php");
  ?>