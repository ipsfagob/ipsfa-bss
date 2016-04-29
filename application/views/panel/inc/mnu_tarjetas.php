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
			<span style="float: right; padding-right: 30px"><a href="#!">+ Acerca de Ipsfa en linea</a></span></div>
			
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