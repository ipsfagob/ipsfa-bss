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
					<div class="col s1 m3 l3">&nbsp;</div>
					<div class="col s10 m5 l5 ">
						<h4>IpsfaNet</h4>
						<a href="#!">Si es primera vez que accede a este sitio has click aquí</a>
						<div class="card grey lighten-4" style="padding: 15px">
						    <div class="card-image waves-effect waves-block waves-light">
						      <i class="material-icons md-128 grey-text" style="padding: 0px" >account_circle</i>
						       <p> 
						       	  <form action="validarUsuario" method="POST">
						        	<div class="input-field col s12">							       
							          <input id="usuario" name="usuario" type="text" class="validate">
							          <label for="usuario">Usuario</label>
							        </div>
							        <div class="input-field col s12">
							          
							          <input id="password" name="password" type="password" class="validate">
							          <label for="password">Contraseña</label>
							        </div>
							        <div class="col s12" style="text-align: right;">
							        	<button class="btn waves-effect waves-light blue" type="submit">Entrar
									</button>
							        </div>
							        </form>
						      </p>
						    </div>
						   
			  			</div>
			  			<a>¿Olvido su contraseña?</a>
			  			<br>
			  			Una sola cuenta IpsfaNet para todos los servicios del IPSFA 
					</div>
					<div class="col s1 m3 l3">&nbsp;</div>
				</div>						
			</div>
		</main>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>application/views/afiliacion/js/login.js"></script>
		<footer class="page-footer grey lighten-4">
	<div class="container brown-text center">
		
		<a>Acerca de IpsfaNet</a> | <a>Privacidad</a>  | <a>Condiciones</a> 
	
	</div>
	</body>

</footer>
</html>