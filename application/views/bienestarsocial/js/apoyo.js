/**
*
*
*/
var Solicitud = {};
var i = 0;

function agregarA(){
	var Pedido = {};
	var familiar = $('#familiar').val();
	var concepto = $('#concepto').val();
	var monto = $('#monto').val();

	
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
	cadena = '<i class="material-icons green circle">description</i>';
	cadena += '<span class="title">' + $('#concepto option:selected').text();
	cadena += '</sapn><p>' + $('#familiar option:selected').text() ;
	cadena += '<br>MONTO: ' + $('#monto').val() + '</p>';	
	$('#dtReembolso').append('<li class="collection-item avatar">' + cadena + '</li>');	
}

function salvarA(codigo){
	var Reembolso = {};
	Reembolso['Solicitud'] = Solicitud;
	Reembolso['Codigo'] = codigo;
	$.post( sUrlP + "salvarApoyo/", Reembolso)
		.done(function(data) {			
			Materialize.toast(data, 3000, 'rounded');
			$(location).attr('href', sUrlP + "imprimirHoja/2");			
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});		
}