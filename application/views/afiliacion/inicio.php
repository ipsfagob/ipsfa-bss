<?php 
$this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/datos.js"></script>
<br><br>
<div class="container .hide-on-small-only">

  <div class="row">
   <div class="col s12">
    <p style="text-align: justify;">
      Bienvenidos al sistema de datos personales en caso de que
      detecte algún dato errado y no pueda ser actualizado, favor dirigirse a la gerencia de afiliación del 
      IPSFA en cualquiera de sus sucursales.
    </p>    
   </div>
</div>

<h4>Datos Básicos</h4>
<li class="divider"></li><br>
<div class="row center">
  <div class="col s12 m12 l12">
    <!-- 
    <img width="100px" class="responsive-img circle" src="http://www.ipsfa.gob.ve/SAEMI/xmlsHtmlsImgs/imgs.afiliados/pers.mil.act/<?php echo $Militar->Persona->cedula?>.jpg"> -->
  </div>
</div>
  
 <div class="row">
	 	<div class="input-field col s12 m6 l6">
          <input disabled id="cedula" type="text" class="validate" 
            value="<?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula?>">
          <label for="disabled">Documento de Identidad</label>
        </div>
    <div class="input-field col s12  m6 l6">
          <input  disabled  id="edocivil" type="text" class="validate" value="<?php echo $Militar->Persona->estadoCivil;?>">
          <label for=" disabled">Estado Civil</label>
        </div>

 </div>
    <form class="col s12">
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
      <div class="input-field col s6">
          <input  disabled  id="fechaNacimiento" class="validate" type="text" value="<?php echo $Militar->Persona->fechaNacimiento?>">
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
        <div class="input-field col s2 m2 l1">
            <select id="codTipoAux">
              <option value="HAB">HAB</option> 
              <option value="CEL">CEL</option> 
              <option value="PRIN">PRIN</option>    
            </select>
            <label>Tipo</label>
        </div>
        <div class="input-field col s3 m3 l1">
          <select id="codTelefonoAux">
              <?php echo generarCodigos($CodigoArea);?>
          </select>                
          <label>Código</label>
        </div>
        <div class="input-field col s7 m7 l4">                      
          <input id="telefonoAux" type="text" class="validate" value="">
          <label>Teléfono Auxiliar</label>
        </div>
      </div>









      <h4>Datos de la Dirección</h4>
      <li class="divider"></li><br>
     <div class="row">
        <div class="input-field col s12 m6 l6">
        <select id="estado" name='estado' onchange="listarMunicipio();">
        <option value="0">-------------</option>
          <?php
            $sEstado = '';
            foreach ($Estado as $key => $val) {
              $sEstado .= '<option value="' . $val->codigo . '">' . $val->nombre . '</option>';
            }
            echo $sEstado;
          ?>
          </select>
          <label>Estado</label>
        </div>

        <div class="input-field col s12 m6 l6">
          <select id="municipio" onchange="listarParroquia();">
            <option value="0">----------</option>  
          </select>
          <label>Municipio</label>
        </div>

        <div class="input-field col s12 m12 l12">
        <select id="parroquia">
            <option value="0">----------</option>           
          </select>
          <label>Parroquia</label>
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <textarea id="direccion" class="materialize-textarea" length="256"><?php echo $Militar->Persona->direccion?></textarea>
          <label for="direccion">Por favor verifique su dirección</label>
        </div>
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" value="<?php echo $Militar->Persona->correoElectronico?>">
          <label for="email" data-error="Invalido" data-success="right">Correo Electronico</label>
        </div>
        <div class="input-field col s12">
          <input id="emailAux" type="email" class="validate" value="<?php echo ''?>">
          <label for="emailAux" data-error="Invalido" data-success="right">Correo Electronico Alternativo</label>
        </div>
      </div> 
      
      <div class="row">
      <h5>Notas: </h5>

        <div class="input-field col s12 m12 l12">
          
          <label for="certificar" >Si sus datos son correctos presione actualizar</label>
        </div>
      </div>
      <br><br>      
      <div class="row">
      	<div class="col s6" >
  			<button  class="btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="" >Actualizar
  			    <i class="material-icons left">swap_vertical_circle</i>
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
            Bienvenidos al sistema de reportes.<br>
            ¿Los datos presentados en el anterior formulario son correctos?
          </p>    
         </div>
       </div>
      
       <div class="section" style="display: none">
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
           <h5>Datos Bancarios</h5>
           <div class="divider"></div>
           <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chBanco" />
                <label for="chBanco">Cuenta Bancario</label>
              </div>

           </div>
          <br>

           
      </div>
    </form>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-blue btn-flat" onclick="Salvar()">NO</a>  
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">SI</a>
    </div>
  </div>
    
      


<?php 
$this->load->view("afiliacion/inc/pie.php");
?>