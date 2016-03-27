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
function agregarA(){
	var Pedido = {};
	var familiar = $('#familiar').val();
	var concepto = $('#concepto').val();
	var monto = $('#monto').val();
	monto = monto.replace(/\./g,'').replace(',','.');
	if($('#monto').val() == "0,00" || concepto == "0"){
		Materialize.toast("Debe introducir un monto o seleccionar un concepto", 3000, 'rounded');
		iniciarElementos();
	}else {		
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
	}
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
			$("#msj").html('Tiene productos seleccionados, ¿Desea eliminarlos e ir atras?');
			cadena = '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat "' +  
				'onclick="atras()">Si</a><a href="#!" class="modal-action ' + 
				'modal-close waves-effect waves-green btn-flat">No</a>';	
		}else{
			atras();
			return true;
		}		
	}else{
		$("#msj").html('¿Está seguro que sus datos son correctos?, una vez realizada la solicitud no podrá realizar cambios');
		cadena = '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat "' +  
		'onclick="salvarA(\'' + codigo + '\')">Si</a><a href="#!" class="modal-action ' + 
		'modal-close waves-effect waves-green btn-flat">No</a>';
	}
	
	$("#acciones").html(cadena);
	$('#modal1').openModal();
}

/**
* volver a la pagina anterior
*
* @return mixed
*/
function atras(){	
	$(location).attr('href', sUrlP + "bienestar/2");
}

function salvarA(codigo){
	var Reembolso = {};
	Reembolso['Solicitud'] = Solicitud;
	Reembolso['Codigo'] = codigo;

	$.post( sUrlP + "salvarApoyo/", Reembolso)
		.done(function(data) {			
			Materialize.toast(data, 3000, 'rounded');
			$(location).attr('href', sUrlP + "adjuntos/" + codigo + "/" + 2);	
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});		
}

function eliminarR(id){		
	pos = parseInt(id) - 1;	
	$('#' + id).remove();
	Solicitud.splice(id,1);
	i--;
	crearElementos();
	Materialize.toast('Se ha eliminado un elemento de la lista', 4000, 'rounded');	
}