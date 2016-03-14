/**
* Validar Usuario del sistema
* @return location
*/

var sUrl = 'http://' + window.location.hostname + '/ipsfa-bss';
var sUrlP = sUrl + '/index.php/Login/';

$(document).ready(function(){
	$('.tooltipped').tooltip({delay: 10});
	$('select').material_select(); 

	$('.datepicker').pickadate({
		// Strings and translations
		monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
		weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
		showMonthsShort: undefined,
		showWeekdaysFull: undefined,

		// Buttons
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Aceptar',
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 90, // Creates a dropdown of 15 years to control year
    	format: 'dd/mm/yyyy',
    	formatSubmit: 'yyyy/mm/dd',
    	min: new Date(1910,01,01),
  		max: new Date(2016,12,31)
  	});
});

function validarUsuario(){	
	
}