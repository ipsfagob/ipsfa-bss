<?php 
$this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/renovacion.js"></script>



<div class="container ">

	<div class="row">
      <ul class="collection with-header">
          <li class="collection-header">
          	<center>
          		<span class="titulo" style="font-size: 19px;color: #000;font-weight: bold;">
          			Confirmar Pagos de Carnet
          		</span>
          	</center>
          
          </li>
      </ul>
    </div>

    <form>

    <div class="row white">

    	<div class="col s12 m12 l12">
	    	<div class="col s12 card-panel blue lighten-2">
	        <p style="text-align: justify;">
	        <h5>Notas: </h5>
	        <div class="divider"></div>
	          <ol>
	          	<li>
	          		Los numeros de cuenta para realizar los depositos son:.
            	</li>
	          </ol>        
	        </p>    
	      </div>
	    </div>


      <div class="col s12 m4 l3" >        
                <div style="width: 190px;height: 140px; margin-left:20px; margin-top: 20px " id="view-1" >
                  <img style="width: 190px;height: 140px; margin-left: 0px"                  
                  class="file-path-wrapper-pre-view" id="pre-view-1" />
                </div>
                <!-- -->
                <div class="file-field input-field col file-field-input-field" >
                    <div class="file-path-wrapper file-path-wrapper-sopor">
                      <input class="file-path validate" type="text"  placeholder="Voucher">
                    </div>
                          
                    <div class="btn btns-rd-c">
                      <input type="file" name='recipe' id="inputFile[1]"  accept="image/gif, image/jpeg, image/png" 
                      onchange="readURL(this, 1, 'img');">
                      <i class="material-icons">camera_alt </i>
                    </div>
                  </div>
              </div> 

              <div class="col s12 m8 l9">
                <div class="col s12 m6 l6">
                  <label >Nombre del Banco</label>
                    <select id="familiar" name="familiar" class="browser-default">
                      <option value="" disabled selected>ELIJA UNA OPCIÓN</option>
                      <option value="0">BANFAN</option>
                      <option value="1">BANCO VENEZUELA</option>
                    </select>
                </div>
                <div class="col s12 m6 l6">
                  <label >Tipo de Operación</label>
                    <select id="operacion"  class="browser-default">
                      <option value="" disabled selected>ELIJA UNA OPCIÓN</option>
                      <option value="0">DEPOSITO</option>
                      <option value="1">TRANSFERENCIA</option>
                    </select>
                </div>
                <div class="col s12 m4 l4">
                 <label >Número </label>
                  <input  id="numero" class="validate  imagen-text-right" type="text" value="">
                </div>

                <div class="col s12 m4 l4">
                 <label >Fecha </label>
                  <input  id="fecha" class="validate  imagen-text-right" type="text" value="">
                </div>

                <div class="col s12 m4 l4">
                 <label>Monto </label>
                  <input  id="numero" class="validate  imagen-text-right" type="text" value="">
                </div>

                <div class="col s12" >
                <a  class="left btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="msjSucursal()" >Agregar Otro Pago
                    <i class="material-icons left">add</i>
                </a>
                </div>
              </div>

        </div>
        <div class="row white"> 
    	  
      	



        <div class="col s6" >
        <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
        href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Ir al Inicio
            <i class="material-icons left">home</i>
        </a>
        </div>

        <div class="col s6" >
  			<a  class="right btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="msjSucursal()" >CONFIRMAR
  			    <i class="right material-icons left">done_all</i>
  			</a>
      	</div>

        
      </div>   
      <input id="oid" type="hidden" value="<?php echo $oid?>" name="oid"> 

    </div> 
    </form>    

</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal" style="width: 450px">
    <div class="modal-content">
      <h4>Mensaje!!!</h4>
      <p id="msj"></p>
    </div>
    <div class="modal-footer" id="acciones">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
      	Continuar<i class="material-icons left green-text">check_circle</i>
      </a>

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
      	Cancelar<i class="material-icons left red-text">cancel</i>
	  </a>
    </div>
  </div>
          


<?php 
$this->load->view("afiliacion/inc/pie.php");
?>