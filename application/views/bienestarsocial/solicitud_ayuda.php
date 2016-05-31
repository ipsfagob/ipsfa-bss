
<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/solicitud.js"></script>
<div class="container .hide-on-small-only">
  
<div class="row">
        <h5>Notas Por Ayuda (<?php echo $codigo;?>): </h5><div class="divider"></div>
              
        <div class="row">
          <div class="col s12 card-panel blue lighten-2">
            <p style="text-align: justify;">
              <ol>
                <li>Los archivos adjuntos para el informe medico debe ser en extensión PDF, y deben estar en un orden correlativo acorde al Informe Médico, de igual forma los documentos deben estar legibles,
              asimismo el Informe medico deberá estar vigente.<br></li>
                <li>Recuerde que si la factura es mayor a tres meses se considera extemporanéa.
                </li>
              </ol>        
            </p>    
          </div>
          </div>    
        </div>

    <div class="row white">
      <div class="col s12" id='cargando' style="display: none">
         
          <center><b>Cargando por favor espere</b></center>
          <div class="progress">

              <div class="indeterminate"></div>
          </div> 

       </div>
    </div>
    <div class="row white">
    <form  id='frmData' class="col s12" action="<?php echo base_url();?>index.php/BienestarSocial/subirArchivos"  method="post" enctype="multipart/form-data">
      
      <?php
        foreach ($data as $clave => $valor) {
          $i =0;
          foreach ($valor as $k => $v) { 
               $i++;
            $cabecera = '
            <div class="col s12 m6 l4 white" >        
          <div style="width: 140px;height: 140px; margin-left:20px " id="view-'. $i .'" >
            <img style="width: 140px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-'. $i .'" />
          </div>
          
          <div class="file-field input-field col file-field-input-field" >
              <div class="file-path-wrapper file-path-wrapper-sopor">
                <input class="file-path validate" type="text"  placeholder="' .  $v['descripcion'] . '">
              </div>
                    
              <div class="btn btns-rd-c">
                <input type="file" name="' .  $v['nombre'] . '" id="inputFile['. $i .']" accept=".pdf" onchange="readURL(this, '. $i .', \'pdf\');">
                <i class="material-icons">file_upload</i>
              </div>
            </div>
        </div>';
        echo $cabecera;
          }
        }       
      ?>
     
      <input type="hidden" value="<?php echo $codigo;?>" name="codigo" id="codigo">
      <input type="hidden" value="<?php echo $url;?>" name="url" id="url">
      <div class="row">
        <div class="col s12">
          <a id="btnEnviarDoc" class="right btn-large waves-effect waves-light" style="background-color:#00345A"  
          name="action" onclick="imprimirHoja()">Enviar Documentos
              <i class="material-icons right">send</i>
          </a>
        </div>
      </div>       
    </form>
  </div>
 </div>


 
<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>