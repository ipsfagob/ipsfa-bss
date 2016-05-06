
function listarProductos1(val) {
	getRecords();
}

/**
*<a href="javascript:Modal(\'' + val.obse + '\',\'' + val.nomb + '\',\'' + val.imag +	'\',\'' + val.oid + '\');"' +
			'class="secondary-content btn-floating btn-small waves-effect waves-light modal-trigger" style="background-color:#00345A"><i class="mdi-action-add-shopping-cart"></i></a>
*/
function consultar(val) {
	$.getJSON(sUrlP + "listarMedicamentosSidroFan/" + val, function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			Materialize.toast("Disculpe el medicamento seleccionado no se encuentra disponible", 5000);
		}else{

			$.each(data, function(key, val) {
				cantidad = val.StockQuantity - (val.StockQuantity * 0.1);
				cantidad = parseFloat(cantidad).toFixed(0);
				if (cantidad <= 1) cantidad = 0

				cadena = '<li class="collection-item avatar"><span class="email-title"><b>' + val.ProductName +
				'</b><br>PRESENTACION: ' + val.Presentation  + '<br>' +
				'CONCENTRACION: ' + val.Concentration  + '<br>' +
				'<font color="#00345A">' + val.LocationAddress + '</font><BR>EXISTENCIA: ' + 
				existe(cantidad) + '<br><b>CANTIDAD: ' + cantidad + '</b>';
				$("#consulta").append(cadena);
			});
		}
		
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}


					


function existe(cant){
	sCant = '<font color="red"><b>AGOTADA</b></font>';
	if (cant > 10) sCant = '<font color="green"><b>DISPONIBLE</b></font>'
	return sCant;
}


