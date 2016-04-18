<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>

<div class="container">
        <h5>Nota:</h5>
        <div class="row">
          <div class="col s12 card-panel blue lighten-2">
            <p style="text-align: justify;">
              <ol>
                <li><font color="black" >* Los archivos adjuntos para el informe medico debe ser en extensión PDF.</font></li>               
              </ol>        
            </p>    
        </div>
      </div>

  
    <form class="col s12" action="<?php echo base_url() . "index.php/BienestarSocial/subirArchivosTratamiento";?>"  method="post" 
    enctype="multipart/form-data">
        <input type="hidden" id= "codigo" name="codigo">
        <input type="hidden" value="3" name="url">
        <input type="hidden" name="diagnostico" id="diagnostico">
        <div class="row white">
          <div class="col s12">
          <label for="patologia">Seleccioné la patología que desea actualizar</label>
             <select id="patologia" name="patologia" onchange="listarKitDetalle()">
             <option value="0">--------------</option>
            <?php 
              foreach ($data->rs as $k => $v) {
                echo '<option value="' . $v->casonro . '">' . $v->nombre . '</option>';
              }
            ?>
          </select>
          
        </div>
      </div>

      <div class="row white" >
        <div class="divContenido"></div>
      </div>

      <!-- 
      | 
      | Control de la interfaz para subir archivos
      | 
      -->
      <div class="row white">
        <div class="col s12 m6 l4 white" >        
          <div style="width: 140px;height: 140px; margin:0px " id="view-1" >
            <img style="width: 140px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-1" />
          </div>
          
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Informe Medico">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name="informe" id="inputFile[1]" accept=".pdf" onchange="readURL(this, 1, 'pdf');">
                <i class="material-icons">file_upload</i>
              </div>
            </div>
        </div>  
 


        <div class="col s12 m6 l4 white" >        
          <div style="width: 140px;height: 140px; margin:0px " id="view-2" >
            <img style="width: 140px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-2" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Fe de Vida">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name="fe" id="inputFile[2]"  accept="image/gif, image/jpeg, image/png" onchange="readURL(this, 2, 'img');">
                <i class="material-icons">file_upload</i>
              </div>
            </div>
        </div>  
      </div>


      <div class="row white "  style="display: none">
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
