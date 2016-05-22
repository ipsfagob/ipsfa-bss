    <div class="col s12 m12 l12">
      
       <div class="col s2 m2 l1">
            <label>Tipo</label>
            <select id="codTipo0" class="browser-default" onchange="listarCodigos('0')">
             <?php 
                if($Persona->direccionHabitacion->telefono->tipo != ''){
                  echo '<option value="' . $Persona->direccionHabitacion->telefono->tipo . '">' . $Persona->direccionHabitacion->telefono->tipo . '</option>';  
                }
                
              ?>
              <option value="0">----</option>
              <option value="HAB">HAB</option> 
              <option value="CEL">CEL</option> 
              <option value="PRIN">PRIN</option>    
            </select>
            
        </div>
        <div class="col s3 m3 l1">
          <label >Código</label>
          <select id="codTelefono0" class="browser-default">
              <?php 
              
                if($Persona->direccionHabitacion->telefono->codigoArea != ''){
                  echo '<option value="' . $Persona->direccionHabitacion->telefono->codigoArea . '">' . $Persona->direccionHabitacion->telefono->codigoArea . '</option>';  
                }
                
                echo '<option value="0">----</option>';
              ?>
          </select>                
        </div>
        <div class="col s7 m7 l4">                      
          <label>Teléfono Auxiliar</label>
          
            <input id="telefono0" type="text" class="validate" value="<?php 
              if($Persona->direccionHabitacion->telefono->numero != ''){
                echo  $Persona->direccionHabitacion->telefono->numero;  
              }else{
                echo '';
              }
            
            ?>" maxlength="7">
          
        </div>


    </div>

     <div class="col s12 m6 l6">
        <label >Estado</label>
        <select id="ides"  onchange="listarMunicipio();" class="browser-default">
          <?php 
            if($Persona->direccionHabitacion->codigoEstado != ''){
              echo '<option value="' . $Persona->direccionHabitacion->codigoEstado . '">' . $Persona->direccionHabitacion->estado . '</option>';  
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
            if($Persona->direccionHabitacion->codigoMunicipio != ''){
              echo '<option selected="selected" value="' . $Persona->direccionHabitacion->codigoMunicipio . '">' . 
              $Persona->direccionHabitacion->municipio . '</option>';
            }
          ?>
            <option value="0" >----------</option>  
          </select>
        </div>

        <div class="col s12 m12 l12">
        <label>Parroquia</label>
        <select id="idpa"  class="browser-default">
        <?php 
            if($Persona->direccionHabitacion->codigoParroquia != ''){
              echo '<option value="' . $Persona->direccionHabitacion->codigoParroquia . '">' . $Persona->direccionHabitacion->parroquia . '</option>';  
            }
            
          ?>
            <option value="0">----------</option>           
          </select>
          
        </div>

        <div class="col s12">
          <label style="font-size: 16px" for="direccion">Por favor verifique su dirección</label>
          <textarea class="materialize-textarea" length="256" id='direccion'><?php 
              if($Persona->direccionHabitacion->direccion != ''){
                echo trim($Persona->direccionHabitacion->direccion);  
              }else{
                echo $Persona->direccion;
              }  
            ?></textarea>
        </div>


        <div class=" col s12" >
          <label >Correo Electronico Alternativo</label>
          <input id="emailAux" type="email" class="validate" data-error="Invalido" data-success="Bien" value="<?php 
            if($Persona->direccionHabitacion->correo != ''){
              echo  $Persona->direccionHabitacion->correo;  
            }else{
              echo '';
            }
            
          ?>">
        </div>