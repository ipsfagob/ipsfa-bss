  <?php 
    $this->load->view("bienestarsocial/inc/cabecera.php");
  ?>

  <br><br>
  <div class="container ">

  <h5>Reembolso (<?php echo $Codigo?>)</h5>

  <?php      
     $this->load->view('bienestarsocial/comun/reembolso/frm/datos'); 
  ?>

  <ul class="collection with-header" id='dtReembolso'>
    <li class="collection-header"><h5>Datos de selección</h5></li>
    
  </ul>
  
  <br>

  <ul class="collection with-header" id='dtTotal'>
    <li class="collection-header"><h5 id="htotal">Total 0 Bs.</h5></li>
    
  </ul>

   <br>

   <div class="row white">
     
      <div class="col s12 m12 l12 escajas">
          <label>Seleccione el banco</label>
          <select id="banco" name='banco' class="browser-default">
               <?php 
                    

                    foreach ($Militar->Persona->Bancos as $key => $val) {
                         $cadena = '<option value="' . $val->cuenta . '">' .  
                                   $val->nombre . '|' . $val->cuenta . '|' .  $val->tipoCuenta . '</option>';
                         echo $cadena;
                    }
               ?>
          </select>
           
     </div>
   </div>
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
  	<div class="col s6">
        <input type="hidden" value=0 id="total"></input>
        <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="mensaje('<?php echo $Codigo?>','0')">volver Atrás
            <i class="material-icons left">arrow_back</i>
        </button>
      </div>
      <div class="col s6">
  		  <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="mensaje('<?php echo $Codigo?>','1')">Adjuntar Requisitos
  		    <i class="material-icons right">attach_file</i>
  		  </button>     
  	</div>
  </div>
  </div>
  <?php 
    $this->load->view("bienestarsocial/inc/pie.php");
  ?>