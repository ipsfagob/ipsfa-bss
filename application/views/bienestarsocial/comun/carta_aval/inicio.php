<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/carta-aval.js"></script>
<br>

<div class="container .hide-on-small-only">

 
 <div class="row">
 <div class="col s12">

  <?php

     
        $this->load->view('bienestarsocial/comun/carta_aval/doc/leeme'); 
        $this->load->view('bienestarsocial/comun/carta_aval/frm/scaso');

      //$this->load->view('bienestarsocial/comun/carta_aval/doc/leeme');
  ?>


</div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>