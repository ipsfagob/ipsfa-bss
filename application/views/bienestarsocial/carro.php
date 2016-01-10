<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>
<script type="text/javascript"
	src="/ipsfa-bss/application/views/bienestarsocial/js/farmacia.js"></script>

<br>
<div class="container">


<ul class="collection with-header" >
 <li class="collection-header"><h5>Productos Seleccionados</h5></li>
  <?php
    
    foreach ($data as $key => $val) {
    
      $cadena = '<li class="collection-item avatar" id="' . $val['rowid'] . '">' . 
        '<img src="' . base_url() .  '/public/img/productos/' . $val['imagen'] . '" 
        alt="" class="materialboxed circle">' .
        '<span class="title truncate">' . $val['name'] . 
        '</span><p class="truncate">' . $val['name'] . 
        '<a href="javascript:Eliminar(\'' . $val['rowid'] .  '\');" class="secondary-content">
        <i class="mdi-navigation-cancel small"></i></a>';   
        echo $cadena;
    }
    
  ?>

</ul>
<br>

<p><h5>Recuerde que debe adjuntar los digitales de los recipes</h5></p>
  <form class="col s12">
      <div class="row">
        <div class="col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Archivo</span>
              <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Subir Archivo uno o mas">
            </div>
          </div>


        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <label for="icon_prefix2">Observaciones</label>
        </div>
      </div> 
      
   



      <div class="row">
        <div class="col s12">
          <button class="btn-large medium waves-effect waves-light" type="submit" name="action">Solicitar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>       
    </form>
</div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
