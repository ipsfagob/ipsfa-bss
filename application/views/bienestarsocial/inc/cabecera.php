<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font
      

      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	-->					
      <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
    <style>
    
      body {
	    display: flex;
	    min-height: 100vh;
	    flex-direction: column;
	  }
	
	  main {
	    flex: 1 0 auto;
	  }
      

    
	  /* label underline focus color */
	  .input-field input[id="search"]:focus {
	     border-bottom: 0px solid #000;
	     box-shadow: 0 0px 0 0 #000;
	  }
	
  </style>
  
    </head>

    <body>
	<main>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper" style="background-color:#00345A">
				<a href="#" class="brand-logo">Bienestar</a>
				<a href="#" data-activates="nav-mobile" class="button-collapse" id="menuprincipal">
				<i class="mdi-image-dehaze"></i></a>
								
				<ul id="solicitudes1" class="dropdown-content">				  			 
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
						Medicamentos<i class="mdi-maps-local-hospital left blue-text "></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2">
					  	Notificar Apoyo<i class="mdi-action-assignment-late left blue-text"></i></a>
					</li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1">
					  	Notificar Reembolso<i class="mdi-action-assignment left blue-text "></i></a>
					</li>
							
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						Solicitudes<i class="mdi-action-alarm-add left blue-text"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/citas">Citas<i class="mdi-action-lock left blue-text"></i></a></li>				
					<li><a href="#">Configurar<i class="mdi-action-settings left blue-text"></i> </a></li>
				</ul>
				
				<ul id="nav-mobile" class="side-nav">
					<br>	
					<!-- <img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img"> -->
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/index/<?php echo $_SESSION['cedula']; ?>">Principal
					<i class="mdi-action-home left blue-text"></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/datos">Datos Personales
					<i class="mdi-action-account-circle left blue-text"></i></a></li>
					
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
						Medicamentos<i class="mdi-maps-local-hospital left blue-text"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/2">
					  	Notificar Apoyo<i class="mdi-action-assignment-late left blue-text"></i></a>
					</li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/1">
					  	Notificar Reembolso<i class="mdi-action-assignment left blue-text"></i></a>
					</li>
							
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						Solicitudes<i class="mdi-action-alarm-add left blue-text"></i></a>							
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/citas">Citas<i class="mdi-action-lock left blue-text"></i></a></li>			
					<li><a href="#">Configurar<i class="mdi-action-settings left blue-text"></i> </a></li>
					<li><a href="#">Salir<i class="mdi-action-settings-power left blue-text"></i> </a></li>
				</ul>
				
				<ul class="right hide-off-med-and-down">

					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/carro">
						<i class="mdi-action-shopping-cart"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/salir">
						<i class="mdi-action-settings-power"></i></a>
					</li>
				</ul>

				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">
					<i class="mdi-action-home"></i></a></li>
					<li><a class="dropdown-button" href="#!" data-activates="solicitudes1">
						<i class="mdi-navigation-apps"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/datos">
					<i class="mdi-action-account-circle"></i></a></li>					
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
	      	class="btn-floating blue tooltipped" data-position="top" data-delay="10" data-tooltip="Solicitud">
	      	<i class="material-icons">library_books</i></a>
	      </li>

	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/ayudas" 
	      		class="btn-floating tooltipped blue"  data-position="top" data-delay="10" data-tooltip="Reembolsos y Apoyos"><i class="mdi-action-description"></i></a>
	      </li>
	      
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/medicamentos" 
	      		class="btn-floating blue tooltipped" data-position="top" data-delay="10" data-tooltip="Solicitud Medicamentos"><i class="mdi-editor-publish"></i></a>
	      </li>
	    </ul>
	  </div>
