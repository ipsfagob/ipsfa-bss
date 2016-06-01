<script type="text/javascript"
     src="<?php echo base_url(); ?>application/views/bienestarsocial/js/reembolso.js"></script>



<div class="row">
	 <div class="escajas col s12 m4 l5 ">
          <label for="familiar">Nombre del Familiar</label>
          <select id="familiar" class="browser-default">
          	<?php 
          		$cadena = '<option value="' . $Militar->Persona->oid . '|TITULAR">' .  $Militar->Persona->nombreApellidoCompleto() . '</option>';
          		echo $cadena;

          		foreach ($Militar->Persona->Familiares as $key => $val) {
          			$cadena = '<option value="' . $val->oid . '|' . $val->parentesco . '">' .  
                                   $val->nombreApellidoCompleto() . '(' . $val->parentesco . ')</option>';
          			echo $cadena;
          		}
          	?>
          </select>
          
     </div>
	 <div class="col s12 m4 l4 escajas">
          <label for="concepto">Seleccione un concepto</label>
          <select id="concepto"  class="browser-default">

          	<option value="0">------------------------</option>
          	<?php 
          		
          		foreach ($Concepto as $key => $val) {
          			$cadena = '<option value="' . $val->codigo . '">' .   
                         strtoupper($val->nombre) . '</option>';
          			echo $cadena;
          		}

          	?>
          </select>
         
     </div>
     <div class="col s9 m2 l2 escajas">
          <label for="monto" class="truncate">Monto Solicitado</label>
            <input id="monto" type="text" class="validate imagen-text-right" value="0,00" placeholder="Introduzca un Monto"
               maxlength="13" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">

     </div>

     <div class="input-field col s3 m2 l1">
           <a class="btn-floating tooltipped waves-effect waves-light green" 
           data-position="top" data-delay="10" data-tooltip="Agregar Pedido" onclick="agregarR()"><i class="material-icons">add</i></a>
     </div>
</div>