<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>

<div class="container">

 
 <div class="row">
 <div class="col s12">

  <?php
      
      $rs = $data->rs;
      
      if($data->cant != 0){
        echo '<div class="row">
          <div class="col s12 card-panel blue lighten-2">
            <center>
                <h5>' . $rs[0]->apellidoprimero . ' ' .  $rs[0]->nombreprimero . ' actualmente posee tratamientos prolongado por:</h5> 
            </center>    
          </div>
          </div>';

        echo '<ol>';

        foreach ($rs as $k => $v) {
          $fecha = explode('/', $v->vencimiento);
          echo "<li>" . $v->nombre . " Y <b>VENCE</b> EL " . $fecha[2] . "/" . $fecha[1]  . "/" . $fecha[0]  . "</li>";
        }
        echo "</ol>";
        echo "<h5>Nota: </h5>";
        echo 'Si desea actualizar algunos de los casos anteriores presione "Actualizar Expediente". <br>
        En caso de presentar otra patologia por favor concertar cita con Droguería y Farmacia';
        $this->load->view('bienestarsocial/comun/tratamiento/frm/pcaso');
      }else{
        echo '
          <div class="row">
          <div class="col s12 card-panel blue lighten-2">
            <center>
                <h5>Usted actualmente no posee tratamiento prolongado.</h5> 
            </center>    
          </div>
          </div> 

        ';
        $this->load->view('bienestarsocial/comun/tratamiento/doc/leeme'); 
        $this->load->view('bienestarsocial/comun/tratamiento/frm/scaso');
      }


      //$this->load->view('bienestarsocial/comun/tratamiento/doc/leeme');
  ?>

  <br><br>
  


</div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>