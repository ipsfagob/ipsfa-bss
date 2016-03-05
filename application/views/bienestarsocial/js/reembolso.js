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
function agregarR(){
	var Pedido = {};
	var familiar = $('#familiar').val();
	var concepto = $('#concepto').val();
	var monto = $('#monto').val();

	if(monto == "0.00" || concepto == "0"){				
		Materialize.toast("Debe introducir un monto o seleccionar un concepto", 3000, 'rounded');
		iniciarCombos();
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
		iniciarCombos();
	}
}


function iniciarElementos(){
	$('#monto').val('0.00');
	$('#concepto').val("0");
	$('select').material_select();
}

function salvarR(codigo){
	var Reembolso = {};
	Reembolso['Solicitud'] = Solicitud;
	Reembolso['Codigo'] = codigo;

	$.post( sUrlP + "salvarReembolso/", Reembolso)
		.done(function(data) {			
			Materialize.toast(data, 3000, 'rounded');
			$(location).attr('href', sUrlP + "adjuntos/" + codigo + "/" + 1);	
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});		
}

function atras(){
	$(location).attr('href', sUrlP + "bienestar/1");
}

function eliminarR(id){	
	$('#' + id).remove();
	pos = parseInt(id) - 1;
	alert(pos + ' ID: ' + id + ' NOMBRE: ' + Solicitud[pos].nombre);
	Solicitud.splice(pos,1);
	i--;
	Materialize.toast('Se ha eliminado un elemento de la lista', 4000, 'rounded');
}