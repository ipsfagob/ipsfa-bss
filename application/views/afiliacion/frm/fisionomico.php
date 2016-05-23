      <div class="col s12">
        <h5>Datos Medicos</h5>
        <div class="divider"></div>
      </div>


      <div class="col s6 m4 l4">
        <label >Tipo de Sangre</label>
          <select id="sangre" name="familiar" class="browser-default">
            
            <?php 

                if($Persona->Afiliado->DatosMedicos->tipoSangre != ''){
                  echo '<option selected value="' . $Persona->Afiliado->DatosMedicos->tipoSangre . '">' . $Persona->Afiliado->DatosMedicos->tipoSangre . '</option>';  
                }else{
                  echo '<option value="" disabled selected>ELIJA UNA</option>';
                }
                
              ?>

            <option value="AB+" >AB+</option>
            <option value="AB-" >AB-</option>
            <option value="A+" >A+</option>
            <option value="A-" >A-</option>
            <option value="B+" >B+</option>
            <option value="B-" >B-</option>
            <option value="O+" >O+</option>
            <option value="O-" >O-</option>           
          </select>
      </div>


      <div class="col s6 m4 l4">
        <label >Donante de Organos</label>
          <select id="organo" name="familiar" class="browser-default">
             <?php 

                if($Persona->Afiliado->DatosMedicos->donanteOrgano != ''){
                  echo '<option selected value="' . $Persona->Afiliado->DatosMedicos->donanteOrgano . 
                  '">' . $Persona->Afiliado->DatosMedicos->donanteOrgano . '</option>';  
                }else{
                  echo '<option value="" disabled selected>ELIJA UNA</option>';
                }
                
              ?>
            <option value="SI" >SI</option>
            <option value="NO" >NO</option>
          </select>
      </div>

    <div class="col s12 m4 l4">
        <label >Número Exp Médico </label>
        <input  id="expediente" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->historiaClinica?>">

      </div>


    <div class="col s12 m6 l6">
        <label > Alergias a Medicamentos</label>
        <input  id="alergia" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->alergiasMedicamentos?>">

      </div>


    <div class="col s12 m6 l6">
        <label>Enferemedades Crónicas</label>
        <input  id="enfermedad" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->enfermedadesCronicas?>">

      </div>





      <div class="col s12">
        <h5>Datos Fisionomicos</h5>
        <div class="divider"></div>
      </div>

      <div class="col s6 m4 l4">
        <label >Color de Piel</label>
          <select id="piel" class="browser-default">
           <?php 

                if($Persona->Afiliado->DatosFisionomicos->codPiel != ''){
                  echo '<option selected value="' . $Persona->Afiliado->DatosFisionomicos->codPiel . 
                  '">' . strtoupper($Persona->Afiliado->DatosFisionomicos->colorPiel) . '</option>';  
                }else{
                  echo '<option value="" disabled selected>ELIJA UN COLOR</option>';
                }

              $rs = $Persona->Afiliado->listarColorPiel()->rs;
              foreach ($rs as $key => $val) {
                
                $cadena = '<option value="' . $val->id . '">' .  
                                   strtoupper($val->nombre) . '</option>';
                
                echo $cadena;
              }
            ?>
          </select>
      </div>
      <div class="col s6 m4 l4">
        <label >Color de Cabello</label>
          <select id="cabello" class="browser-default">
          <?php 

                if($Persona->Afiliado->DatosFisionomicos->codCabello != ''){
                  echo '<option selected value="' . $Persona->Afiliado->DatosFisionomicos->codCabello . 
                  '">' . strtoupper($Persona->Afiliado->DatosFisionomicos->colorCabello) . '</option>';  
                }else{
                  echo '<option value="" disabled selected>ELIJA UN COLOR</option>';
                }
 
              $rs = $Persona->Afiliado->listarColorCabello()->rs;
              foreach ($rs as $key => $val) {
                
                $cadena = '<option value="' . $val->id . '">' .  
                                   strtoupper($val->nombre) . '</option>';
                
                echo $cadena;
              }
            ?>
          </select>
      </div>

      <div class="col s6 m4 l4">
        <label >Color de Ojos</label>
          <select id="ojos" class="browser-default">
           

            <?php 
             if($Persona->Afiliado->DatosFisionomicos->codOjos != ''){
                  echo '<option selected value="' . $Persona->Afiliado->DatosFisionomicos->codOjos . '">' . 
                  strtoupper($Persona->Afiliado->DatosFisionomicos->colorOjos) . '</option>';  
                }else{
                  echo '<option value="" disabled selected>ELIJA UN COLOR</option>';
                }

              $rs = $Persona->Afiliado->listarColorOjos()->rs;
              foreach ($rs as $key => $val) {
                
                $cadena = '<option value="' . $val->id . '">' .  
                                   strtoupper($val->nombre) . '</option>';
                
                echo $cadena;
              }
            ?>
          </select>
      </div>

      <div class="col s6 m4 l4">
        <label >Estatura</label>
        <input  id="estatura" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosFisionomicos->estatura?>">

      </div>