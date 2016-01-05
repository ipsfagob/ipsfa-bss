<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>

<br>
<div class="row">
	<div class="col s12">
		<form>
			<div class="input-field">
				<input id="search" type="search" required> <label for="search"><i
					class="material-icons">search</i></label> <i class="material-icons">close</i>
			</div>
		</form>
	</div>
</div>

<ul class="collection">
	<li class="collection-item avatar"><img
		src="<?php echo base_url()?>public/img/inventario/acetaminofen.jpg"
		alt="" class="circle"> <span class="title">Acetaminofen</span>
		<p>
			First Line <br> Second Line
		</p> <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
	</li>
	<li class="collection-item avatar"><i class="material-icons circle">folder</i>
		<span class="title">Title</span>
		<p>
			First Line <br> Second Line
		</p> <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
	</li>
	<li class="collection-item avatar"><i
		class="material-icons circle green">insert_chart</i> <span
		class="title">Title</span>
		<p>
			First Line <br> Second Line
		</p> <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
	</li>
	<li class="collection-item avatar"><i class="material-icons circle red">play_arrow</i>
		<span class="title">Title</span>
		<p>
			First Line <br> Second Line
		</p> <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
	</li>
</ul>




<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>