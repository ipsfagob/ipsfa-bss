function imprimirHoja(){
	

	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];

	if(file == undefined){
		Materialize.toast('Debe asegurarse de cargar todos los archivos', 3000);
	}else{	
		$('#msg').openModal();
		codigo = $("#codigo").val();
		url = $("#url").val();
			
		$("#frmSolicitud").submit();
		window.open( sUrlP + "imprimirHoja/" + codigo + "/" + url , "Reporte" , "width=900,height=600");

	}
}

