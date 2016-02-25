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
  <form class="col s12">
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Informe Medico</span>
              <input type="file" multiple id="informe" accept=".pdf">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Subir Archivo uno o mas">
            </div>
          </div>


        </div>
      </div>


      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Fe de Vida</span>
              <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Subir Archivo">
            </div>
          </div>


        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="Obs" class="materialize-textarea"></textarea>
          <label for="Obs">Observaciones</label>
        </div>
      </div> 
      
<div class="row">
        <div class="col s12">
          <button class="btn-large medium waves-effect waves-light" onclick="enviar()"  style="background-color:#00345A">Enviar Documentos
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>

</div>
<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
