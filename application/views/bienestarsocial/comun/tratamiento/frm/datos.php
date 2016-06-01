<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>

<div class="container">
        <div class="row">
          <div class="col s12 card-panel blue lighten-2">
            <p style="text-align: justify;">
              <ol>
                <li><font color="black" >Los archivos adjuntos para el informe medico debe ser en extensión PDF.</font></li>               
              </ol>        
            </p>    
        </div>
      </div>

  
    <form class="col s12" action="<?php echo base_url() . "index.php/BienestarSocial/subirArchivosTratamiento";?>"  method="post" 
    enctype="multipart/form-data" id="frmData">
        <input type="hidden" name="nomb" id="nomb" value="<?php echo $nomb;?>">
        <input type="hidden" id= "oid" name="oid" value="<?php echo $data->rs[0]->nropersona;?>">        
        <input type="hidden" name="diagnostico" id="diagnostico">
        <input type="hidden" id="id" value="<?php echo $data->rs[0]->codnip;?>"></input>
        <div class="row white">
          <div class="col s12 escajas">
            <label class="truncate" for="patologia">Seleccioné la patología que desea actualizar</label>
             <select id="patologia" name="patologia" onchange="listarKitDetalle()" class="browser-default">
             <option value="0">--------------</option>
            <?php 
              foreach ($data->rs as $k => $v) {
                echo '<option value="' . $v->casonro . '">' . $v->nombre . '</option>';
              }
            ?>
          </select>
          <div class="progress" id="load" style="display: none">
              <div class="indeterminate"></div>
          </div> 
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
          <div style="width: 140px;height: 140px; margin-left:15px " id="view-1" >
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
              <div class="progress" id="load1" style="display: none">
                <div class="indeterminate"></div>
              </div>
            </div>
        </div>  
 


        <div class="col s12 m6 l4 white" >        
          <div style="width: 140px;height: 140px; margin-left:15px " id="view-2" >
            <img style="width: 140px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-2" />
          </div>
          <!-- -->
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="Fe de Vida">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name="fe" id="inputFile[2]"  accept="image/jpeg, image/png" onchange="readURL(this, 2, 'img');">
                <i class="material-icons">file_upload</i>
              </div>
            </div>
            <div class="progress" id="load2" style="display: none">
                <div class="indeterminate"></div>
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
        <div class="col s12" id='cargando' style="display: none">
         
          <center><b>Cargando por favor espere</b></center>
          <div class="progress">

              <div class="indeterminate"></div>
          </div> 

       </div>
      <div class="col s6">
        <a id="btnAnterior" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="cargando();irAtras()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
        </a>
      </div>
        <div class="col s6">
          <a id="btnEnviarDoc" class="right btn-large medium waves-effect waves-light" 
          style="background-color:#00345A" onclick="cargando();validar();">Enviar Documentos
            <i class="material-icons right" >send</i>
          </a>
        </div>
      </div>
    </form>
</div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
