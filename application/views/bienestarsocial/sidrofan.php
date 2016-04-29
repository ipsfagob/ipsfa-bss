
<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/sidrofan.js"></script>

<div class="container">

  <div class="row">
      <ul class="collection with-header">
            <li class="collection-header"><span class="titulo">Consultar Medicamentos</span>
            <i class="material-icons blue-text right">help</i>
            </li>
      </ul>
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


<ul class="collection" id="consulta">


</ul>


      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
          <i class="material-icons left">arrow_back</i>
       
      </button>
</div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>