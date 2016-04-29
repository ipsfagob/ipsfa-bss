
<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>


<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/farmacia.js"></script>
<div class="container">
  

<div class="row">  
  <div class="col s12">

  <?php 
    $contenido = '<div id="badan" style="display: none;" class="right card-panel blue lighten-2">
      <a href="' .  base_url() . 'index.php/BienestarSocial/carro" class="black-text">
        <li class="material-icons left">add_shopping_cart</li>
        Pendientes
      </a>
      </div>';
    foreach ($data as $key => $val) {
      $contenido = '<div id="badan" class="right card-panel blue lighten-2">
      <a href="' .  base_url() . 'index.php/BienestarSocial/carro" class="black-text">
        <li class="material-icons left">add_shopping_cart</li>
        Pendientes
      </a>
      </div>';
    }
    echo $contenido;

?>
    <h5>Solicitar Medicamentos de Alto Costo</h5>

  </div>

</div>
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


        <div class="tabla">
         
        </div>


<ul class="collection" >


</ul>

<button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
    <i class="material-icons left">arrow_back</i>
 
</button>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="Cabecera"></h4>
      <p id="Cuerpo"></p>

      <label for="cantidad">Seleccioné la Cantidad</label>
      <select id='cantidad'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="7">Otros</option>
      </select>
      <br>
      <label>Indique la Prioridad</label>
      <select id='prioridad'>
            <option value="0">Baja</option>
            <option value="1">Media</option>
            <option value="2">Alta</option>
      </select>
      


      <input type="text" id="oid" hidden value=""/>
      <input type="text" id="img" hidden value=""/>
    </div>
    <div class="modal-footer">
      <a href="javascript:Agregar();" class="modal-action modal-close waves-effect waves-green btn-flat ">Agregar <i class="material-icons left green-text">check_circle</i></a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar<i class="material-icons left red-text">cancel</i></a>
    </div>
  </div>
</div>
<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>