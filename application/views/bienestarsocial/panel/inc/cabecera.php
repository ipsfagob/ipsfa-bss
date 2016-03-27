<!DOCTYPE html>

  <html>
    <head>
      <!--Import Google Icon Font
      

      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	-->					
	  <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/estilo.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
  </style>
  
    </head>

    <body class=" grey lighten-4">
	<main>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper" style="background-color:#00345A">
				<a href="#" class="brand-logo">
					
					<img src="<?php echo base_url(); ?>public/img/logo-ipsfa.png" >

				</a>
				<a href="#" data-activates="nav-mobile" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only" style="background-color:#00345A" id="menuprincipal"><i class="mdi-navigation-menu"></i></a>
				
								
				<ul id="solicitudes1" class="dropdown-content " >				  			 
				  <li><a href="<?php echo base_url(); ?>index.php/Panel/farmacia/me">
						<font class="black-text" >Medicamentos</font><i class="mdi-maps-local-hospital left red-text "></i></a>
					</li>
											
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/Panel
					/solicitudes">
						<font class="black-text" >Solicitudes</font><i class="mdi-action-alarm-add left blue-text text-darken-3"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/Panel/citas">
					<font class="black-text" >Citas</font><i class="mdi-action-lock left blue-text text-darken-3">
					</i></a></li>				
					

				</ul>
				
				<ul id="nav-mobile" class="side-nav">
					<br>	
					<!-- <img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img"> -->
					<li><a href="<?php echo base_url(); ?>index.php/Panel/index/">Principal
					<i class="mdi-action-home left blue-text"></i></a></li>
					
					
					<li><a href="<?php echo base_url(); ?>index.php/Panel/medicamentos">
						Medicamentos<i class="mdi-maps-local-hospital left blue-text"></i></a>
					</li>
											
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/Panel/solicitudes">
						Solicitudes<i class="mdi-action-alarm-add left blue-text"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/Panel/tratamientos">
					Citas<i class="mdi-action-lock left blue-text"></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/Panel/salir" class="tooltipped" data-position="top" data-delay="10" data-tooltip="Volver al menu">
						Salir<i class="mdi-action-settings-power left red-text"></i> </a>
					</li>
				</ul>
				
				<ul class="right hide-off-med-and-down">					
					
				</ul>

				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo base_url(); ?>index.php/Panel/index" >
						<i class="right"></i>ANALISTA</a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/Panel/index" >
						<i class="mdi-action-home"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/Panel/index" >
						<i class="material-icons">notifications</i></a>
					</li>
					<li><a class="dropdown-panel" href="#!" data-activates="panelControl">
						<i class="material-icons">more_vert</i></a>
					</li>
									
				</ul>
				
				
				
			</div>
		</nav>
	</div>



	

	<div id="datos" class="dropdown-content" style="width: 400px">
		<div class="row">
			<div class="col s4">Nombre</div>
			<div class="col s4">Apellido</div>
		</div>
	</div>

	<ul id="panelControl" class="dropdown-content">
	    <li>
	      <a>
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
	      	<i class="material-icons red-text text-lighten-1 left">local_convenience_store</i>Bienestar Social
	      </a>
	    </li>

	</ul>
