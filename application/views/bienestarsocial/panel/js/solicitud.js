/**
*
*/
function editarContenido(id ){
	$('#oid').val(id);
	$('#selecciones').openModal();

}

function salvar(){
	var soid = $('#oid').val();
	var scoddoc = $('#coddoc option:selected').val();
	var sfecha = $('#fechaVence').val();
	
	data = {"oid" : soid,  "coddoc" : scoddoc, "fecha" : sfecha };
	$('#f' + soid).text(sfecha);
	$.getJSON(sUrlP + "modificarArchivo/", data)
	 .done(function(msg) {
		Materialize.toast("Modificación exitosa", 5000);
	}).fail(function(jqXHR, textStatus) {
		Materialize.toast("Disculpe error de conexión", 5000);
	});
	limpiar();
}

function limpiar(){
	$('#oid').val('');
	$('#fechaVence').val('');
}


function notificarSolicitud(){
	if($("#nota").val() == "0"){
		Materialize.toast("Disculpe debe seleccionar una respuesta", 5000);
	}else{
		$("#frmData").submit();	
	}
	

}