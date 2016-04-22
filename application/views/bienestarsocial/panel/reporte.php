<?php 
$this->load->view("bienestarsocial/panel/inc/cabecera.php");
?>


<div class="container">
	<div class="row">
		<ul class="collection with-header">
        	<li class="collection-header"><span class="titulo">Reportes Generales</span>
        	<i class="material-icons blue-text right">help</i>
        	</li>
		</ul>
	</div>
	<div class="row white">
		<br>
		<div class="input-field col s6 l3 m3">
			<select id="modulo" onchnge="">
				<option value="1">Reembolsos</option>
				<option value="2">Ayudas</option>
				<option value="3">Medicamentos</option>
				<option value="4">Citas</option>
				<option value="5">Tratamientos</option>
			</select>
			<label for="modulo">Seleccionar Modulo</label>
			
		</div>
		<div class="input-field col s6 l3 m3">
			<select  id="estatus" onchnge="">
				<option value="0" disabled>Selección</option>
				<option value="1">Recibidos IPSFA</option>
				<option value="2">Procesando</option>
				<option value="3">Verificado</option>
				<option value="4">Autorizado</option>
				<option value="5">Enviado Finanzas</option>

			</select>
			<label for="estatus">Seleccione el Estatus</label>
			
		</div>

		<div class="input-field col s6 l3 m3">
			<input id="desde" name="fecha" type="date" class="datepicker blue-ipsfa imagen-text-right" required>
	        <label for="desde">Desde</label>		
		</div>
		<div class="input-field col s6 l3 m3">
			<input id="hasta" name="fecha" type="date" class="datepicker blue-ipsfa imagen-text-right" required>
	        <label for="hasta">Hasta</label>
		</div>

		<div class="col s12 right-align">
			<a class="waves-effect waves-light btn-large" style="background-color:#00345A" onclick="javascript:generar();">
			<i class="material-icons left">search</i>Consultar</a>
			<a class="waves-effect waves-light btn-large" style="background-color:#00345A" onclick="javascript:estadistica();">
			<i class="material-icons left">insert_chart</i>estadistica</a>
			<a class="waves-effect waves-light btn-large" style="background-color:#00345A" onclick="javascript:imprimir();">
			<i class="material-icons left">print</i>Imprimir</a>

			
		</div>
	</div>

	<div class="row white" id="imprimir">
		<div class="col s12 l12 m12">
			<div class="row">
					<div class="col s12 l2 m2"></div>		

					<div class="col s12 l8 m8 center-align">
						<div id="legend" class="menu"></div>
						<div id="estadistica"></div>
						
					</div>

					<div class="col s12 l2 m2"></div>
			</div>
			<div class="row">
				<div class="col s12 l1 m1"></div>
				<div class="col s12 l10 m10">
					<div id="reporte"></div>
				</div>
				<div class="col s12 l1 m1"></div>
			</div>
		</div>
	</div>
</div>

<?php 
$this->load->view("bienestarsocial/panel/inc/pie.php");
?>


<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/panel/js/reporte.js"></script>



