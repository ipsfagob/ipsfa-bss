<?php 
$this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/datos.js"></script>



<div class="container ">
<br>
  <div class="row white">
  <form >
 <div class="col s12 m12 l12">
    <h5>Datos Básicos</h5>
  </div>
        
	 	   <div class="input-field col s12 m6 l6">
          <input readonly id="cedula" type="text" class="validate  imagen-text-right" 
            value="<?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula?>">
          <label style="font-size: 16px">Documento de Idéntidad</label>
        </div>
        <div class="input-field col s12  m6 l6">
          <input  readonly  id="edocivil" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Persona->estadoCivil;?>">
          <label style="font-size: 16px">Estado Civil</label>
        </div>
        <div class="input-field col s6">
          <input  readonly  id="componente" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Componente->nombre?>">
          <label style="font-size: 16px">Componente</label>
        </div>
        
        <div class="input-field col s6">
          <input  readonly id="grado" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Componente->rango?>">
          <label style="font-size: 16px">Grado</label>
        </div>

     	  <div class="input-field col s6">
          <input  readonly  id="first_name" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Persona->nombreCompleto()?>">
          <label style="font-size: 16px">Nombres</label>
        </div>
        
        <div class="input-field col s6">
          <input  readonly id="last_name" type="text" class="validate  imagen-text-right" 
          value="<?php echo $Militar->Persona->apellidoCompleto()?>">
          <label style="font-size: 16px">Apellidos</label>
        </div>

      <div class="input-field col s6">
          <input  readonly  id="fechaNacimiento" class="validate  imagen-text-right" type="text" value="<?php echo $Militar->Persona->obtenerFechaHumana()?>">
          <label style="font-size: 16px">Fecha de Nacimiento</label>
        </div>
        
        <div class="input-field col s6">
            <input  readonly  id="sexo" class="validate  imagen-text-right" 
            type="text" value="<?php echo $Militar->Persona->obtenerSexo()?>">            
          <label style="font-size: 16px">Género</label>
        </div>
        <?php
          $i = 1;
          foreach ($Militar->Persona->Telefonos as $c => $v) {
            $sTip = '<div class="col s2 m2 l1">
                    <label>Tipo</label>
                    <input readonly id="codTipo' . $i . '" type="text" value="' . $v->tipo . '">                    
                    </div>';

            $sCodA = '<div class="col s3 m3 l1">
                      <label>Código</label>
                      <input readonly id="codTelefono' . $i . '" type="text" value="' . $v->codigoArea . '">
                      </div>';
            $sNum = '<div class="col s7 m7 l4">                      
                      <label>Teléfono</label>
                      <input readonly id="telefono' . $i . '" type="text" class="validate" value="' . $v->numero . '"  maxlength="7">
                      </div>';

            $i++;
            echo $sTip . $sCodA . $sNum ;
          }

          function generarCodigos($CodigoArea){
            $sArea = '';

            foreach ($CodigoArea as $key => $val) {
              $sArea .= '<option value="' . $val->codarea . '">' . $val->codarea . '</option>';
            }
            return $sArea;
          }
        ?>
        <div class="col s2 m2 l1">
            <label>Tipo</label>
            <select id="codTipo0" class="browser-default" onchange="listarCodigos('0')">
             <?php 
                if($Militar->Persona->direccionHabitacion->telefono->tipo != ''){
                  echo '<option value="' . $Militar->Persona->direccionHabitacion->telefono->tipo . '">' . $Militar->Persona->direccionHabitacion->telefono->tipo . '</option>';  
                }
                
              ?>
              <option value="HAB">HAB</option> 
              <option value="CEL">CEL</option> 
              <option value="PRIN">PRIN</option>    
            </select>
            
        </div>
        <div class="col s3 m3 l1">
          <label >Código</label>
          <select id="codTelefono0" class="browser-default">

              <?php 
              
                if($Militar->Persona->direccionHabitacion->telefono->codigoArea != ''){
                  echo '<option value="' . $Militar->Persona->direccionHabitacion->telefono->codigoArea . '">' . $Militar->Persona->direccionHabitacion->telefono->codigoArea . '</option>';  
                }
                
            
              echo generarCodigos($CodigoArea);?>
          </select>                
        </div>
        <div class="col s7 m7 l4">                      
          <label>Teléfono Auxiliar</label>
          
            <input id="telefono0" type="text" class="validate" value="<?php 
              if($Militar->Persona->direccionHabitacion->telefono->numero != ''){
                echo  $Militar->Persona->direccionHabitacion->telefono->numero;  
              }else{
                echo '';
              }
            
            ?>" maxlength="7">
          
        </div>








        <div class="col s12 m12 l12">
           <h5>Datos de la Dirección</h5>
        </div>

     
      
  
        <div class="col s12 m6 l6">
        <label >Estado</label>
        <select id="ides"  onchange="listarMunicipio();" class="browser-default">
          <?php 
            if($Militar->Persona->direccionHabitacion->codigoEstado != ''){
              echo '<option value="' . $Militar->Persona->direccionHabitacion->codigoEstado . '">' . $Militar->Persona->direccionHabitacion->estado . '</option>';  
            }
            
          ?>
          <option value="0">-------------</option>
          <?php        
            $sEstado = '';
            foreach ($Estado as $key => $val) {
              $sEstado .= '<option value="' . $val->codigo . '">' . $val->nombre . '</option>';
            }
            echo $sEstado;
          ?>
          </select>
          
        </div>

        <div class="col s12 m6 l6">        
          <label>Municipio</label>
          <select id="idmu" onchange="listarParroquia();" onclick="listarParroquia();" class="browser-default">
          <?php 
            if($Militar->Persona->direccionHabitacion->codigoMunicipio != ''){
              echo '<option selected="selected" value="' . $Militar->Persona->direccionHabitacion->codigoMunicipio . '">' . 
              $Militar->Persona->direccionHabitacion->municipio . '</option>';
            }
          ?>
            <option value="0" >----------</option>  
          </select>
        </div>

        <div class="col s12 m12 l12">
        <label>Parroquia</label>
        <select id="idpa"  class="browser-default">
        <?php 
            if($Militar->Persona->direccionHabitacion->codigoParroquia != ''){
              echo '<option value="' . $Militar->Persona->direccionHabitacion->codigoParroquia . '">' . $Militar->Persona->direccionHabitacion->parroquia . '</option>';  
            }
            
          ?>
            <option value="0">----------</option>           
          </select>
          
        </div>

        <div class="col s12">
          <label style="font-size: 16px" for="direccion">Por favor verifique su dirección</label>
          <textarea class="materialize-textarea" length="128" id='direccion' maxlength="128"><?php 
              if($Militar->Persona->direccionHabitacion->direccion != ''){
                echo trim($Militar->Persona->direccionHabitacion->direccion);  
              }else{
                echo $Militar->Persona->direccion;
              }  
            ?></textarea>
        </div>
        <div class="col s12">
          <label  for="email" data-error="Invalido" data-success="right">Correo Electrónico Principal</label>
          <input readonly id="email" type="text" class="validate" value="<?php echo $_SESSION['correoaux'];
          //$Militar->Persona->correoElectronico?>">
        </div>
        <div class="col s12" >
          <label for="emailAux" data-error="Invalido" data-success="right" >Correo Electrónico Alternativo</label>
          <input id="emailAux" type="email" maxlength="64" class="validate" value="<?php 
            if($Militar->Persona->direccionHabitacion->correo != ''){
              echo  $Militar->Persona->direccionHabitacion->correo;  
            }else{
              echo '';
            }
            
          ?>">
        </div>
       
    

    
      <div class="col s12 m12 l12">
      <div class="col s12 card-panel blue lighten-2">
        <p style="text-align: justify;">
        <h5>Notas: </h5>
        <div class="divider"></div>
          <ol>
            <li>En caso de que
            detecte algún dato errado y no pueda ser actualizado, favor dirigirse a la Gerencia de Afiliación del 
            IPSFA en cualquiera de nuestras sucursales.</li>
            <li>
              Si sus datos son correctos presione actualizar.
            </li>
          </ol>        
        </p>    
      </div>


      	<div class="col s6" >
  			<a  class="btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="salvarDireccion()" >Actualizar
  			    <i class="material-icons left">swap_vertical_circle</i>
  			</a>
      	</div>

        <div class="col s6" >
        <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
        href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Ir al Inicio
            <i class="material-icons left">home</i>
        </a>
        </div>
      </div>   
      <input id="oid" type="hidden" value="<?php echo $Militar->Persona->oid?>">    
    </form>

</div>


        <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="width: 340px; height: 220px">
    <div class="modal-content">
      <h4>Felicitaciones!!!</h4>
      <p>Sus datos han sido actualizados</p>
    </div>
    <div class="modal-footer">
      <a href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php" class="modal-action modal-close waves-effect waves-green btn-flat ">ACEPTAR
      <i class="material-icons left green-text">check_circle</i></a>
    </div>
  </div>


          


          


<?php 
$this->load->view("afiliacion/inc/pie.php");
?>