function imprimirHoja(){
	

	var inputFileImage = document.getElementById("inputFile[1]");
	var file = inputFileImage.files[0];

	if(file == undefined){
		Materialize.toast('Debe asegurarse de cargar todos los archivos', 3000);
	}else{	
		if(file.size < 1000000) {
			$('#msg').openModal();
			codigo = $("#codigo").val();
			url = $("#url").val();
				
			$("#frmSolicitud").submit();
			window.open( sUrlP + "imprimirHoja/" + codigo + "/" + url , "Reporte" , "width=900,height=600,scrollbars=yes");
		}else{
			Materialize.toast('No se puede subir un archivo mayor a 1 MB', 3000);
		}
	}
}

