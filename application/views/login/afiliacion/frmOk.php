<?php 
$this->load->view("login/afiliacion/inc/cabecera.php");
?>


    <div class="container">
        <br>
		<div class="row center">
          <div class="col s12 m3 l3">&nbsp;</div>
          <div class="col s12 m6 l6">
            
				<form action="<?php echo base_url(); ?>index.php/Panel/index" method="POST">
				 <div class="row">
			        <div class="col s12">
			          <div class="card white">
			            <div class="card-image green"><br><h6 class="white-text" style="font-weight: 800">En hora buena, Felicitaciones !!!</h6>
			              <i class="material-icons md-128 green-text text-lighten-1" >check_circle</i>
			            </div>
			            <div class="card-content" style="padding: 10px">	              		
	                      <p>
	                      	Hola, <b><?php echo $_SESSION['nombreRango'];?></b> Le hemos enviado un correo de confirmación de cuenta, 
	                      	recuerde que debe certificar su cuenta haciendo click en el enlace que le enviamos. <br><br>
	                      	Esto le ayudará a mejorar sus procesos y tener información oportuna con todas nuestras aplicaciones.

	                      </p>
	                    
			            </div>
			            <div class="card-action" style="text-align: right; padding: 8px">
			              <button class="btn waves-effect waves-light green" type="submit">Iniciar</button>
			            </div>
			          </div>
			        </div>
			      </div>
				</form>
          </div>
          <div class="col s12 m3 l3">&nbsp;</div>
        </div>            
<?php 
$this->load->view("login/afiliacion/inc/pie.php");
?>