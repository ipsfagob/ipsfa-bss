<!DOCTYPE html>

  <html>
    <head>
    	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet" /> -->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/estilo.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				</ul>				
				<ul id="nav-mobile" class="side-nav">
					<br>											
					
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
				<span>Ultima Conexión: <?php echo $_SESSION['ultimaConexion'];?></span>
			</div>
			<div  class="ContactoDetalle">
				<span>Telefono: XXXX-XXXXXXX</span></div>
			
			<div class="ContactoDetalle">
				<span>
				<?php 
					$validar = '<i class="material-icons green-text md-18 left">done</i>';
					if($_SESSION['estatus'] == 0){
						$validar = '<i class="material-icons red-text md-18 left">warning</i>';
					}
					echo $validar . $_SESSION['correo'];
				?>
				</span>
			</div>
		
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