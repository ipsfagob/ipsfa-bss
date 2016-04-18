
var lstImg = {};

/**
*
*
*
*/
function consultar(valor) {
	$.getJSON(sUrlP + "consultarCodigo/" + valor, function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			Materialize.toast("Disculpe el codigo actualmente no se encuentra asignado", 5000, 'rounded');
		}else{
			$.each(data, function(key, val) {
				
				cadena = '<li class="collection-item"><p>SOLICITANTE: '  + val.nomb + 
				'<br><a href="javascript:construirRuta(\'' + valor + '\',\'' + val.tipo + '\');"' +
				'class="green-text ">' +
				'<i class="material-icons right">link</i>' + tipo(val.tipo) + 
				'</a><br>CODIGO: ' + valor  + '</p><div id="detalle"></div>';
				$(".collection").append(cadena);
				listarDoc(valor, val.tipo);

			});
		}
		
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}

function tipo(id){
	caso = '<b>';	
	switch (id){
		case '1': 
			caso += 'REEMBOLSO';
			break;
		case '2': 
			caso += 'APOYO';
			break;
		case '3': 
			caso += 'MEDICAMENTOS';
			break;
		case '4': 
			caso += 'CITA PARA TRATAMIENTO PROLONGADO';
			break;
		case '5': 
			caso += 'ACTUALIZACION DE EXPEDIENTES POR TRATAMIENTO PROLONGADO';
			break;
		default:
			break;
	}
	return caso + '</b>';

}

function listarDoc(cod, tip){
	ruta = sUrlP + "listarDirectorio/" + cod + '/' + tip;
	var cadena = '';
	$.getJSON(ruta, function(data) {
		$.each(data, function(key, val) {
			cadena += '<a target="top" href="' + val.ruta + '">';
			if(val.tipo != "pdf"){
				cadena += '<img class="img-min" src="' + val.ruta + '"  title="' + val.nombre + '" />';	
			}else{
				cadena += '<img class="img-min" src="' + sUrl + 'public/img/fpdf.png" title="' + val.nombre + '" />';
			}
			cadena += '</a>';
		});
		$("#detalle").html( cadena + '<br>');
		
	}

	).done(function(msg) {
		
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});

}

function construirRuta(cod, id){
	url = '';
	switch (id){
		case '1': 
			url += 'solicitudes';
			break;
		case '2': 
			url += 'solicitudes';
			break;
		case '3': 
			url += 'medicamentos';
			break;
		case '4': 
			url += 'citas';
			break;
		case '5': 
			url += 'tratamiento';
			break;
		default:
			break;
	}

	$(location).attr('href', sUrlP + url);	
}