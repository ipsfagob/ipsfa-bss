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
  


  <ul class="collection with-header" id='dtTotal'>
    <li class="collection-header"><h5 id="htotal">Total 0 Bs.</h5></li>
        
  </ul>

  <ul class="collection with-header" style="display: none">
    <li class="collection-header">
    <h5 >Seleccione el banco</h5>
      <div class="input-field col s12 m4 l5 ">
          <select id="banco">
               <?php 
                    

                    foreach ($Militar->Persona->Bancos as $key => $val) {
                         $cadena = '<option value="' . $val->cuenta . '">' .  
                                   $val->nombre . ' | ' . $val->cuenta . ' | ' .  $val->tipoCuenta . '</option>';
                         echo $cadena;
                    }
               ?>
          </select>
     </div>
    </li>
        
  </ul>

  <br>
    


  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Mensaje!!!</h4>
      <p id="msj"></p>
    </div>
    <div class="modal-footer" id="acciones">
      
    </div>
  </div>




    <div class="row">
    <div class="col s12">
      <input type="hidden" value=0 id="total"></input>
      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="mensaje('<?php echo $Codigo?>','0')">volver Atrás
          <i class="material-icons left">arrow_back</i>
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