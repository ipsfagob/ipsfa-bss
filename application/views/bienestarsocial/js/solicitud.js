function imprimirHoja(){
	codigo = $("#codigo").val();
	url = $("#url").val();
	window.open( sUrlP + "imprimirHoja/" + codigo + "/" + url , "Reporte" , "width=900,height=600");
}

