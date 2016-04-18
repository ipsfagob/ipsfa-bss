function cancel(id){
	
	$('#' + id).closeModal();
}

function setMedicamento(id, tip){
	correo = $("#corr" +id).val();
	nombre = $("#nomb" +id).val();
	$("#mail").val(correo);
	$("#codigo").val(id);
	$("#nombre").val(nombre);
	$("#tipo").val(tip);
	$("#contenido").val("");	
	$("#titulo").html(nombre);

}

function notificar(){
	cod = $("#codigo").val();
	cor = $("#mail").val();
	nom = $("#nombre").val();
	tip = $("#tipo").val();
	con = $("#contenido").val();	
	data = {"codigo": cod, "correo": cor, "nombre": nom, "tipo": tip, "contenido" : con};
	$('#modal1').closeModal();
	
	$.getJSON(sUrlP + "notificarBadan/", data)
	 .done(function(data) {
		
	 	Materialize.toast("Su notificación ha sido enviada.", 5000);

	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
	
}