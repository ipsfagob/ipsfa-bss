<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>



<div class="container">


<p><h5>Recuerde adjuntar todos los documentos del caso</h5></p>
  <form class="col s12">
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn"  style="background-color:#00345A">
              <span>Informe Medico</span>
              <input type="file" multiple>
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
      


</div>
<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
