<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );

?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/farmacia.js"></script>

<br>
<div class="container">

  <div class="row">
  <div class="col s12 card-panel blue lighten-2">
    
        <ol><li><b>Recuerde que debe adjuntar el recipe médico</b></li></ol>
      
  </div>
  </div>

     <div class="row">
        <div class="input-field col s12 m12 l12">
        <select id="estado" name='estado'>
        <option value="0">-------------</option>
          <?php
            $sEstado = '';
            foreach ($Estado as $key => $val) {
              $sEstado .= '<option value="' . $val->codigo . '">' . $val->nombre . '</option>';
            }
            echo $sEstado;
          ?>
          </select>
          <label>Ubicacíón para ser atendido por el IPSFA y BADAN</label>
        </div>

      </div>
  <ul class="collection with-header" id='producto'>
   <li class="collection-header"><h5>Médicamentos Seleccionados</h5></li>
    <?php
    
    foreach ($data as $key => $val) {
      

      $cadena = '<li class="collection-item avatar" id="' . $val['rowid'] . '">' .
        '<span class="title truncate">' . $val['name'] . 
        '</span><p class="truncate"> Cantidad: ' . $val['qty'] . ' <br> Prioridad: ' . prioridad($val['prioridad']) .
        '<a href="javascript:Eliminar(\'' . $val['rowid'] .  '\');" class="secondary-content">
        <i class="material-icons right red-text">cancel</i></a>';   
        echo $cadena;
    }
    
    function prioridad($val){
      switch ($val) {
        case 0:
          return 'Baja';
          break;
        case 1:
          return 'Media';
          break;
        case 2:
          return 'Alta';
          break;
        default:
          return 'Baja';
          break;
      }
    }
  ?>

</ul>
<br>


  <h5>Recipe Medico</h5>
  <form class="col s12" enctype="multipart/form-data" id="frmCorreo" method="post">
      <div class="row white">

        <div class="col s12 m6 l4 white" >        
          <div style="width: 120px;height: 120px; margin:0px " id="view-1" >
            <img style="width: 120px;height: 120px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-1" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Recipe Médico">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name='recipe' id="inputFile[1]"  accept="image/gif, image/jpeg, image/png" onchange="readURL(this, 1, 'img');">
                <i class="material-icons">file_upload </i>
              </div>
            </div>
        </div> 

        <div class="col s12 m6 l4 white" >        
          <div style="width: 120px;height: 120px; margin:0px " id="view-2" >
            <img style="width: 120px;height: 120px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-2" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Informe Médico">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name='recipe' id="inputFile[2]"  accept=".pdf" onchange="readURL(this, 2, 'pdf');">
                <i class="material-icons">file_upload </i>
              </div>
            </div>
        </div>  

        <div class="col s12 m6 l4 white" >        
          <div style="width: 120px;height: 120px; margin:0px " id="view-3" >
            <img style="width: 120px;height: 120px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-3" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Ficha Tratamiento">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name='recipe' id="inputFile[3]"  accept="image/gif, image/jpeg, image/png" onchange="readURL(this, 3, 'img');">
                <i class="material-icons">file_upload </i>
              </div>
            </div>
        </div>  
      </div>
         
          
      <div class="row" style="display: none">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="Observa" class="materialize-textarea" length="256"></textarea>
          <label for="Observa">Observaciones</label>
        </div>
      </div> 
      
    </form>
    <div class="row">
        <div class="col s12">
          <a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
              <i class="material-icons left">arrow_back</i>
           
          </a>
          <a href="<?php echo base_url();?>index.php/BienestarSocial/farmacia/ba" class="btn-large waves-effect waves-light"  style="background-color:#00345A; display: none" >Seleccionar mas
              <i class="material-icons right">add_shopping_cart</i>
           
          </a>
          <button class="btn-large medium waves-effect waves-light "  style="background-color:#00345A" onclick="Salvar()">Solicitar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
</div>


   <div id="msg" class="card modal modal-fixed-footer" style="width: 400px; height: 400px">
    <div  class="card-image waves-effect waves-block waves-light green center-align" style="height: 160px">
      <center>
        <img src="<?php echo base_url(); ?>public/img/logo-central-I.png" style="width:150px;">
      </center>
      
      <span id="titulos" class="white-text">Enviando Información por favor espere</span>
    </div>
    <div class="card-content center-align">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
    </div>
    <br><br><br>
    </div>
  <div class="card-action">
        Todos los documentos deberán ser consignados en el Instituto...
    </div>    
  </div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
