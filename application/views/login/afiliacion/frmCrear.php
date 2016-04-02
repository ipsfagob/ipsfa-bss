<?php 
$this->load->view("login/afiliacion/inc/cabecera.php");
?>

    <div class="container">
        <br>
		<div class="row center">
          <div class="col s12 m3 l3">&nbsp;</div>
          <div class="col s12 m6 l6">
           
				<form action="<?php echo base_url(); ?>index.php/Login/registrarUsuario" method="POST">
				 <div class="row">
			        <div class="col s12">
			          <div class="card white">
			            <div class="card-image blue-ipsfa" ><br><h6 class="white-text"  style="font-weight: 800">Crea Usuario Ipsfa En Linea</h6> 
			              <center>
					              	<img src="<?php echo base_url(); ?>public/img/logo-central-I.png" style="width:150px;">
					              </center>
			            </div>
			            <div class="card-content" style="padding: 0px">	              		
	                      <div class="input-field col s12">
	                        <input id="usuario" name="usuario" type="text" class="validate" required>
	                        <label for="usuario">Nombre de Usuario</label>
	                      </div>
	                      <div class="divider"></div>
	                      <div class="input-field col s12">
	                        <input id="correo" name="correo" type="text" class="validate" required>
	                        <label for="correo">Correo Electronico</label>
	                      </div>
	                      <div class="input-field col s12">
	                        <input id="ccorreo" name="ccorreo" type="text" class="validate" required>
	                        <label for="ccorreo">Confirmar Correo</label>
	                      </div>
	                     
	                      <div class="divider"></div>
	                      <div class="input-field col s6">
	                        <input id="clave" name="clave" type="password" class="validate" required>
	                        <label for="clave">Clave</label>
	                      </div>
	                      <div class="input-field col s6">
	                        <input id="cclave" name="cclave" type="password" class="validate" required>
	                        <label for="cclave">Confirmar Clave</label>
	                      </div>

			            </div>
			              <div class="card-action" style="text-align: right; padding: 8px">
			              <button class="btn waves-effect waves-light blue-ipsfa" type="submit">Aceptar</button>
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