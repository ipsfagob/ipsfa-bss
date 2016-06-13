
<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>
<script type="text/javascript"
	src="<?php echo base_url(); ?>application/views/bienestarsocial/js/sidrofan.js"></script>

<div class="container">
  <div class="row">
      <ul class="collection with-header">
            <li class="collection-header"><span class="titulo">Consultar Medicamentos</span>
            
            </li>
      </ul>
  </div> 

  <div class="row center" id="mnuFarmacias">
      <div class="col s12 m4 l4">
        
        <div class="btns-smin">
          <div class="btns-sminf small">Drogueria y Farmacia IPSFA</div>
          <div class="btns-sminh  dropdown-button">
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="#" onclick="consultar('SidroFan', 'Drogueria y Farmacia IPSFA')">
            <div class="__ctdrs_xxmall cortar">Consultar medicamentos en Drogueria y Farmacia del IPSFA</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/medicamentos.jpg" class="responsive-img">
            </div>
          </a> 
        </div> 
      </div>

      <div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">Locatel</div>
          <!-- data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates="dropdown1" -->
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="#" onclick="consultar('Locatel', 'Red de Farmacia Locatel')">
            <div class="__ctdrs_xxmall cortar">Permite visualizar la existencia</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/locatel.jpg" class="responsive-img">
            </div>
          </a>
        </div>  
      </div>


      <div class="col s12 m4 l4">
        <div class="btns-smin">
          <div class="btns-sminf small">FarmaMiel</div>
          <!-- data-position="bottom" data-delay="30" data-tooltip="I am tooltip" data-activates="dropdown1" -->
          <div class="btns-sminh  dropdown-button" >
            <a href="#"><i class="material-icons white-text">more_vert</i></a>
          </div>
          <a href="#" onclick="consultar('FarmaIpsfa', 'Farma IPSFA (Luna Miel)')">
            <div class="__ctdrs_xxmall cortar">Permite visualizar la existencia</div>
            <div >
              <img src="<?php echo base_url(); ?>public/img/lunamiel.jpg" class="responsive-img">
            </div>
          </a>
        </div>  
      </div>
</div>





<div class="row" id="buscador" style="display: none"> 

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

    <div class="row">
      
      <div class="col s6 m3">
        <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
          <i class="material-icons left">arrow_back</i>       
        </button>  
      </div>
      <div class="col s6 m3">
          <div id="cancel" style="display: none">
            <a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="cancelar()">Cancelar
                <i class="material-icons left">cancel</i>
            </a>
          </div>
      </div>   
    </div>
</div>


<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>