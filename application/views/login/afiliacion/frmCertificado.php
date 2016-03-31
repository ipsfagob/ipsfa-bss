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
			              <i class="material-icons md-128 green-text text-lighten-1" >verified_user</i>
			            </div>
			            <div class="card-content" style="padding: 10px">              		
	                      <p>
	                      	Su cuenta se encuentra activa para realizar cualquier proceso...
	                      </p>	                    
			            </div>
			            <div class="card-action" style="text-align: right; padding: 8px">
			              <button class="btn waves-effect waves-light green" type="submit">Ingresar</button>
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