

function solicitarCita(){
	Materialize.toast('Su cita ha sido creado...!', 5000, 'rounded');
	$(location).attr('href', sUrlP + "generarCita");	
}

function adjuntar(){
	$(location).attr('href', sUrlP + "adjuntarProlongado");
}