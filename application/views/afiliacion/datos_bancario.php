<?php 
$this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/datos.js"></script>

<div class="container">
<br>
  
 <div class="row white">
	 

      <h5>Datos Bancarios</h5>
      


      <?php
        $cadena = '';
        
        foreach ($Militar->Persona->Bancos as $key => $v) {
          $cadena .= '
            
              <div class="input-field col s12 m6 l6">
                <input readonly  id="banco" type="text" class="validate  imagen-text-right" value="' . $v->nombre . '">
                <label  style="color:#000; font-weight: bold;" for="banco">Banco</label>
              </div>
              
              <div class="input-field col s6 m6 l6">
                <input readonly id="cuenta" type="text" class="validate  imagen-text-right" value="' . $v->cuenta . '">
                <label  style="color:#000; font-weight: bold;" for="cuenta">Cuenta Bancaria</label>
              </div>

              <div class="input-field col s6">
                <input  readonly  id="cuenta" 
                type="text" class="validate  imagen-text-right" value="' . $v->obtenerTipoCuenta() . '">
                <label  style="color:#000; font-weight: bold;" >Tipo de Cuenta</label>
              </div>        
           ';
        }



        echo $cadena;

      ?>
           



      
 
              
        <div class="col s12 m12 l12">
          <div class="col s12 card-panel blue lighten-2">
          <h5>Notas: </h5>
            <p style="text-align: justify;">
              <ol>
                <li>En caso de que no sea su cuenta bancaria, favor dirigirse a la Gerencia de Finanzas del 
                IPSFA en cualquiera de sus sucursales ya que todos los procesos estarán asociados a la cuenta. 

                </li>
                <li>
                  Por último presione Ir al Inicio para continuar con los procesos.
                </li>
                
              </ol>        
            </p>    
          </div>

        

        <div class="col s6" >
        <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
        href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Ir al Inicio
            <i class="material-icons left">home</i>
        </a>
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