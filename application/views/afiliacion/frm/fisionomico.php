      <div class="col s12">
        <h5>Datos Medicos</h5>
        <div class="divider"></div>
      </div>


      <div class="col s6 m4 l4">
        <label >Tipo de Sangre</label>
          <select id="sangre" name="familiar" class="browser-default">
            <option value="" disabled selected>ELIJA UNA</option>
            <!--
            <?php 
              $rs = $Persona->Afiliado->listarColorPiel()->rs;
              foreach ($rs as $key => $val) {
                
                $cadena = '<option value="' . $val->id . '">' .  
                                   strtoupper($val->nombre) . '</option>';
                
                echo $cadena;
              }
            ?>-->
          </select>
      </div>


      <div class="col s6 m4 l4">
        <label >Donante de Organos</label>
          <select id="sangre" name="familiar" class="browser-default">
            <option value="" disabled selected>ELIJA UNA</option>
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
        <input  id="alergias" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->alergiasMedicamentos?>">

      </div>


    <div class="col s12 m6 l6">
        <label >Enferemedades Crónicas</label>
        <input  id="enferemedades" class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->enfermedadesCronicas?>">

      </div>





      <div class="col s12">
        <h5>Datos Fisionomicos</h5>
        <div class="divider"></div>
      </div>

      <div class="col s6 m4 l4">
        <label >Color de Piel</label>
          <select id="familiar" name="familiar" class="browser-default">
            <option value="" disabled selected>ELIJA UN COLOR</option>
            
            <?php 
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
          <select id="motivo" name="motivo" class="browser-default">
            <option value="" disabled selected>ELIJA UN COLOR</option>
            <
            <?php 
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
          <select id="motivo" name="motivo" class="browser-default">
            <option value="" disabled selected>ELIJA UN COLOR</option>
            <
            <?php 
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