<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<br><br>
<div class="container .hide-on-small-only">
 <div class="row">
	 <div class="col s4">
	 	<img src="/ipsfa-dg/public/img/nodisponible.jpg" class="responsive-img circle" >
	 </div>
	 <div class="col s8">
	 	<p>
	 	Hola. Saludos, bienvenidos al sistema de reservación de citas para ayudas especializadas en:
	 	Medicamentos de alto costo, Protesis, Operaciones y otros.
	 	
	 	Recuerde que debe cumplir con los siguientes requisitos según sea el caso
	 	</p> 	 	
	 </div>
 </div>
 
 <div class="row">
 <div class="col s12">
 	Requisitos 
 	<ul> 		
 		<li>1. Carta de exposición de motivos.</li>
 		<li>2. Copia de la carta aval de seguros horizonte..</li>
 		<li>3. Constancia Original de agotamiento de cobertura.</li>
 		<li>4. Según sea el caso Constancia original de la deuda contraída.</li>
 		<li>5. Copia de la cédula de identidad del afiliado.</li>
 		<li>6. Informe médico firmado y sellado.</li>
 		<li>7. Copia del carnets vigente del afiliado.</li>
 		<li>8. Planilla carta compromiso.</li>
 		<li>9. Planilla de solicitud de fondo de contingencia.</li>
 	</ul>		
 </div>
 </div>

    <form class="col s12" action="solicitud" method="post">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Por favor introduzca una breve descripción, que nos permita evaluar su situación de forma rápida y directa</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s12">
			<button class="btn-large waves-effect waves-light" type="submit" name="action">Solicitar Cita
			    <i class="material-icons right">send</i>
			</button>
      	</div>
      </div>       
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>