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
			cadena = '<li class="collection-item avatar">' + 
			'<img src="' + sUrl +  '/public/img/productos/' + val.imag + '" alt="" class="materialboxed circle">' +
			'<span class="title">' + val.nomb + 
			'</span><p>' + val.obse + 
			'<a href="javascript:Modal(\'' + val.nomb + '\',\'' + val.obse + '\',\'' + val.imag +
			'\',\'' + val.oid + '\');"' +
			'class="secondary-content btn-floating btn-small waves-effect waves-light  modal-trigger blue"><i class="mdi-action-add-shopping-cart"></i></a>';		
			$(".collection").append(cadena);

		});
	}

	).done(function(msg) {
		$("#menuprincipal").focus();
	}).fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});
}

/**
*	titutlo, descripcion, imagen, identificador
*/
function Modal(tit, des, img, id){

	$('#Cabecera').html(tit);
	$('#Cuerpo').html(des);
	$('#oid').val(id);
	$('#img').val(img);
	$('#modal1').openModal();
}

function Agregar(){
	$.post(sUrlP + "AgregarProductosCarrito/", {
			id : $('#oid').val(), 
			cantidad: "1", 
			precio: "0.00", 
			nombre: $('#Cuerpo').html(),
			imagen: $('#img').val()
		}
	).done(function (data){		
		$('#modal1').closeModal();
	}).fail(function (data){
		
	});
}

/**
* Limpiar Carrit de Compras
*/
function Eliminar(oid){
	$('#' + oid).remove();
	$.post(sUrlP + "EliminarProductosCarrito/", {
			rowid : oid
		}
	).done(function (data){		
		
	}).fail(function (data){
		
	});
}

