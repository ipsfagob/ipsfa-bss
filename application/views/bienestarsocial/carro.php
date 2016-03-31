<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );

?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/farmacia.js"></script>

<br>
<div class="container">


<ul class="collection with-header" id='producto'>
 <li class="collection-header"><h5>Productos Seleccionados</h5></li>
  <?php
    
    foreach ($data as $key => $val) {
      

      $cadena = '<li class="collection-item avatar" id="' . $val['rowid'] . '">' .
        '<span class="title truncate">' . $val['name'] . 
        '</span><p class="truncate"> Cantidad: ' . $val['qty'] . ' <br> Prioridad: ' . prioridad($val['prioridad']) .
        '<a href="javascript:Eliminar(\'' . $val['rowid'] .  '\');" class="secondary-content">
        <i class="mdi-navigation-cancel small"></i></a>';   
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

<p><h5>Recuerde que debe adjuntar los digitales de los recipes</h5></p>
  <form class="col s12">
      <div class="row">



      <div class="file-field input-field col s12 m6 l4 file-field-input-field">
                <div class="file-path-wrapper-pre-view" id="pre-view-1"></div>
                <div class="file-path-wrapper file-path-wrapper-sopor">
          <input class="file-path validate" type="text"  placeholder="Presupuesto">
        </div>
                
                <div class="btn btns-rd-c">
          <input type="file" id="bdd_copia_carmil">
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="Obs" class="materialize-textarea" length="256"></textarea>
          <label for="Obs">Observaciones</label>
        </div>
      </div> 
      
    </form>
    <div class="row">
        <div class="col s12">
          <button class="btn-large medium waves-effect waves-light "  style="background-color:#00345A" onclick="Salvar()">Solicitar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
</div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>
