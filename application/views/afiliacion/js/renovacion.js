/**
* Mensaje en el caso de que un concepto exceda su limite
*
* @return mixed
*/
var familiar = '';
var motivo = 0;
var sucursal = 0;

function msjSucursal(){
	msj = '';
	cargarCampos();
	if(familiar !='' || motivo > 0 || sucursal > 0){
		msj = '¿Esta seguro que seleccionó la sucursal adecuada? Si es correcta preseione continuar. ';
		acciones = '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="ruta()">' +
	      	'Continuar<i class="material-icons left green-text">check_circle</i></a>' +
	      	'<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">' +
	      	'Cancelar<i class="material-icons left red-text">cancel</i>' +
		  	'</a>';
		
	}else{
		msj = 'Por favor verifique todos los campos son obligatorios';
		acciones = '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">' +
	      	'Ok<i class="material-icons left red-text">cancel</i>' +
		  	'</a>';
	}

	$("#msj").html(msj);
	$("#acciones").html(acciones);
	$('#modal1').openModal();
	

	return true;
}

function cargarCampos(){
	familiar = $("#familiar option:selected").val();
	motivo = $("#motivo option:selected").val();
	sucursal = $("#sucursal option:selected").val();
}



function anterior(){
	$(location).attr('href', sUrlP + "renovacionCarnet");	
}

function guardar(){
	msjRenovacion();
	salvarDireccion();

	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];


	alert($("#oid").val());
	if(file == undefined ) Materialize.toast('Si desea puede sustituir la foto para actualizar su expediente', 3000);
	
	var data = new FormData();
	data.append('recipe',file);
	data.append('odi', $("#oid").val());		
	
	$.ajax({
		url:sUrlP + "actualizarFoto/",
		type:'POST',
		contentType:false,
		data:data,
		processData:false,
		cache : false,
		success : function(res){
               Materialize.toast('Su solicitud se atendera a la brevedad', 3000);

              
            } 
	});
}


function msjRenovacion(){
	msj = '';
	

	msj = 'Para la sustitución del carnet deberá efectuar su déposito en nuestras cuentas del Banco:.<br><br> ' +
	'VENEZUELA #00000000000000000000 Cuenta Corriente<br>' +
	'BANFAN #00000000000000000000 Cuenta Corriente<br>' +
	'A nombre de INSTITUTO DE PREVISION SOCIAL DE LA FUERZA ARMADA NACIONAL';
	acciones = '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="ruta()">' +
      	'Confirmar Pago<i class="material-icons left green-text">check_circle</i></a>' +
      	'<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">' +
      	'Cancelar<i class="material-icons left red-text">cancel</i>' +
	  	'</a>';
		


	$("#msj").html(msj);
	$("#acciones").html(acciones);

	return true;
}