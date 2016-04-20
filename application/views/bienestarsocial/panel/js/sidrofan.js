
function listarProductos1(val) {
	getRecords();
}

/**
*<a href="javascript:Modal(\'' + val.obse + '\',\'' + val.nomb + '\',\'' + val.imag +	'\',\'' + val.oid + '\');"' +
			'class="secondary-content btn-floating btn-small waves-effect waves-light modal-trigger" style="background-color:#00345A"><i class="mdi-action-add-shopping-cart"></i></a>
*/
function listarProductos(val) {
	$.getJSON(sUrlP + "listarMedicamentosSidroFan/" + val, function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			Materialize.toast("Disculpe el medicamento seleccionado no se encuentra disponible", 5000);
		}else{
			$.each(data, function(key, val) {
				cadena = '<li class="collection-item avatar "><span class="email-title"><b>' + val.nomb + 
				'</b><br><font color="#00345A">UBICACION DROGUERIA / FARMACIA</font><BR>EXISTENCIA: AGOTADA';
				$(".collection").append(cadena);
			});
		}
		
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}

