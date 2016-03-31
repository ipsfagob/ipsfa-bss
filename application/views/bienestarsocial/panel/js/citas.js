
function setValor(cod, id, tipo){
	$("#codigo").val(cod);
	$("#id").val(id);
	$("#tipo").val(tipo);
}


/**
* Salvar una cita
*
* @return mixed
*/
function salvar(tipo){
	$.post( sUrlP + "salvarCita/", {cod: $("#codigo").val(), id: $("#id").val(), tip: tipo})
		.done(function(data) {			
			Materialize.toast(data, 3000, 'rounded');	
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});		
}

