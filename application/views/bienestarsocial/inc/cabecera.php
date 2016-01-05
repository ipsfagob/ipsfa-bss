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
      
	// html {
    //font-family: GillSans, Calibri, Trebuchet, sans-serif;
  	//}
  </style>
  
    </head>

    <body>
	
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper blue">
				<a href="#" class="brand-logo">Bienestar</a>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="solicitudes" class="dropdown-content">
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">
				  	Bienestar<i class="mdi-action-face-unlock left grey-text "></i>
				  	</a>
				  </li>
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
				  Drogueria<i class="mdi-av-my-library-add left grey-text "></i></a></li>
				</ul>
				
				<ul id="solicitudes1" class="dropdown-content">
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/bienestar">
				  	Bienestar<i class="mdi-action-face-unlock left grey-text "></i>
				  	</a>
				  </li>
				  <li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/farmacia">
				  Drogueria<i class="mdi-av-my-library-add left grey-text "></i></a></li>
				</ul>
				
				<ul id="nav-mobile" class="side-nav">		
					<img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img">
						
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">Principal
					<i class="mdi-action-home left grey-text "></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/datos">Datos Personales<i class="mdi-action-account-circle left grey-text"></i></a></li>
					
					<li><a class="dropdown-button" href="#!" data-activates="solicitudes">
						<i class="mdi-action-assignment left grey-text"></i>Solicitudes
						<i class="mdi-navigation-arrow-drop-down grey-text right"></i></a>
					</li>
					
					<hr>
					<li><a href="#">Promociones<i class="mdi-action-lock left grey-text"></i></a></li>
					<li><a href="#">Importantes<i class="mdi-action-favorite-outline left grey-text"></i> </a></li>
					
					<li><a href="#">Salir<i class="mdi-action-settings-power left grey-text"></i> </a></li>
				</ul>
				
				
				
				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/index">Principal<i class="mdi-action-home left"></i></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarSocial/datos">Datos Personales<i class="mdi-action-account-circle left"></i></a></li>
					
					<li><a class="dropdown-button" href="#!" data-activates="solicitudes1">
						<i class="mdi-action-assignment left"></i>Solicitudes
						<i class="mdi-navigation-arrow-drop-down right"></i></a>
					</li>
					
					<li><a href="#">Promociones<i class="mdi-action-lock left"></i></a></li>
					<li><a href="#">Importantes<i class="mdi-action-favorite-outline left"></i> </a></li>
					
					
				</ul>
				
			</div>
		</nav>
	</div>



	<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	    <a class="btn-floating btn-large green">
	      <i class="large material-icons">mode_edit</i>
	    </a>
	    <ul>
	      <li><a class="btn-floating red"><i class="material-icons">shopping_cart</i></a></li>
	      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
	      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
	      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
	    </ul>
	  </div>