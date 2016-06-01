<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>

<div class="container">
 
 <div class="row">
    <ul class="collection with-header">
        <li class="collection-header"><span class="titulo">Solicitud de Tratamiento Prolongados</span></li>
    </ul>
</div>
<div class="row">

<form 
  action="<?php echo base_url() . 'index.php/BienestarSocial/casoTratamientos';?>"  method="post">

 <div class="col s12">
  <p align="justify">Nota: <br>
        Este programa está diseñado para la entrega del Kit de medicamentos a los pacientes con tratamientos de por vida, existen una red de farmacias a nivel nacional en las cuales dichos pacientes serán atendidos para la entrega de las mismas.
        <br><br>
        <!-- RECAUDOS<br>
        Informe médico original y copia con firma y sello húmedo médico tratante y sello del Centro de Salud. (Debe venir avalado por el director o sub-director de un hospital militar), el informe debe contener:
        <ol>
          <li>Presentación.</li>
          <li>Miligramos.</li>
          <li>Régimen de Dosificación.</li>
          <li>Documentos de Afiliación.</li>
          <li>Fe de vida emitida por el IPSFA o Guarnición Militar, solo familiares.</li>
        </ol>
        -->
  </div>
  <div class="col s12 m6 l6 escajas">
  <label>Nombre del Familiar (*)</label>
    <select id="familiar" name="familiar" class="browser-default" onchange="seleccion();">
      <option value="0" disabled selected>ELIJA UNA OPCIÓN</option>
      <?php 
       
        $cadena = '<option value="' . $Militar->Persona->cedula . '|' . $Militar->Persona->oid . '">' .  $Militar->Persona->nombreApellidoCompleto() . ' (TITULAR)</option>';
        echo $cadena;
        foreach ($Militar->Persona->Familiares as $key => $val) {          
          $cadena = '<option value="' . $val->cedula . '|' . $val->oid . '">' .  
                             $val->nombreApellidoCompleto() . '(' . $val->parentesco . ')</option>';
          //if($val->parentesco == 'HIJO (A)' && $val->obtenerEdad() >= 25) $cadena = '';
          echo $cadena;
        }
      ?>
    </select>
    <input type="hidden" name="nomb" id="nomb"></input>
  </div>
  </div>
  <div class="row" >
    <div class="col s6">
      <a href="#" class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="irPanel()">Volver atrás
        <i class="material-icons left">arrow_back</i>       
      </a>
      </div>
      <div class="col s6">
      <button class="right btn-large waves-effect waves-light" onclick="cargando()" style="background-color:#00345A" type="submit">Continuar
          <i class="material-icons right">arrow_forward</i>
      </button>
  </div>
</form>
</div> 







<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>