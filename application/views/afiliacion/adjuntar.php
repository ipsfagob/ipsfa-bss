<?php 
  $this->load->view("afiliacion/inc/cabecera.php");
?>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/renovacion.js"></script>
<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/afiliacion/js/datos.js"></script>


<div class="container">
<br>
    <form>
    <input id="oid" type="hidden" value="<?php echo $Persona->oid?>">   
      <div class="row white">
      <br>
        
                  <div class="input-field col s12 m6 l6">
                    <input  readonly  id="first_name" type="text" class="validate  imagen-text-right" value="<?php echo $Persona->nombreCompleto()?>">
                    <label style="font-size: 16px">Nombres</label>
                  </div>
                  
                  <div class="input-field col  s12 m6 l6">
                    <input  readonly id="last_name" type="text" class="validate  imagen-text-right" 
                    value="<?php echo $Persona->apellidoCompleto()?>">
                    <label style="font-size: 16px">Apellidos</label>
                  </div>  
      </div>
        
      <div class="row white">
          <div class="col s12 m12 l12">


          
  <div class="row">
    <div class="col s12">
      <ul class="tabs blue-ipsfa">
        <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#test1">Datos Básicos</a></li>
        <li class="tab col s3"><a class="white-text waves-effect waves-light"  href="#test2">Dirección</a></li>        
        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#test3">+ Datos</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
            <div class="col s12 m4 l3" >        
                <div style="width: 140px;height: 160px; margin-left:20px " id="view-1" >
                  <img style="width: 140px;height: 160px; margin-left: 0px" 
                  src="http://192.168.12.198/imagenes/imagenes/<?php echo $Persona->cedula;?>.jpg"
                  class="file-path-wrapper-pre-view" id="pre-view-1" />
                </div>
                <!-- -->
                <div class="file-field input-field col file-field-input-field" >
                    <div class="file-path-wrapper file-path-wrapper-sopor">
                      <input class="file-path validate" type="text"  placeholder="Cambiar Foto">
                    </div>
                          
                    <div class="btn btns-rd-c">
                      <input type="file" name='recipe' id="inputFile[1]"  accept="image/gif, image/jpeg, image/png" 
                      onchange="readURL(this, 1, 'img');">
                      <i class="material-icons">camera_alt </i>
                    </div>
                  </div>
              </div> 

              <div class="col s12 m8 l9">
                  <div class="input-field col s12 m12 l12">
                    <input readonly id="cedula" type="text" class="validate  imagen-text-right" 
                      value="<?php echo $Persona->nacionalidad . '-' . $Persona->cedula?>">
                    <label style="font-size: 16px">Cédula</label>
                  </div>
                  <div class="input-field col s12  m12 l12">
                    <input  readonly  id="edocivil" type="text" class="validate  imagen-text-right" value="<?php echo $Persona->estadoCivil;?> ">
                    <label style="font-size: 16px">Estado Civil</label>
                  </div>  
  

                  <div class="input-field col s12 m6 l6">
                    <input  readonly  id="fechaNacimiento" class="validate  imagen-text-right" type="text" 
                    value="<?php echo $Persona->obtenerFechaHumana()?>">
                    <label style="font-size: 16px">Fecha de Nacimiento</label>
                  </div>
                  
                  <div class="input-field col  s12 m6 l6">
                      <input  readonly  id="sexo" class="validate  imagen-text-right" 
                      type="text" value="<?php echo $Persona->obtenerSexo()?>">            
                    <label style="font-size: 16px">Genero</label>
                  </div>  
                  <div class="col s12 m12 l12" >
                    <a  class="right btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="continuar('test2')" >Continuar
                        <i class="material-icons right">send</i>
                    </a>
                  </div>
      
              </div>

    </div>
    <div id="test2" class="col s12"> 
    <!-- 
      Datos Fisionomicos
    -->
    <?php 
      $this->load->view("afiliacion/frm/direccion.php");
    ?>


    </div>
    <div id="test3" class="col s12">
      <!-- 
      Otros Datos
    -->
        <?php 
      $this->load->view("afiliacion/frm/fisionomico.php");
    ?>
    </div>



  </div>
        


          </div>
            
      </div> <!-- Fin de Fila -->
      
      <div class="row white">
        <div class="col s6 " >
          <a href="#" class=" btn-large waves-effect waves-light"  style="background-color:#00345A" onclick="anterior()">Volver atrás
            <i class="material-icons left">arrow_back</i>       
          </a>
        </div>

        <div class="col s6" id="renovar">
  			<a  class="right btn-large waves-effect waves-light" style="background-color:#00345A"   onclick="guardar()" >GUARDAR
  			    <i class="material-icons right">assignment_ind</i>
  			</a>
      	</div>

        
        <br>
      </div>   
   

    </div> 
    </form>    

</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal" >
    <div class="modal-content">
      <h4>Mensaje!!!</h4>
      <p id="msj"></p>
    </div>
    <div class="modal-footer" id="acciones">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
      	Continuar<i class="material-icons left green-text">check_circle</i>
      </a>

      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
      	Cancelar<i class="material-icons left red-text">cancel</i>
	  </a>
    </div>
  </div>
          


<?php 
$this->load->view("afiliacion/inc/pie.php");
?>