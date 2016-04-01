<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>

<div class="container">


<br><br>
 <div class="row">
        <div class="col s12">
          <h5>Nota:</h5>
          <p><font color="red" >* Los archivos adjuntos para el informe medico debe ser en extensión PDF</font></p>
        </div>
  </div>
  <form class="col s12" action="<?php echo base_url() . "index.php/BienestarSocial/subirArchivos";?>"  method="post" 
  enctype="multipart/form-data">
      <input type="hidden" value="4" name="codigo">
       <input type="hidden" value="4" name="url">
      <div class="row">
        <div class="col s12">
           <select id="patologia" name="patologia">
            <?php 
              foreach ($data->rs as $k => $v) {
                echo '<option value="' . $v->nombre . '">' . $v->nombre . '</option>';
              }
            ?>
          </select>
          <label for="familiar">Seleccioné patología</label>
        </div>
      </div>


      <div class="row white">

        <div class="col s12 m6 l4 white" >        
          <div style="width: 120px;height: 120px; margin:0px " id="view-1" >
            <img style="width: 120px;height: 120px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-1" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Informe Medico">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" id="inputFile[1]" onchange="readURL(this, 1, 'pdf');">
                <i class="material-icons">backup</i>
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
                <input class="file-path validate" type="text"  placeholder="Fe de Vida">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" id="inputFile[1]" onchange="readURL(this, 2, 'img');">
                <i class="material-icons">backup</i>
              </div>
            </div>
        </div>  
      </div>


      <div class="row ">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="Obs" class="materialize-textarea" length='256'></textarea>
          <label for="Obs">Observaciones</label>
        </div>
      </div> 
      
      <div class="row">
        <div class="col s12">
          <button class="btn-large medium waves-effect waves-light" type="submit"  style="background-color:#00345A">Enviar Documentos
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
</div>
<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
