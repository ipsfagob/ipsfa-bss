<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/tratamiento.js"></script>
<br>

<br><br>
<div class="container .hide-on-small-only">

 <div class="row">
 <div class="col s12">


  <?php
      $this->load->view('bienestarsocial/comun/tratamiento/doc/leeme');
  ?>


  <div class="row">
    <div class="col s12">
      <input type="hidden" value=0 id="total"></input>
      <button class="btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="adjuntar('<?php echo ""?>')">Adjuntar Requisitos
          <i class="material-icons right">attach_file</i>
      </button>
    </div>
  </div>
  </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>