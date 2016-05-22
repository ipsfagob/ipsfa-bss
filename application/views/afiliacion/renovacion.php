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
          			Renovación de Carnet's (Afiliados)
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
	          		En caso de que
            		detecte algún dato errado y no pueda ser actualizado, favor dirigirse a la Gerencia de Afiliación del 
            		IPSFA en cualquiera de sus sucursales.
            	</li>
	            <li>
	            	Recuerde que la normativa del instituto condiciona las renovaciones de Carnet's para los hijos de afiliados con edad igual o mayor a veinticinco (25) años. Estos casos son atendidos unicamente en forma presencial, con los respectivos recaudos.
	            </li>
	            
	          </ol>        
	        </p>    
	      </div>
	    </div>


    	<div class="col s12 m6 l6">
    	  <label >Nombre del Familiar</label>
          <select id="familiar" name="familiar" class="browser-default">
          	<option value="" disabled selected>ELIJA UNA OPCIÓN</option>
          	<?php 
          		foreach ($Militar->Persona->Familiares as $key => $val) {
          			
          			$cadena = '<option value="' . $val->oid . '">' .  
                                   $val->nombreApellidoCompleto() . '(' . $val->parentesco . ')</option>';
          			if($val->parentesco == 'HIJO (A)' && $val->obtenerEdad() >= 25) $cadena = '';
          			echo $cadena;
          		}
          	?>
          </select>
    	</div>
    	<div class="col s12 m6 l6">
    	  <label >Motivo de la Renovación</label>
          <select id="motivo" name="motivo" class="browser-default">
           	<option value="" disabled selected>INDIQUE EL MOTIVO</option>
          	<option value="0">VENCIMIENTO</option>
          	<option value="1">EXTRAVÍO O ROBO</option>
          </select>
    	</div>

    	<div class="col s12 m12 l12">
	    	<label>Ubicacíón para ser atendido por el IPSFA</label>
	        <select id="sucursal" name="sucursal" class="browser-default">
	        <option value="" disabled selected>ELIJA UNA SUCURSAL</option>
	          <?php
	            $sSucursales = '';
	            foreach ($Sucursales as $key => $val) {
	              $sSucursales .= '<option value="' . $val->oid . '">' . $val->nombre . '</option>';
	            }
	            echo $sSucursales;
	          ?>
	          </select>
          
        </div>


        <div class="col s6" >
        <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
        href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Ir al Inicio
            <i class="material-icons left">home</i>
        </a>
        </div>

        <div class="col s6" >
  			<a  class="right btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="msjSucursal()" >CONTINUAR
  			    <i class="right material-icons left">assignment_ind</i>
  			</a>
      	</div>

        
      </div>   
      <input id="oid" type="hidden" value="<?php echo $Militar->Persona->oid?>" name="oid"> 

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