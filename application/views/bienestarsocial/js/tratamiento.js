

function solicitarCita(){
	Materialize.toast('Su cita ha sido creada...!', 5000, 'rounded');
	$(location).attr('href', sUrlP + "generarCita");	
}

function adjuntar(){
	$(location).attr('href', sUrlP + "adjuntarProlongado");listarKitDetalle
}

/**
* Listar los Medicamentos de un tratamiento
*
* @access public
* @return mixed
*/
function listarKitDetalle(){
	$.getJSON(sUrlP + "listarKitDetalle/" + $("#patologia option:selected").val() , function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			$(".divContenido").html("Disculpe actualmente no posee medicamentos asociados, verifique el caso en SAMAN");
			Materialize.toast("Disculpe actualmente no posee medicamentos asociados, verifique el caso en SAMAN", 5000, 'rounded');
		}else{
			cadena = '<table class="bordered highlight responsive-table"><thead><tr><th>SUMINISTRO</th><th>PRESENTACION</th><th>CANTIDAD</th></tr></thead>';
			$.each(data, function(key, val) {
				cadena += '<tr><td>' + val.nombre + '</td><td>' + val.comercial + '</td><td>' + val.cantidad + '</td></tr>';
			});
			cadena += '</table>';
			$(".divContenido").html(cadena);
		}
		
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}