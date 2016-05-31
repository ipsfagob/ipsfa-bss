

function solicitarCita(){
	bPreguntar = false;
	id = $("#id").val();
	Materialize.toast('Su cita ha sido creada...!', 5000);
	$(location).attr('href', sUrlP + "generarCita/" + id);	
}


/**
* Listar los Medicamentos de un tratamiento
*
* @access public
* @return mixed
*/
function listarKitDetalle(){
	var datos = {};
	datos['diag'] = $("#patologia option:selected").val();
	datos['id'] = $("#id").val();
	$("#diagnostico").val($("#patologia option:selected").text());
	$('#load').show();

	$.getJSON(sUrlP + "listarKitDetalle/", datos, function(data) {
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
	$('#load').hide();
}