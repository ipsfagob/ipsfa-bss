
<?php 
$this->load->view("panel/inc/cabecera.php");
?>

<br>

<div class="container">
	

<div class="row">
	<div class="col s12 m12 l12">
		 <ul class="collapsible" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header">
		      	
		      	<i class="material-icons md-36 light-blue-text text-darken-4">account_circle</i>Actualización de Datos</div>
		      	 <div class="collapsible-body"><p>
		      	  <a href="<?php echo base_url(); ?>index.php/Afiliacion/actualizarDatos">.- Datos Personales.</a><br>
			      <a href="<?php echo base_url(); ?>index.php/Afiliacion/datosBancarios">.- Datos Bancarios </a><br> 
			      
			     </p></div>

		      		      
		    </li>
		    <li>
		      <div class="collapsible-header">
		      	<i class="material-icons md-36 lime-text text-darken-2">group</i>Afiliación</div>
		      <div class="collapsible-body"><p>
		      	.- Renovación de Carnet.<br>
		      </p></div>
		    </li>
		    <li>
		      <div class="collapsible-header">
		      	<a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">
		      		<i class="material-icons md-36 red-text text-lighten-1">local_convenience_store</i>Bienestar Social</div>
		      	</a>
		    </li>
		    <li>
		      <div class="collapsible-header">
		      	<i class="material-icons md-36 amber-text">credit_card</i>Crédito</div>
		      
		    </li>
		    <li>
		      <div class="collapsible-header">
		      	<i class="material-icons md-36 green-text">access_alarms</i>Citas Automatizadas</div>
		      <div class="collapsible-body"><p></p></div>
		    </li>
		    <li>
		      <div class="collapsible-header">
		      	<i class="material-icons md-36 brown-text">local_printshop</i>Impresión de Planillas y Netos</div>
		      <div class="collapsible-body"><p>
		      	  .- 
					<a href="/web/web/ipsfaNet/print/reporte.php?txt_cedula=<?php echo $_SESSION['cedula']?>" target="_blank">
		      	  Constancia de Afiliación (PRINT)
		      	  </a><br>
		      	  .- Registro de Vehiculos. <br>
		      	  .-
		      	  <a href="/web/web/ipsfaNet/vista/controlvConsultaDocumentos.php?variable1=<?php echo $_SESSION['cedula']?>" target="_blank">
		      	   Registro de Vivencia. </a><br>
		      	  .- 
		      	  <a href="/web/web/ipsfaNet/solvPasRet/reporteHojSolv.php?txt_cedula=<?php echo $_SESSION['cedula']?>" target="_blank">
                    Hoja de Ruta
                  </a><br>
                  .- 
                  <a href="/web/web/ipsfaNet/solvPasRet/reporteSolvPasRet.php?txt_cedula=<?php echo $_SESSION['cedula']?>" target="_blank">
			      Hoja de Solvencia Pase a Retiro
			      </a></p>
			   </div>
		    </li>
		 </ul>

	</div>
</div>

	<div class="row" style="display: none">
		<div class="col s12 m4 l3">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light center">
			      <i class="material-icons md-128 light-blue-text text-darken-4">account_circle</i>
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Mi Cuenta<i class="material-icons right">expand_more</i></span><br>
			      <p><a href="#">Actualizar datos personales, familiares y seguridad y otros.</a></p>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Sub Menu<i class="material-icons right">close</i></span>
			      <p>.- Datos Personales.<br>
			      .- Datos Bancarios <br> 
			      .- Datos de Correo <br>
			      .- Clave y Constraseñas<br>		      </p>
			    </div>
			  </div>
		</div>

		<div class="col s12 m4 l3">
			  <div class="card">
			    <div class="card-image waves-effect waves-block waves-light center">
			      <i class="material-icons md-128 lime-text text-darken-2">group</i>
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Afiliación<i class="material-icons right">expand_more</i></span><br>
			      <p><a href="#">Afiliado es aquella persona u organización social, que decide inscribirse</a></p>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Sub Menu<i class="material-icons right">close</i></span>
			      <p>.- Renovación de Carnet.<br>
			      .- Citas Automatizadas <br> 
			      .- Constancia de Afiliación (PRINT) <br>
			      .- Hoja de Ruta<br>
			      .- Hoja de Solvencia Pase a Retiro

			      </p>
			    </div>
			  </div>



		</div>	
		<div class="col s12 m4 l3">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light center">
			      <i class="material-icons md-128 red-text text-lighten-1">local_convenience_store</i>
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Bienestar<i class="material-icons right">expand_more</i></span><br>
			      <p><a href="#">Es el conjunto de factores que participan en la calidad de la vida de la persona </a></p>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Sub Menu<i class="material-icons right">close</i></span>
			      <p>.- Medicamentos.<br>
			      .- Reembolsos <br> 
			      .- Ayudas <br>
			      .- Carta Aval<br>
			      .- Medicamento Alto Costo

			      </p>
			    </div>
			  </div>
		</div>
		
		<div class="col s12 m4 l3">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light center">
			      <i class="material-icons md-128 amber-text">credit_card</i>
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Créditos<i class="material-icons right">expand_more</i></span><br>
			      <p><a href="#">Operación financiera donde se presta una cantidad determinada de dinero</a></p>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4">Sub Menu<i class="material-icons right">close</i></span>
			      <p>.- Medicamentos.<br>
			      .- Reembolsos <br> 
			      .- Ayudas <br>
			      .- Carta Aval<br>
			      .- Medicamento Alto Costo

			      </p>
			    </div>
			  </div>

		</div>
	</div>

</div>
	

<?php 
$this->load->view("panel/inc/pie.php");
?>
