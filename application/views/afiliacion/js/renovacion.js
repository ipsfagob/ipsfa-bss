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
	

	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];	
	if(file == undefined ) {
		Materialize.toast('Si desea puede sustituir la foto para actualizar su expediente', 3000);
	}else{
		if(file.size < 1000000) {		
			var data = new FormData();
			data.append('file',file);
			data.append('oid', $("#oid").val());		
			
			$.ajax({
				url:sUrlP + "actualizarFoto/",
				type:'POST',
				contentType:false,
				data:data,
				processData:false,
				cache : false,
				success : function(res){	           
		               	Materialize.toast(res, 3000);             
		            } 
			});		
		}else{
			Materialize.toast('No se puede subir un archivo mayor a 1 MB', 3000);
		}	
	}
	salvarDireccion();
	salvarDatosMedicos();
}


function msjRenovacion(){
	msj = '';
	

	msj = 'Para la sustitución del carnet deberá efectuar su déposito en nuestras cuentas del Banco:.<br><br> ' +
		'VENEZUELA #00000000000000000000 Cuenta Corriente<br>' +
		'BANFAN #00000000000000000000 Cuenta Corriente<br>' +
		'A nombre de INSTITUTO DE PREVISION SOCIAL DE LA FUERZA ARMADA NACIONAL';
	acciones = '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="">' +
      	'Confirmar Pago<i class="material-icons left green-text">check_circle</i></a>' +
      	'<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">' +
      	'Cancelar<i class="material-icons left red-text">cancel</i>' +
	  	'</a>';
		


	$("#msj").html(msj);
	$("#acciones").html(acciones);

	return true;
}

/**
* Enrutar a segmentos de la pagina
*
* @access public
* @return mixed
*/
function ruta(){
	$(location).attr('href', sUrlP + "adjuntar/" + familiar + "/" + motivo + "/" + sucursal);	
}

/**
* Salvar detalles de medicos y datos fisionomicos
*
* @access public
* @return mixed
*/
function salvarDatosMedicos(){


	var Datos = {};
	var Medicos = {};
	var Fisionomicos = {};

	Medicos['sangre'] = $('#sangre').val();
	Medicos['expediente'] = $('#expediente').val();
	Medicos['organo'] = $('#organo').val();
	Medicos['alergia'] = $('#alergia').val();
	Medicos['enfermedad'] = $('#enfermedad').val();

	Fisionomicos['piel'] = $('#piel').val();
	Fisionomicos['cabello'] = $('#cabello').val();
	Fisionomicos['ojos'] = $('#ojos').val();
	Fisionomicos['estatura'] = $('#estatura').val();
	Datos['oid'] =  $('#oid').val();
	Datos['Medicos'] = Medicos;
	Datos['Fisionomicos'] = Fisionomicos;
	$.getJSON( sUrlP + "salvarDatosMedicos/", Datos)
			.done(function(data) {			
				console.log(data);
				$(location).attr('href', sUrlP + "adjuntos/" + codigo + "/" + 1);	
			})
			.fail(function(jqXHR, textStatus) {
		    	alert(jqXHR.responseText);
		});	

	
}