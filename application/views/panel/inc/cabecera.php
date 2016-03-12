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
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    
      body {
	    display: flex;
	    min-height: 100vh;
	    flex-direction: column;
	  }
	
	  main {
	    flex: 1 0 auto;
	  }
      


	  /* Rules for sizing the icon. */
	  .material-icons.md-18 { font-size: 18px; }
	  .material-icons.md-24 { font-size: 24px; }
	  .material-icons.md-36 { font-size: 36px; }
	  .material-icons.md-48 { font-size: 48px; }
	  .material-icons.md-64 { font-size: 64px; }
	  .material-icons.md-100 { font-size: 100px; }
	  .material-icons.md-128 { font-size: 128px; }
	  .material-icons.md-200 { font-size: 200px; }
	  .material-icons.md-254 { font-size: 254px; }
		
		.button { /* clase general */
		  border: 1px solid #dedede;
		  border-radius: 3px;
		  color: #555;
		  font: 12px/12px HelveticaNeue, Arial;
		  padding: 8px 11px;
		  text-decoration: none;
		}

		.ContactoDetalle{
			font-size: 12px;
			color: #ccc;
			overflow: hidden; height: 24px;
		}
		.ContactoDetalle span{
			float: left; 
			margin-top: -1.2em;
		}
		.ContactoDetalle a{
			font-size: 11px;
			color: blue;
		}



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
					<li><a href="<?php echo base_url(); ?>index.php/Panel/salir" class="tooltipped" data-position="top" data-delay="10" data-tooltip="Cerrar Sesión">
						Salir<i class="mdi-action-settings-power left red-text"></i> </a>
					</li>
				</ul>
				
				<ul class="right hide-off-med-and-down">

					<li><a href="<?php echo base_url(); ?>index.php/Login/salir"
					class="tooltipped hide-on-large-only" data-position="bottom" data-delay="10" data-tooltip="Salir">
						<i class="mdi-action-settings-power"></i></a>
					</li>
					
				</ul>

				<ul class="right hide-on-med-and-down">
					<li>
						<i class="right"></i><?php echo $_SESSION['nombreRango'];?>
					</li>
					
					<li><a class="dropdown-panel" 
						   data-activates="notificaciones">						
						<i class="material-icons">notifications</i>

						</a>
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



	

	<div id="datos" class="dropdown-content" style="width: 350px; padding-top: 15px; padding-bottom: 0px;">
		
			<div style="padding: 1em; padding-left: 0px; float: left;  margin-bottom: 10px; overflow: hidden;">
				<i class="material-icons md-100  brown-text text-lighten-4">account_circle</i>
			</div>
			<div  class="ContactoDetalle">
				<span>Teniente Coronel</span>
			</div>
			<div  class="ContactoDetalle">
				<span>Telefono: XXXX-XXXXXXX</span></div>
			
			<div class="ContactoDetalle">
			<span>Correo: a@gmail.com</span></div>
		
			<div class="ContactoDetalle" style="height: 48px">
			<span style="float: right; padding-right: 30px"><a href="#!">+ Acerca de IpsfaNet</a></span></div>
			
			<div class="grey lighten-5" style="height: 48px; border: 1px solid #CCC">
				<span style="float: right; padding: 7px; padding-top: 9px; padding-right: 20px">
					<a class="button " href="<?php echo base_url(); ?>index.php/Login/salir">
						Salir del Sistema
					</a>
				</span>
				
			</div>
		
	</div>

	<div id="notificaciones" class="dropdown-content" style="width: 350px; padding: 0px; ">
		<div class="ContactoDetalle " style="height: 30px;">
			<span style="float: left; padding-left: 10px;" class="blue-text">
				<i class="material-icons md-18 left orange-text">info</i>Información General
			</span>			
		</div>
			<div style="padding-left: 0px; height: 140px">
				<div  class="collection ">
					
				</div>	
			</div>
			
		
		<div class="ContactoDetalle grey lighten-5" style="height: 40px; border: 1px solid #CCC">
			<span style="float: right; padding: 5px; padding-top: 4px; padding-right: 10px">
				<a href="#">+ ver más</a>
			</span>			
		</div>
	</div>