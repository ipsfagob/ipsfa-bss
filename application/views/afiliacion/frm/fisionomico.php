      <div class="col s12">
        <h5>Datos Médicos</h5>
        <div class="divider"></div>
      </div>


      <div class="col s6 m4 l4">
        <label >Tipo de Sangre</label>
         <input type="text" readonly class="validate  imagen-text-right" value="<?php echo $Persona->Afiliado->DatosMedicos->tipoSangre;?>" id='familiar'></input>
      </div>


      <div class="col s6 m4 l4">
        <label >Donante de Órganos</label>
        <input type="text" class="validate  imagen-text-right" readonly 
          value="<?php echo $Persona->Afiliado->DatosMedicos->donanteOrgano;?>" id='organo'>
        </input>
          
      </div>

    <div class="col s12 m4 l4">
        <label >Número de historia médica</label>
        <input  id="expediente" readonly class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->historiaClinica?>">

      </div>


    <div class="col s12 m6 l6">
        <label > Alergias a Medicamentos</label>
        <input  id="alergia" readonly class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->alergiasMedicamentos?>">

      </div>


    <div class="col s12 m6 l6">
        <label>Enfermedades Crónicas</label>
        <input  id="enfermedad" readonly class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosMedicos->enfermedadesCronicas?>">

      </div>





      <div class="col s12">
        <h5>Datos Fisionómicos</h5>
        <div class="divider"></div>
      </div>

      <div class="col s6 m4 l4">
        <label >Color de Piel</label>
        <input type="text" class="validate  imagen-text-right" readonly 
          value="<?php echo $Persona->Afiliado->DatosFisionomicos->colorPiel;?>" id='piel'>
        </input>
          
      </div>
      <div class="col s6 m4 l4">
        <label >Color de Cabello</label>
        <input type="text" class="validate  imagen-text-right" readonly 
          value="<?php echo $Persona->Afiliado->DatosFisionomicos->colorCabello;?>" id='cabello'>
        </input>
         
      </div>

      <div class="col s6 m4 l4">
        <label >Color de Ojos</label>
        <input type="text" class="validate  imagen-text-right" readonly 
          value="<?php echo $Persona->Afiliado->DatosFisionomicos->colorOjos;?>" id='ojos'>
        </input>
          
      </div>

      <div class="col s6 m4 l4">
        <label >Estatura</label>
        <input  id="estatura" readonly class="validate  imagen-text-right" type="text" 
          value="<?php echo $Persona->Afiliado->DatosFisionomicos->estatura?>">

      </div>