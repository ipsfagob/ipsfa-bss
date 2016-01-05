<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
 <div class="row">
	 <div class="col s4">
	 	<img src="/ipsfa-dg/public/img/nodisponible.jpg" class="responsive-img circle" >
	 </div>
	 <div class="col s8">
	 	<p>
	 	Hola. Saludos, bienvenidos al sistema de reservación de citas para ayudas especializadas en:
	 	Medicamentos de alto costo, Protesis, Operaciones y otros.
	 	</p> 

	 	
	 </div>
 </div>
 
 

    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Por favor introduzca una breve descripción</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s12">
			<button class="btn waves-effect waves-light" type="submit" name="action">Enviar
			    <i class="material-icons right">send</i>
			</button>
      	</div>
      </div>       
    </form>
 



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>