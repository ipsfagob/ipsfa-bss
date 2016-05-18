

<?php 
$this->load->view("consultoria/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/consultoria/js/principal.js"></script>

<div class="container">

    <div class="row">
      <ul class="collection with-header">
          <li class="collection-header"><center><span class="titulo" style="font-size: 19px;color: #000;font-weight: bold;">
            
            Consultoría Jurídica (Exponer Requerimientos)
          </span></center>
          
          </li>
      </ul>
    </div>
	
      
      <div class="row white">
  <form >
    <div class="col s12 m12 l12">
           <span class="titulo" style="font-size: 16px;color: #000;font-weight: bold;">
           BIENVENIDO, <?php echo $Militar->Componente->rango?></span>
        </div>        
          <div class="input-field col s12 m12 l12">
                <!--
                <input readonly id="cedula" type="text" class="validate  imagen-text-right" 
                  value="<?php echo $Militar->Persona->nacionalidad . '-' . $Militar->Persona->cedula?>">
                <label>Documento de Identidad</label>
              </div>
              <div class="input-field col s12  m6 l6">
                <input  readonly  id="edocivil" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Persona->estadoCivil;?>">
                <label>Estado Civil</label>
              </div>
              <div class="input-field col s6">
                <input  readonly  id="componente" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Componente->nombre?>">
                <label>Componente</label>
              </div>
              
              <div class="input-field col s6">
                <input  readonly id="grado" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Componente->rango?>">
                <label>Grado</label>
              </div>
              !-->
              <div class="input-field col s6">
                <input  readonly  id="first_name" type="text" class="validate  imagen-text-right" value="<?php echo $Militar->Persona->nombreCompleto()?>">
                <label>Nombres</label>
              </div>
              
              <div class="input-field col s6">
                <input  readonly id="last_name" type="text" class="validate  imagen-text-right" 
                value="<?php echo $Militar->Persona->apellidoCompleto()?>">
                <label style="color:#000; font-weight: bold;">Apellidos</label>
              </div>

              <div class="input-field col s12">
                <textarea id="requerimiento" class="materialize-textarea" length="256"></textarea>
                <label for="requerimiento">Por favor describa brevemente su requerimiento</label>
                <input id="oid" type="hidden" value="<?php echo $Militar->Persona->oid?>"> 
            </div>
          <br>
          <div class="col s6" >
            <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
            onclick="Notificar()">Notificar
                <i class="material-icons left">send</i>
            </a>
            </div>
           <div class="col s6" >
            <a class="btn-large waves-effect waves-light" style="background-color:#00345A" 
            href="http://www.ipsfa.gob.ve/NUEVO/ipsfaNet/init.session.IPSFA.web/project.Web/projects/admin/view/panel.Init/consola/menu.gral.php">Ir al Inicio
                <i class="material-icons left">home</i>
            </a>
            </div>
          </form>

      
	</div>
</div>
        <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="width: 340px; height: 220px">
    <div class="modal-content">
      <h4>Felicitaciones!!!</h4>
      <p>Su requerimiento ha sido enviado, pronto un analista se pondra en contacto con usted.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">ACEPTAR
      <i class="material-icons left green-text">check_circle</i></a>
    </div>
  </div>



<?php 
$this->load->view("consultoria/inc/pie.php");
?>
    