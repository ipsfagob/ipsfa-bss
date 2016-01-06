/**
 * @author Carlos Peña
 * @returns true
 */

var sUrl = 'http://' + window.location.hostname + '/ipsfa-bss';
var sUrlP = sUrl + '/index.php/BienestarSocial/';

function listarProductos(val) {
	$.getJSON(sUrlP + "listarProductosPG/" + val, function(data) {
		var cadena = '';
		var items = [];
		$(".collection-item").remove();
		$.each(data, function(key, val) {
			cadena = '<li class="collection-item avatar" onclick="hola();">' + 
			'<img src="' + sUrl +  '/public/img/productos/' + val.imag + '" alt="" class="circle"> <span class="title">' + val.nomb + 
			'</span><p>' + val.obse + '</li>';			
			$(".collection").append(cadena);
		});
	}

	).done(function(msg) {
		//$("#pos").remove();
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}
