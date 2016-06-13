<!DOCTYPE html>

  <html>
    <head>
      <!--Import Google Icon Font
      
	
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      		-->					
      <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet" />
      <title>Ipsfa en linea</title>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/afiliado/estilo.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      
    </head>

    <body class="grey lighten-3">
	<main>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper" style="background-color:#00345A">
				<a href="#" class="brand-logo">					
					<img src="<?php echo base_url(); ?>public/img/logo-ipsfa.png" >
				</a>
				<a href="#" data-activates="nav-mobile" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only" style="background-color:#00345A" id="menuprincipal"><i class="mdi-navigation-menu"></i></a>
				
								

				<?php 
					$this->load->view('afiliacion/inc/' . $menu . '.php');
				?>
				<ul class="right hide-off-med-and-down">
					<!-- Pendientes por crear-->
					<li>
						<a href="<?php echo base_url(); ?>index.php/BienestarSocial/index" class="tooltipped hide-on-large-only" data-position="bottom" data-delay="10" data-tooltip="Salir">
							<i class="mdi-action-settings-power"></i>
						</a>
					</li>
				</ul>

				
				<ul class="right hide-on-small-only">
					<li>
						<i class="right"></i><?php echo $_SESSION['nombreRango'];?>
					</li>
					<li><a  href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php" class="dropdown-panel tooltipped" 
					data-position="bottom" data-delay="10" data-tooltip="Volver al inicio">
						<i class="material-icons">home</i></a>
					</li>

					
					<li><a class="dropdown-panel" 
						   data-activates="notificaciones">						
						<i class="material-icons">notifications</i>

						</a>
					</li>
					
					
					
					
					<li><a class="dropdown-panel" href="#!" data-activates="control">
						<i class="mdi-navigation-apps"></i></a>
					</li>
					<!--
					<li><a class="dropdown-panel" href="#!" data-activates="menu">
						<i class="material-icons">more_vert</i></a>
					</li>
					-->
					<li><a  
					class="dropdown-panel btn-medium waves-effect waves-light" 
						   data-activates="datos" >
						<i class="material-icons">account_circle</i></a>
					</li>

				</ul>

				<ul id="nav-mobile" class="side-nav">
					<br>	
					<!-- <img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img"> -->
					<li><a href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Principal
					<i class="mdi-action-home left blue-text"></i></a></li>
					<li>
						<a href="<?php echo base_url(); ?>index.php/Afiliacion/actualizarDatos">Datos Personales
						<i class="mdi-action-account-circle left blue-text"></i></a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>index.php/Afiliacion/datosBancarios" class="left">
						Datos Bancarios<i class="mdi-action-assignment-late left brown-text"></i></a>
					</li>
					<			
				</ul>							
			</div>
		</nav>
	</div>


<?php 
	$this->load->view("panel/inc/mnu_tarjetas.php");
?>

