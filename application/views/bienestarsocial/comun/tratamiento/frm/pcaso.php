<br><br>

<div class="row">
    <div class="col s12" id='cargando' style="display: none">
       
      <center><b>Cargando por favor espere</b></center>
      <div class="progress">

          <div class="indeterminate"></div>
      </div> 

     </div>
      <div class="col s4">
        <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="cargando();irAtras()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
        </button>
      </div>
      <div class="col s4">
       <form id="frmActualizar"
         action="<?php echo base_url() . 'index.php/BienestarSocial/adjuntarProlongado';?>"  method="post">
          <input type="hidden" name="nomb" id="nomb" value="<?php echo $nomb;?>"></input>
          <input type="hidden" name="id" id="id" value="<?php echo $data->rs[0]->codnip;?>"></input>
          <input type="hidden" name="oid" id="oid" value="<?php echo $oid;?>"></input>
          <button class="center btn-large waves-effect waves-light"  style="background-color:#00345A" type="submit" onclick="cargando()">Actualizar Expedientes
              <i class="material-icons right">note_add</i>
          </button>
        </form>
      </div>
      <div class="col s4">
        <form id="frmData" action="<?php echo base_url() . 'index.php/BienestarSocial/generarCita';?>"  method="post">
            <input type="hidden" name="nomb" id="nomb" value="<?php echo $nomb;?>"></input>
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>"></input>
            <input type="hidden" name="oid" id="oid" value="<?php echo $oid;?>"></input>
            <a class="btn-large waves-effect waves-light right"  style="background-color:#00345A" onclick="solicitarCita()">Solicitar Cita
              <i class="material-icons right">today</i>
            </a>       
        </form>
    </div>


  </div>
