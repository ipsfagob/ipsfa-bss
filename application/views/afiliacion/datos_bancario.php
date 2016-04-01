<?php 
$this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/datos.js"></script>
<br><br>
<div class="container .hide-on-small-only">

  <div class="row">
   <div class="col s12">
    <p style="text-align: justify;">
      Bienvenidos al sistema de datos personales en caso de que
      detecte algún dato errado y no pueda ser actualizado; sólo debe pulsar click en reportar y enviar.
    </p>    
   </div>
</div>

  
 <div class="row">
	 

      <h4>Datos Bancarios</h4>
      <li class="divider"></li><br>
     <div class="row">
      <div class="input-field col s12 m6 l6">
          <input  disabled  id="banco" type="text" class="validate" value="<?php echo $Militar->Persona->banco?>">
          <label for="canco">Banco</label>
        </div>
        
        <div class="input-field col s6 m6 l6">
          <input  disabled id="cuenta" type="text" class="validate" value="<?php echo $Militar->Persona->cuenta?>">
          <label for="cuenta">Cuenta Bancaria</label>
        </div>

        <div class="input-field col s6">
          <input  disabled  id="cuenta" type="text" class="validate" value="<?php echo $Militar->Persona->obtenerTipoCuenta()?>">
          <label for=" disabled">Tipo de Cuenta</label>
        </div>
        
     </div>      
      
      <div class="row">

      <h5>Nota: </h5>
      <li class="divider"></li><br>
        <div class="input-field col s12 m12 l12">
          <input type="checkbox" id="certificar" />
          <label for="certificar" >Marque esta opción si sus datos bancarios son correctos y luego pulse actualizar</label>
        </div>
      </div>
      <br><br>      
      <div class="row">
      	<div class="col s6" >
  			<button  class="btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="" >Actualizar
  			    <i class="material-icons left">swap_vertical_circle</i>
  			</button>
      	</div>
        
      </div>       
    </form>
</div>




  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Notificar!!!</h4>
     


     <form class="col s12" id="reportar" method="post" name="reportar">
       <div class="row">
         <div class="col s12">
          <p style="text-align: justify;">
            Bienvenidos al sistema de reportes.<br>
            ¿Los datos presentados en el anterior formulario son correctos?
          </p>    
         </div>
       </div>
      
       <div class="section" style="display: none">
          <h5>Datos Personales</h5>
          <div class="divider"></div>
          <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chNombre" />
                <label for="chNombre" >Nombre y Apellido</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="chSexo" />
                <label for="chSexo">Sexo o Genero</label>
              </div>

              <div class="col s12 m4">
                <input type="checkbox" id="chFecha" />
                <label for="chFecha">Fecha de Nacimiento</label>
              </div>
           </div>

           <br>
           <h5>Datos Militares</h5>
           <div class="divider"></div>
           <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chComponente" />
                <label for="chComponente">Componente</label>
              </div>
              <div class="col s12 m4">
                <input type="checkbox" id="chRango" />
                <label for="chRango">Rango Militar</label>
              </div>

           </div>

          <br>
           <h5>Datos Bancarios</h5>
           <div class="divider"></div>
           <br>
           <div class="row">
              <div class="col s12 m4">
                <input type="checkbox" id="chBanco" />
                <label for="chBanco">Cuenta Bancario</label>
              </div>

           </div>
          <br>

           
      </div>
    </form>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-blue btn-flat" onclick="Salvar()">NO</a>  
      <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">SI</a>
    </div>
  </div>
    
      


<?php 
$this->load->view("afiliacion/inc/pie.php");
?>