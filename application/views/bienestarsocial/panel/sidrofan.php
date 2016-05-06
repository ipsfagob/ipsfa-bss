
<?php
$this->load->view ( "bienestarsocial/panel/inc/cabecera.php" );
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/sidrofan.js"></script>

<br>
<div class="container">
<div class="row">
  
  <div class="row">
      <ul class="collection with-header">
            <li class="collection-header"><span class="titulo">Consultar Inventario</span>
            
            </li>
      </ul>
  </div> 

</div>
<div class="row">

  <div class="col s12 ">
  <nav>

    <div class="nav-wrapper white ">      
        <div class="input-field col s10">

          <input id="search" type="text" required placeholder='Buscar inventario del almacen...' class="grey-text">
          <label for="search"><i class="mdi-action-search grey-text "></i></label>
          
        </div>

        </div>
  </nav>  
  </div>
</div>



<ul class="collection" id="consulta">


</ul>

  
  </div>

<?php
$this->load->view ( "bienestarsocial/panel/inc/pie.php" );
?>