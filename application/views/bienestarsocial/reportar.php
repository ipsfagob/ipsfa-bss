<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>


<div class="container .hide-on-small-only">

    <form class="col s12" action="solicitud" method="post">
       <div class="row">
         <div class="col s12">
          <p>
            Hola. Saludos, bienvenidos al sistema de reportes, está interfaz le servirá en caso de que
            detecte algún dato del sistema errado y no pueda ser cambiado solo debe seleccionar y pulsar 
            enviar y pronto estará resuelto.
          </p>    
         </div>
       </div>
      
       <div class="section">
          <h5>Datos Personales</h5>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="nombre" />
                <label for="nombre">Nombre y Apellido</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="sexo" />
                <label for="sexo">Sexo o Genero</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="fecha" />
                <label for="fecha">Fecha de Nacimiento</label>
              </div>
           </div>

           <div class="divider"></div>
           <h5>Datos Militares</h5>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="componente" />
                <label for="componente">Componente</label>
              </div>
              <div class="col s12 m4">
                <input type="checkbox" id="rango" />
                <label for="rango">Rango Militar</label>
              </div>
           </div>

          <div class="divider"></div>
          <br>

           <div class="row">
             <div class="col s12">
               <button class="btn waves-effect waves-light  amber darken-3" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>

             </div>
           </div>
           
      </div>
    </form>
 </div>



<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>