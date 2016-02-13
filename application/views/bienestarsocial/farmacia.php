<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/farmacia.js"></script>

<br>

<div class="row">
	<div class="col s12 ">
	<nav>
    <div class="nav-wrapper white ">      
        <div class="input-field col s10">
          <input id="search" type="text" required placeholder='Buscar...' class="grey-text">
          <label for="search"><i class="mdi-action-search grey-text "></i></label>
          
        </div>
    </div>
  </nav>	
	</div>
</div>



<ul class="collection" >


</ul>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="Cabecera"></h4>
      <p id="Cuerpo"></p>
      <input type="text" id="oid" hidden value=""/>
      <input type="text" id="img" hidden value=""/>
    </div>
    <div class="modal-footer">
      <a href="javascript:Agregar();" class="modal-action modal-close waves-effect waves-green btn-flat ">Agregar</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>

<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>