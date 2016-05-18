

/**
* Reportar Anomalias en los campos a DB
*
* @access public
* @return mixed
*/
function Notificar(){

	if($('#requerimiento').val() != ''){
		$.getJSON( sUrlP + "notificar", {oid: $('#oid').val(), req: $('#requerimiento').val()})
		 .done(function(data) {			
			$('#modal1').openModal();
			$('#requerimiento').val('');
		})
		 .fail(function(jqXHR, textStatus) {
			console.log(jqXHR.responseText);
		});	

	}else{
		Materialize.toast("Debe introducir su requerimiento", 5000);
	}
	
}

