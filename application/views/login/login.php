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
	  .material-icons.md-200 { font-size: 200px; }
	  .material-icons.md-254 { font-size: 254px; }
      </style>
    </head>

    <body class="white lighten-4">
		<main>
			
			<div class="container">
				<div class="row center">
					<div class="col s1 m3 l3">&nbsp;</div>
					<div class="col s10 m5 l5 ">
						<h4>IpsfaNet</h4><br>
						<a href="#!">Si es primera vez que accede a este sitio has click aquí</a>
						<div class="card grey lighten-4" style="padding: 15px">
						    <div class="card-image waves-effect waves-block waves-light center">
						      <i class="material-icons md-128 grey-text">account_circle</i>
						       <p> 
						        <div class="input-field col s12">							       
							          <input id="icon_prefix" type="text" class="validate">
							          <label for="icon_prefix">Usuario</label>
							        </div>
							        <div class="input-field col s12">
							          
							          <input id="icon_telephone" type="tel" class="validate">
							          <label for="icon_telephone">Contraseña</label>
							        </div>
							        <div class="col s12" style="text-align: right;">
							        	<button class="btn waves-effect waves-light blue" type="button"  
							        	onclick="validarUsuario()">Aceptar
									</button><br><br>
							        </div>
						      </p>
						    </div>
						   
			  			</div>
			  			<a>¿Olvido su contraseña?</a>
					</div>
					<div class="col s1 m3 l3">&nbsp;</div>
				</div>						
			</div>
		</main>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>application/views/afiliacion/js/login.js"></script>
		
	</body>
</html>