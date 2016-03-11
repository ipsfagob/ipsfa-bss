/**
* Validar Usuario del sistema
* @return location
*/

var sUrl = 'http://' + window.location.hostname + '/ipsfa-bss';
var sUrlP = sUrl + '/index.php/Panel/';

function validarUsuario(){
	$(location).attr('href', sUrlP + "validarUsuario");
}