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
	 	<div class="input-field col s12">
          <input disabled id="cedula" type="text" class="validate" value="<?php echo $Persona->nacionalidad . '-' . $Persona->cedula?>">
          <label for="disabled">Documento de Identidad</label>
        </div>
	 </div>
 </div>
 
 

    <form class="col s12">
     <div class="row">
      <div class="input-field col s6">
          <input  disabled  id="fechaNacimiento" type="date" class="datepicker" value="<?php echo $Persona->fechaNacimiento?>">
          <label for="disabled">Fecha de Nacimiento</label>
        </div>
        
        <div class="input-field col s6">
          <select  disabled >
            <option value="<?php echo $Persona->sexo?>"><?php echo $Persona->obtenerSexo()?></option>
            
            
          </select>
          <label>Genero</label>
        </div>
     </div>

     <div class="row">
     	<div class="input-field col s6">
          <input  disabled  id="first_name" type="text" class="validate" value="<?php echo $Persona->nombreCompleto()?>">
          <label for=" disabled">Nombres</label>
        </div>
        
        <div class="input-field col s6">
          <input  disabled id="last_name" type="text" class="validate" value="<?php echo $Persona->apellidoCompleto()?>">
          <label for=" disabled ">Apellidos</label>
        </div>
     </div>
          
      
      <div class="row">

        <div class="input-field col s4 m4 l2">
          <select id="codTelefono">

            <?php 
               echo '<option value="' . $Persona->codigoTelefono . '">' . $Persona->codigoTelefono . '</option>';
              foreach ($CodigoArea as $key => $val) {
                echo '<option value="' . $val->codarea . '">' . $val->codarea . '</option>';
              }
            ?>
          </select>
          <label>Codigo</label>
        </div>
        <div class="input-field col s8 m8 l4">
          <input id="telefono" type="text" class="validate" value="<?php echo $Persona->telefono?>">
          <label>Teléfono</label>
        </div>
        <div class="input-field col s4 m4 l2">
           <select id="codCelular">
            <option value="0412">0412</option>
            <option value="0416">0416</option>
            <option value="0426">0426</option>
            <option value="0414">0414</option>
            <option value="0424">0424</option>
          </select>
        </div>
        <div class="input-field col s8 m8 l4">
          <input id="celular" type="text" class="validate" value="<?php echo $Persona->celular?>">
          <label>Celular</label>
        </div>
        
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" value="<?php echo $Persona->correoElectronico?>">
          <label for="email" data-error="Invalido" data-success="right">Correo Electronico</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="direccion" class="materialize-textarea" length="256"><?php echo $Persona->direccion?></textarea>
          <label for="direccion">Por favor verifique su dirección</label>
        </div>
      </div> 
      
      <div class="row">
      	<div class="col s6">
  			<button class="btn-large waves-effect waves-light green darken-1" type="submit" name="action">Actualizar
  			    <i class="material-icons left">swap_vertical_circle</i>
  			</button>
      	</div>
        <div class="col s6">
        <button class="btn-large waves-effect waves-light amber darken-3" type="submit" name="action">Reportar
            <i class="material-icons left">verified_user</i>
        </button>
        </div>
      </div> 
    </form>
 

</div>

<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>