
<?php
$this->load->view ( "bienestarsocial/panel/inc/cabecera.php" );
?>


<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/consulta.js"></script>
<div class="container">
  

<div class="row">  
  <div class="col s12">
    <h5>Consultar caso ejemplo (00000001):</h5>

  </div>



	<div class="col s12 ">
	<nav>
      <div class="nav-wrapper white ">      
        <div class="input-field col s10">

          <input id="search" maxlength="8" type="text" required placeholder='Introducir codigo del caso...' class="grey-text">
          <label for="search"><i class="mdi-action-search grey-text "></i></label>
          
        </div>

      </div>
  </nav>	
	</div>
</div>

<div class="row">  


<ul class="collection" >


</ul>

</div>
<div class="row">  
<a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irAtras()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
          </a>
</div>
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
      <a href="javascript:Agregar();" class="modal-action modal-close waves-effect waves-green btn-flat ">Agregar</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>
</div>
<?php
$this->load->view ( "bienestarsocial/panel/inc/pie.php" );
?>