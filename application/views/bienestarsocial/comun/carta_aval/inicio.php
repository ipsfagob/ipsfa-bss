<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/carta-aval.js"></script>
<br>

<br><br>
<div class="container .hide-on-small-only">

 
 <div class="row">
 <div class="col s12">

  <?php

      if($data->cant != 0){
        echo "<h5>Usted actualmente ya posee una carta aval en proceso: </h5>";
        echo "<ol>";
        foreach ($data->rs as $k => $v) {
          echo "<li>" . $v->nombre . " Y <b>VENCE</b> EL " . $v->vencimiento . "</li>";
        }
        echo "</ol>";
        echo "<h5>Nota: </h5>";
        echo "En caso de presentar otra patologia por favor concertar cita con Droguería y Farmacia";
        $this->load->view('bienestarsocial/comun/carta_aval/frm/pcaso');
      }else{
        $this->load->view('bienestarsocial/comun/carta_aval/doc/leeme'); 
        $this->load->view('bienestarsocial/comun/carta_aval/frm/scaso');
      }


      //$this->load->view('bienestarsocial/comun/carta_aval/doc/leeme');
  ?>

  <br><br>
  


</div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>