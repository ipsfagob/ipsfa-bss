<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
 <div class="row">
	 <div class="col s4">
	 	<img src="/ipsfa-dg/public/img/nodisponible.jpg" class="responsive-img circle" >
	 </div>
	 <div class="col s8">
	 	<div class="input-field col s12">
          <input id="cedula" type="text" class="validate">
          <label for="cedula">Documento de Identidad</label>
        </div>
 

	 	
	 </div>
 </div>
 
 

    <form class="col s12">
     <div class="row">
     	<div class="input-field col s12">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Nombres</label>
        </div>
        
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
     </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email" data-error="Invalido" data-success="right">Correo Electronico</label>
        </div>
      </div>
      
      
      <div class="row">
        <div class="input-field col s6">
          <input id="cel" type="text" class="validate">
          <label for="cel">Celular</label>
        </div>
        <div class="input-field col s6">
          <input id="tel" type="text" class="validate">
          <label for="tel">Teléfono de Casa</label>
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