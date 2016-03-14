<!DOCTYPE html>

  <html>
  <title>IpsfaNet</title>
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

		  .material-icons.md-128 { font-size: 128px; }
      </style>
    </head>

    <body class="white lighten-4">
		<main>
			
			<div class="container">


				<div class="row center">
		          <div class="col s12 m3 l3">&nbsp;</div>
		          <div class="col s12 m6 l6">
		            <h4 class="bold">IpsfaNet</h4>
						<a href="<?php echo base_url(); ?>index.php/Login/identificacion">Si es primera vez que accede a este sitio has click aquí</a>
						<form action="<?php echo base_url(); ?>index.php/Login/validarUsuario" method="POST">
						 <div class="row">
					        <div class="col s12">
					          <div class="card white">
					            <div class="card-image blue"><br><h6 class="white-text" style="font-weight: 800">Hola, Bienvenido</h6>
					              <i class="material-icons md-128 blue-text text-lighten-1" >account_circle</i>
					            </div>
					            <div class="card-content" style="padding: 0px">	              		
			                      <div class="input-field col s12">
			                        <input id="cedula" name="cedula" type="text" class="validate" required>
			                        <label for="cedula">Usuario o Correo</label>
			                      </div>
			                      <div class="input-field col s12">                        
			                        <input id="clave" name="clave" type="password" class="validate" required>
			                        <label for="clave">Clave</label>
			                      </div>
			                    
					            </div>
					            <div class="card-action" style="text-align: right; padding: 8px">
					              <button class="btn waves-effect waves-light blue" type="submit" onclick="validarUsuario()">Entrar</button>
					            </div>
					          </div>
					        </div>
					      </div>
						</form>
						<a>¿Olvido su contraseña?</a>
			  			<br>
			  			Una sola cuenta IpsfaNet para todos los servicios del IPSFA 
		          </div>

		          <div class="col s12 m3 l3">&nbsp;</div>
		        </div>   








										
			</div>
		</main>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>application/views/login/js/login.js"></script>

	</body>


</html>