/**
*
*
*/
var Solicitud = [];
var i = 0;


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

	if(monto == "0.00" || concepto == "0"){
		Materialize.toast("Debe introducir un monto o seleccionar un concepto", 3000, 'rounded');
		iniciarElementos();
	}else{
		$('#total').val(parseFloat($('#total').val()) + parseFloat($('#monto').val()));
		var linea = $('#concepto option:selected').text() + '|' + $('#monto').val();		

		var arr = familiar.split('|');
		
		Pedido['codigo'] = arr[0];
		Pedido['parentesco'] = arr[1];
		Pedido['nombre'] = $('#familiar option:selected').text();
		Pedido['concepto'] = $('#concepto option:selected').text();
		Pedido['monto'] = $('#monto').val();
		Solicitud[i++] = Pedido;
		$('#htotal').html('Total ' + $('#total').val() + ' Bs.');
		
		cadena = '<i class="material-icons red circle tooltipped waves-effect waves-light"' + 
		' onclick="eliminarR(' + i + ')" title="Eliminar Pedido">delete</i>';
		cadena += '<span class="title">' + $('#concepto option:selected').text();
		cadena += '</sapn><p>' + $('#familiar option:selected').text() ;
		cadena += '<br>MONTO: ' + $('#monto').val() + '</p>';
		
		$('#dtReembolso').append('<li class="collection-item avatar" id="' + i + '">' + cadena + '</li>');
		iniciarElementos();
	}
}

/**
* Iniciar elementos en cero
*
* @return mixed
*/
function iniciarElementos(){
	$('#monto').val('0.00');
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
	$('#' + id).remove();
	pos = parseInt(id) - 1;
	Solicitud.splice(pos,1);
	i--;
	Materialize.toast('Se ha eliminado un elemento de la lista', 4000, 'rounded');
}