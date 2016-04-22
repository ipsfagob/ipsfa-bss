
<?php 
$this->load->view("panel/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/panel/js/locatel.js"></script>
<br>

<div class="container">
<a href="#" class="btn" onclick="javascript:consultarEstablecimientos()">Consultar Establecimientos</a>
<div id="reporte"></div>
</div>
	

<?php 
$this->load->view("panel/inc/pie.php");
?>
