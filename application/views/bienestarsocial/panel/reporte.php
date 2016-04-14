<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<br>
<div class="container">

	<div class="row">

		<div class="input-field col s6 l3 m3">
			<select id="modulo" onchnge="">
				<option value="1">Reembolsos</option>
				<option value="2">Ayudas</option>
				<option value="3">Medicamentos</option>
			</select>
			<label for="modulo">Seleccionar Modulo</label>
			
		</div>
		<div class="input-field col s6 l3 m3">
			<select  id="estatus" onchnge="">
				<option value="1">Recibidos IPSFA</option>
				<option value="2">En Proceso</option>
				<option value="3">Aceptados Por Pagar</option>
			</select>
			<label for="estatus">Seleccione el Estatus</label>
			
		</div>

		<div class="input-field col s6 l3 m3">
			<input id="desde" name="fecha" type="date" class="datepicker blue-ipsfa" required>
	        <label for="desde">Desde</label>		
		</div>
		<div class="input-field col s6 l3 m3">
			<input id="hasta" name="fecha" type="date" class="datepicker blue-ipsfa" required>
	        <label for="hasta">Hasta</label>
		</div>

		<div class="col s6 offset-s6 right-align">
			<a class="waves-effect waves-light btn-large" style="background-color:#00345A"><i class="material-icons left">print</i>Consultar</a>
		</div>
	</div>

	<div class="row white">
		<div class="col s12 l12 m12">
			Esperando datos...
		</div>
	</div>
</div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>


<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/reporte.js"></script>