
var sEnlace = '';
var sDesc = '';

/**
*<a href="javascript:Modal(\'' + val.obse + '\',\'' + val.nomb + '\',\'' + val.imag +	'\',\'' + val.oid + '\');"' +
			'class="secondary-content btn-floating btn-small waves-effect waves-light modal-trigger" style="background-color:#00345A"><i class="mdi-action-add-shopping-cart"></i></a>
*/
function listarProductos(val) {
	ruta = sUrlP + "listarMedicamentos" + sEnlace + "/" + val;
	$.getJSON(ruta, function(data) {
		var cadena = '';
		$(".collection-item").remove();
		if(data == ""){
			Materialize.toast("Disculpe el medicamento seleccionado no se encuentra disponible", 5000);
		}else{
			if(sEnlace != 'SidroFan'){
				$.each(data, function(key, val) {
					cadena = '<li class="collection-item avatar"><span class="email-title"><b>' + val.nomb + 
					'</b><br><font color="#00345A">' + sDesc + '</font><BR>EXISTENCIA: ' + existe(val.cant);
					$("#consulta").append(cadena);
				});
			}else{
				$.each(data, function(key, val) {
					cadena = '<li class="collection-item avatar"><span class="email-title"><b>' + val.ProductName + 
					'</b><br><font color="#00345A">' + val.LocationAddress + '</font><BR>EXISTENCIA: ' + existe(val.StockQuantity);
					$("#consulta").append(cadena);
				});
			}
		}
		
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		//alert(jqXHR.responseText);
		//alert('API sin conexión actualmente');
		Materialize.toast("Disculpe actualmente no se logro establecer conexión con " + sEnlace, 5000);
	});
}

function existe(cant){
	sCant = '<font color="red"><b>AGOTADA</b></font>';
	if (cant != 0) sCant = '<font color="green"><b>DISPONIBLE</b></fon>'
	return sCant;
}

function consultar(id, desc){
	$('#buscador').show();
	$('#search').attr("placeholder", 'Buscar en ' + desc);
	$('#mnuFarmacias').hide();
	$('#cancel').show();
	$(".collection-item").remove();
	$("#search").focus();
	sEnlace = id;
	sDesc = desc;
}

function cancelar(){
	$('#buscador').hide();
	$('#cancel').hide();
	$('#mnuFarmacias').show();
	$(".collection-item").remove();
}

