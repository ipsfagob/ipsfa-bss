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
	$('#modal1').closeModal();
	$('#msg').openModal();

	
	cod = $("#codigo").val();
	cor = $("#mail").val();
	nom = $("#nombre").val();
	tip = $("#tipo").val();
	con = $("#contenido").val();	
	data = {"codigo": cod, "correo": cor, "nombre": nom, "tipo": tip, "contenido" : con};	

	$.getJSON(sUrlP + "notificarBadan/", data)
	 .done(function(data) {
		
	 	Materialize.toast("Su notificación ha sido enviada.", 5000);
	 	$('#msg').closeModal();

	}).fail(function(jqXHR, textStatus) {
		//alert(jqXHR.responseText);
		Materialize.toast("Falla en el servidor de correo Intente mas tarde.", 5000);
		$('#msg').closeModal();
	});
	
	
}