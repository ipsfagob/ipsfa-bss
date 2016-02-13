<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      -->							
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
			<div class="nav-wrapper blue">
				<a href="#" class="brand-logo">Bienestar</a>
				<a href="#" data-activates="nav-mobile" class="button-collapse" id="menuprincipal">
				<i class="mdi-image-dehaze"></i></a>
								
				<ul id="solicitudes1" class="dropdown-content">				  			 
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
						Medicamentos<i class="mdi-maps-local-hospital left red-text "></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/ap">
					  	Notificar Apoyo<i class="mdi-action-assignment-late left yellow-text"></i></a>
					</li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/re">
					  	Notificar Reembolso<i class="mdi-action-assignment left green-text "></i></a>
					</li>
							
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						Solicitudes<i class="mdi-action-alarm-add left orange-text text-accent-4"></i></a>							
					</li>
					<li><a href="#">Promociones<i class="mdi-action-lock left amber-text text-darken-4"></i></a></li>			
					<li><a href="#">Configurar<i class="mdi-action-settings left teal-text"></i> </a></li>
				</ul>
				
				<ul id="nav-mobile" class="side-nav">		
					<img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img">					
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">Principal
					<i class="mdi-action-home left blue-text "></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/datos">Datos Personales
					<i class="mdi-action-account-circle left deep-purple-text text-lighten-1"></i></a></li>
					
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
						Medicamentos<i class="mdi-maps-local-hospital left red-text "></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/ap">
					  	Notificar Apoyo<i class="mdi-action-assignment-late left yellow-text"></i></a>
					</li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar/re">
					  	Notificar Reembolso<i class="mdi-action-assignment left green-text "></i></a>
					</li>
							
					<li class="divider"></li>				
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes">
						Solicitudes<i class="mdi-action-alarm-add left orange-text text-accent-4"></i></a>							
					</li>
					<li><a href="#">Promociones<i class="mdi-action-lock left amber-text text-darken-4"></i></a></li>			
					<li><a href="#">Configurar<i class="mdi-action-settings left teal-text"></i> </a></li>
					<li><a href="#">Salir<i class="mdi-action-settings-power left red-text"></i> </a></li>
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
	    <a class="btn-floating btn-large green">
	      <i class="large mdi-action-view-module"></i>
	    </a>
	    <ul>
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/pendientes" 
	      		class="btn-floating yellow darken-1"><i class="mdi-navigation-check"></i></a>
	      </li>
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/carro"  
	      	class="btn-floating green"><i class="material-icons">shopping_cart</i></a>
	      </li>
	      <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia" 
	      		class="btn-floating blue darken-4"><i class="mdi-av-my-library-add"></i></a>
	      </li>
	    </ul>
	  </div>
