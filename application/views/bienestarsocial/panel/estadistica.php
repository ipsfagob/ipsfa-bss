<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<br>
<div class="container">

	<div class="row">

		<div class="col s12 l12 m12">
			<select onchange="">
				<option value="Reembolsos">Reembolsos</option>
			</select>
		</div>

		<div class="col s12 l10 m10">

			
				<canvas id="myChart"  width="300" height="300"/>
			
		</div>
		<div class="col s12 l2 m2">
			<div id="js-legend" class="chart-legend"></div>	
		</div>

	</div>
</div>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/estadistica.js"></script>
<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>