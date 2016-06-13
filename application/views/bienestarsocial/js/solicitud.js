function imprimirHoja(){
	
	if(validar() == true){
		codigo = $("#codigo").val();
		url = $("#url").val();	
		$("#frmSolicitud").submit();
		
		//window.open( sUrlP + "imprimirHoja/" + codigo + "/" + url , "Reporte" , "width=900,height=600,scrollbars=yes");
	}
}

