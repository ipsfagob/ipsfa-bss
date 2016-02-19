<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/datos.js"></script>
<br><br>
<div class="container .hide-on-small-only">

 <div class="row">
	 <div class="col s4">
	 	<img src="<?php echo base_url(); ?>public/img/nodisponible.jpg" class="responsive-img circle" >
	 </div>
	 <div class="col s8">
	 	<div class="input-field col s12">
          <input disabled id="cedula" type="text" class="validate" 
            value="<?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula?>">
          <label for="disabled">Documento de Identidad</label>
        </div>
	 </div>
 </div>
    <form class="col s12">
     <div class="row">
      <div class="input-field col s6">
          <input  disabled  id="fechaNacimiento" type="date" class="datepicker" value="<?php echo $Militar->Persona->fechaNacimiento?>">
          <label for="disabled">Fecha de Nacimiento</label>
        </div>
        
        <div class="input-field col s6">
          <select  disabled >
            <option value="<?php echo $Militar->Persona->sexo?>"><?php echo $Militar->Persona->obtenerSexo()?></option>
            
            
          </select>
          <label>Genero</label>
        </div>
     </div>

     <div class="row">
     	<div class="input-field col s6">
          <input  disabled  id="first_name" type="text" class="validate" value="<?php echo $Militar->Persona->nombreCompleto()?>">
          <label for=" disabled">Nombres</label>
        </div>
        
        <div class="input-field col s6">
          <input  disabled id="last_name" type="text" class="validate" value="<?php echo $Militar->Persona->apellidoCompleto()?>">
          <label for=" disabled ">Apellidos</label>
        </div>
     </div>
          

     <div class="row">
        <?php

          foreach ($Militar->Persona->Telefonos as $c => $v) {
            $sTip = '<div class="input-field col s2 m2 l1">
                    <select id="codTipo">
                    <option value="' . $v->tipo . '">' . $v->tipo . '</option>
                    <option value="HAB">HAB</option> 
                    <option value="CEL">CEL</option> 
                    <option value="PRIN">PRIN</option>    
                    </select>
                    <label>Tipo</label>
                    </div>';

            $sCodA = '<div class="input-field col s3 m3 l1">
                      <select id="codTelefono"><option value="' . $v->codigoArea . '">' . $v->codigoArea . '</option>
                      ' . generarCodigos($CodigoArea) . '</select>
                      <label>Código</label>
                      </div>';
            $sNum = '<div class="input-field col s7 m7 l4">
                      <i class="material-icons prefix" onclick="alert(1);">delete</i>
                      <input id="telefono" type="text" class="validate" value="' . $v->numero . '">
                      <label>Teléfono</label>
                      </div>';

            
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
      </div>
      <!--

      <div class="row">

        <div class="input-field col s4 m4 l2">
          <select id="codTelefono">

            <?php 
               echo '<option value="' . $Militar->Persona->codigoTelefono . '">' . $Militar->Persona->codigoTelefono . '</option>';
              foreach ($CodigoArea as $key => $val) {
                echo '<option value="' . $val->codarea . '">' . $val->codarea . '</option>';
              }
            ?>
          </select>
          <label>Código</label>
        </div>
        <div class="input-field col s8 m8 l4">
          <input id="telefono" type="text" class="validate" value="<?php echo $Militar->Persona->telefono?>">
          <label>Teléfono</label>
        </div>
        <div class="input-field col s4 m4 l2">
           <select id="codCelular">
            <option value="0412">0412</option>
            <option value="0416">0416</option>
            <option value="0426">0426</option>
            <option value="0414">0414</option>
            <option value="0424">0424</option>
          </select>
          <label>Código</label>
        </div>
        <div class="input-field col s8 m8 l4">
          <input id="celular" type="text" class="validate" value="<?php echo $Militar->Persona->celular?>">
          <label>Celular</label>
        </div>
        
      </div>

      -->


      <div class="row">
      <div class="input-field col s6">
          <input  disabled  id="componente" type="text" class="validate" value="<?php echo $Militar->Componente->nombre?>">
          <label>Componente</label>
        </div>
        
        <div class="input-field col s6">
          <input  disabled id="grado" type="text" class="validate" value="<?php echo $Militar->Componente->rango?>">
          <label>Grado</label>
        </div>
     </div>


      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" value="<?php echo $Militar->Persona->correoElectronico?>">
          <label for="email" data-error="Invalido" data-success="right">Correo Electronico</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="direccion" class="materialize-textarea" length="256"><?php echo $Militar->Persona->direccion?></textarea>
          <label for="direccion">Por favor verifique su dirección</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s6">
  			<button class="btn-large waves-effect waves-light blue darken-1" onclick="">Actualizar
  			    <i class="material-icons left">swap_vertical_circle</i>
  			</button>
      	</div>
        <div class="col s6">
        <button data-target="modal1" class="btn-large waves-effect waves-light blue darken-3 modal-trigger">Reportar
            <i class="material-icons left">verified_user</i>
        </button>
        </div>
      </div> 
    </form>
</div>




  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Notificar!!!</h4>
     


     <form class="col s12" id="reportar" method="post" name="reportar">
       <div class="row">
         <div class="col s12">
          <p style="text-align: justify;">
            Bienvenidos al sistema de reportes, está interfaz le servirá en caso de que
            detecte algún dato errado y no pueda ser actualizado; sólo debe seleccionar y pulsar 
            enviar y pronto estará resuelto.
          </p>    
         </div>
       </div>
      
       <div class="section">
          <h5>Datos Personales</h5>
          <div class="divider"></div>
          <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chNombre" />
                <label for="chNombre" >Nombre y Apellido</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="chSexo" />
                <label for="chSexo">Sexo o Genero</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="chFecha" />
                <label for="chFecha">Fecha de Nacimiento</label>
              </div>
           </div>

           <br>
           <h5>Datos Militares</h5>
           <div class="divider"></div>
           <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chComponente" />
                <label for="chComponente">Componente</label>
              </div>
              <div class="col s12 m4">
                <input type="checkbox" id="chRango" />
                <label for="chRango">Rango Militar</label>
              </div>
           </div>

          
          <br>

           
      </div>
    </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Cancelar</a>
      <a class="modal-action modal-close waves-effect waves-blue btn-flat" onclick="Salvar()">Reportar</a>
      
    </div>
  </div>
          


<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>