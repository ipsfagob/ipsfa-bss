<!DOCTYPE html>

  <html>
    <head>
      <title>Ipsfa en linea</title>	
      <!--Import Google Icon Font     

      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	-->					
      <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>
       <link type="text/css" href="<?php echo base_url(); ?>application/views/bienestarsocial/css/estilo.css" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body class="grey lighten-3">
	<main>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper" style="background-color:#00345A">
				<a href="#" class="brand-logo">
					
					<img src="<?php echo base_url(); ?>public/img/logo-central-I.png" style="width:92px;height:89px;">

				</a>
				<a href="#" data-activates="nav-mobile" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only" style="background-color:#00345A" id="menuprincipal"><i class="mdi-navigation-menu"></i></a>
				
								
				<ul id="solicitudes1" class="dropdown-content " >				  			 
				  	<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/tratamiento">
						<i class="material-icons left blue-text text-darken-1">airline_seat_flat_angled</i><font class="black-text" >Tratamiento Prolongado</font></a>
					</li>
				  	<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me">
						<i class="material-icons left red-text">search</i><font class="black-text" >Consultar Medicamentos</font></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1">
					  	<i class="material-icons left blue-text text-darken-1">assignment</i><font class="black-text" >Notificar Reembolso</font></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2">
					  	<font class="black-text" >Notificar Apoyo</font><i class="mdi-action-assignment-late left blue-text text-darken-1"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba">
						<i class="material-icons left red-text">local_hospital</i><font class="black-text" >Badan</font></a>
					</li>			
					<li class="divider"></li>
							
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						<font class="black-text" >Casos Generales</font><i class="mdi-action-alarm-add left blue-text text-darken-1"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/ayudas">
						<font class="black-text" >Ayudas y Reembolsos</font><i class="material-icons left blue-text text-darken-1">description</i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/citas">
					<font class="black-text" >Citas</font><i class="mdi-action-lock left blue-text text-darken-1">
					</i></a></li>				
					

				</ul>
				
				<ul id="nav-mobile" class="side-nav">
					
					<img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img"> 
					<li><a href="<?php echo base_url(); ?>index.php/Panel/index/">Principal
					<i class="mdi-action-home left blue-text"></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/Afiliacion/index">Datos Personales
					<i class="mdi-action-account-circle left blue-text"></i></a></li>
					
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/me">
						Medicamentos<i class="mdi-action-search left red-text"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2">
					  	Notificar Apoyo<i class="mdi-action-assignment-late left blue-text"></i></a>
					</li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1">
					  	Notificar Reembolso<i class="mdi-action-assignment left blue-text"></i></a>
					</li>							
					<li class="divider"></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia/ba">
						Badan<i class="mdi-maps-local-hospital left red-text"></i></a>
					</li>			
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						Casos Generales<i class="mdi-action-alarm-add left blue-text"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/citas">
					Citas<i class="mdi-action-lock left blue-text"></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/salir" class="tooltipped" data-position="top" data-delay="10" data-tooltip="Volver al menu">
						Salir<i class="mdi-action-settings-power left red-text"></i> </a>
					</li>
				</ul>

				<ul id="control" class="dropdown-content">
				<li>
					<a href="<?php echo base_url(); ?>index.php/Afiliacion/index">
				    	<i class="material-icons light-blue-text text-darken-4 left">account_circle</i>Actualización de Datos
				    </a>
				</li>
				<li>
				  <a>
				  	<i class="material-icons lime-text text-darken-2 left">group</i>Afiliación
				  </a>
				</li>
				<li>
					<a>
				  		<i class="material-icons amber-text left">credit_card</i>Crédito
				  	</a>
				</li>
				<li>
				  <a>
				  	<i class="material-icons md-36 green-text left">access_alarms</i>Citas Automatizadas
				  </a>
				</li>
				<li>
				  <a>
				  	<i class="material-icons md-36 brown-text left">local_printshop</i>Impresión de Planillas y Netos
				  </a>
				</li>
				</ul>
				
				<ul class="right hide-off-med-and-down">
					<!-- Pendientes por crear-->
					<li>
						<a href="<?php echo base_url(); ?>index.php/BienestarSocial/index" class="tooltipped hide-on-large-only" data-position="bottom" data-delay="10" data-tooltip="Salir">
							<i class="mdi-action-settings-power"></i>
						</a>
					</li>
				</ul>

				<ul class="right hide-on-med-and-down">
					<li>
						<i class="right"></i>BIENESTAR Y SEGURIDAD SOCIAL
					</li>
					<li>
						<a href="<?php echo base_url(); ?>index.php/Panel/index">
							<i class="mdi-action-home"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">
							<i class="material-icons">store_mall_directory</i>
						</a>
					</li>

					<li>
						<i class="right"></i><?php echo $_SESSION['nombreRango'];?>
					</li>
					
					<li><a class="dropdown-panel" 
						   data-activates="notificaciones">						
						<i class="material-icons">notifications</i>

						</a>
					</li>
					
					<li><a class="dropdown-panel" href="#!" data-activates="control">
						<i class="mdi-navigation-apps"></i></a>
					</li>

					
					<li><a class="dropdown-panel" href="#!" data-activates="solicitudes1">
						<i class="material-icons">more_vert</i></a>
					</li>
					
					<li><a  
					class="dropdown-panel btn-medium waves-effect waves-light" 
						   data-activates="datos" >
						<i class="material-icons">account_circle</i></a>
					</li>				
				</ul>
				

				
				
			</div>
		</nav>
	</div>



	<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	    <a class="btn-floating btn-large blue darken-3">
	      <i class="large mdi-action-view-module"></i>
	    </a>
	    <ul>
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes"  
	      	class="btn-floating blue tooltipped" data-position="top" data-delay="10" data-tooltip="Casos Generales">
	      	<i class="material-icons">library_books</i></a>
	      </li>

	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/ayudas" 
	      		class="btn-floating tooltipped blue"  data-position="top" data-delay="10" data-tooltip="Reembolsos y Apoyos">
	      		<i class="material-icons">description</i></a>
	      </li>
	      
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/medicamentos" 
	      		class="btn-floating blue tooltipped" data-position="top" data-delay="10" data-tooltip="Solicitud Medicamentos"><i class="mdi-editor-publish"></i></a>
	      </li>
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/tratamientoSolicitud" 
	      		class="btn-floating blue tooltipped" data-position="top" data-delay="10" data-tooltip="Tratamientos Prolongado">
	      		<i class="material-icons">toc</i></a>
	      </li>
	    </ul>
	  </div>

<?php 
$this->load->view("panel/inc/mnu_tarjetas.php");
?>
<br>