


function Iniciar(){
	alert('Fine');
	$('#modal1').openModal();
}

/**
* Reportar Anomalias en los campos a DB
* @return Anomalia
*/
function Salvar(){
	var bool = false;
	var Anomalia = new Object();
	
	CargarCheckBox();
	Reportar = $( "body" ).data( "Reportar");

	$.each(Reportar, function(indice, valor){
		if(valor == true) {
			bool = true;
			Anomalia[indice] = valor;
		}
	});

	if(bool == true){
		$.post( sUrlP + "SalvarAnomalia/", Anomalia)
	  		.done(function(data) {
	    		alert( data );
	  		})
	  		.fail(function() {
			    alert( "error" );
			});	
	}	
}

function CargarCheckBox(){
	$("body").data("Reportar", {
			"nombre" : $('#chNombre').prop('checked'), 
			"sexo" : $('#chSexo').prop('checked'),
			"fecha" : $('#chFecha').prop('checked'),
			"componente" : $('#chComponente').prop('checked'),
			"rango" : $('#chRango').prop('checked')
		});
}

function Cancenlar(){
	
}

