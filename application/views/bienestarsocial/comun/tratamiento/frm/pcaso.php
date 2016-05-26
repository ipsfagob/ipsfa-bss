<br><br>

<div class="row">
      <div class="col s4">
        <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
        </button>
      </div>
      <div class="col s4">
       <form 
         action="<?php echo base_url() . 'index.php/BienestarSocial/adjuntarProlongado';?>"  method="post">
          <input type="hidden" name="id" value="<?php echo $data->rs[0]->codnip;?>"></input>
          <button class="center btn-large waves-effect waves-light"  style="background-color:#00345A" type="submit">Actualizar Expedientes
              <i class="material-icons right">note_add</i>
          </button>
        </form>
      </div>
      <div class="col s4">
        <button class="right btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="solicitarCita()">Solicitar Cita
            <i class="material-icons right">today</i>
        </button>
    </div>


  </div>
