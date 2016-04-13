
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
function cancelarCita(){
	codigo = $("#codigo").val();
	
	correo = $("#corr" + codigo).val();
	
	nombre = $("#nomb" + codigo).val();

	$.post( sUrlP + "reportarCitaTratamiento/", {cod: codigo, corr: correo, nomb: nombre})
		.done(function(data) {			

			Materialize.toast(data, 3000, 'rounded');
			$(location).attr('href', sUrlP + "tratamiento");	
		})
		.fail(function(jqXHR, textStatus) {
	    	alert(jqXHR.responseText);
	});	
}

