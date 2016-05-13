/**
* Establecer las variables del modulo
*
*/
var Solicitud = [];
var i = 0;
var pubMsj = '';

/**
* Agregando selección de productos a una lista virtual
*
* @return mixed
*/
function agregarR(){
	var Pedido = {};
	var familiar = $('#familiar').val();
	var concepto = $('#concepto').val();
	var monto = $('#monto').val();
	monto = monto.replace(/\./g,'').replace(',','.');
	if($('#monto').val() == "0,00" || concepto == "0"){				
		Materialize.toast("Debe introducir un monto o seleccionar un concepto", 3000, 'rounded');
		iniciarElementos();
	}else if(maximoValor($('#concepto option:selected').val(), monto) == true){
		var arr = familiar.split('|');
		Pedido['codigo'] = arr[0];
		Pedido['parentesco'] = arr[1];
		Pedido['nombre'] = $('#familiar option:selected').text();
		Pedido['concepto'] = $('#concepto option:selected').text();
		Pedido['codigoconcepto'] = $('#concepto option:selected').val();
		Pedido['monto'] = monto;
		Solicitud[i++] = Pedido;
		crearElementos();		
		iniciarElementos();
	}else{
		msjMaximo();
	}
}

/**
* Establecer el mensaje en caso de que un concepto exceda el limite
*
* @return mixed
*/
function maximoValor(concepto, monto){
	val = false;
	switch (concepto){
		case 'LENTE':
			val = true;
			if(monto > 50000) {	
				val = false;
				iniciarElementos();
				pubMsj = 'El monto maximo permitido por lentes es de 50.000,00 Bs.';
			}
			break;
		case 'TRAPS':
			val = true;
			if(monto > 10000) {	
				val = false;
				iniciarElementos();
				pubMsj = 'El monto maximo permitido por tratamiento psicologico es de 10.000,00 Bs.';
			}
			break;
		case 'GERIT':
			val = true;
			if(monto > 10000) {	
				val = false;
				iniciarElementos();
				pubMsj = 'El monto maximo permitido por geriatrico es de 10.000,00 Bs.';
			}
			break;
		default:
			val = true;
	} 
	return val;
}

/**
* Crear Elementos generales
*
* @return mixed
*/
function crearElementos(){	
	$('#total').val('0');
	$('#dtReembolso').html('<li class="collection-header"><h5>Datos de selección</h5></li>');
	for(j=0; j<i; j++){	
		$('#total').val(parseFloat($('#total').val()) + parseFloat(Solicitud[j].monto));		
		cadena = '<i class="material-icons red circle tooltipped waves-effect waves-light"';
		cadena += ' onclick="eliminarR(' + j + ')" title="Eliminar Pedido">delete</i>';		
		cadena += '<span class="title">' + Solicitud[j].concepto;
		cadena += '</sapn><p>' + Solicitud[j].nombre;		
		cadena += '<br>MONTO: ' + Solicitud[j].monto + '</p>';		
		$('#dtReembolso').append('<li class="collection-item avatar" id="' + j + '">' + cadena + '</li>');
	}	
	$('#htotal').html('Total ' + $('#total').val() + ' Bs.');
}

/**
* Iniciar elementos en cero
*
* @return mixed
*/
function iniciarElementos(){
	$('#monto').val('0,00');
	$('#concepto').val("0");
	$('select').material_select();
}

/**
* Enviar un mensaje por pantalla en caso de ir atras o al adjuntar documentos
*
* @return mixed
*/
function mensaje(codigo, tipo){
	if(tipo == 0){
		if(i > 0){
			$("#msj").html('Tiene productos seleccionados, ¿Desea omitirlos e ir atras?');
			cadena = '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat "' +  
				'onclick="atras()">Si<i class="material-icons left green-text">check_circle</i></a>' +
				'<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No<i class="material-icons left red-text">cancel</i></a>';	
		}else{
			atras();
			return true;
		}		
	}else{
		$("#msj").html('¿Está seguro que sus datos son correctos?, una vez realizada la solicitud no podrá realizar cambios');
		cadena = '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat "' +  
		'onclick="salvarR(\'' + codigo + '\')">Si<i class="material-icons left green-text">check_circle</i></a><a href="#!" class="modal-action ' + 
		'modal-close waves-effect waves-green btn-flat">No<i class="material-icons left red-text">cancel</i></a>';
	}	
	$("#acciones").html(cadena);
	$('#modal1').openModal();
}

/**
* Mensaje en el caso de que un concepto exceda su limite
*
* @return mixed
*/
function msjMaximo(){
	$("#msj").html(pubMsj);
	$("#acciones").html('<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>');
	$('#modal1').openModal();
	return true;
}
/**
* volver a la pagina anterior
*
* @return mixed
*/
function atras(){	
	bPreguntar = false;
	$(location).attr('href', sUrlP + "bienestar/1");	
}

/**
* volver a la pagina anterior
*
* @return mixed
*/
function salvarR(codigo){
	var Reembolso = {};
	Reembolso['Solicitud'] = Solicitud;
	Reembolso['Codigo'] = codigo;
	Reembolso['banco'] = $('#banco option:selected').text();
	if(i > 0){
		$.post( sUrlP + "salvarReembolso/", Reembolso)
			.done(function(data) {			
				Materialize.toast(data, 3000, 'rounded');
				$(location).attr('href', sUrlP + "adjuntos/" + codigo + "/" + 1);	
			})
			.fail(function(jqXHR, textStatus) {
		    	alert(jqXHR.responseText);
		});		
	}else{
		Materialize.toast('Debe seleccionar al menos un concepto', 5000);
	}
}

function eliminarR(id){		
	pos = parseInt(id) - 1;	
	$('#' + id).remove();
	Solicitud.splice(id,1);
	i--;
	crearElementos();
	Materialize.toast('Se ha eliminado un elemento de la lista', 4000, 'rounded');	
}