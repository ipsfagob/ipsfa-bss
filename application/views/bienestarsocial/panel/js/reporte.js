
var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Recibidos IPSFA"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "En Proceso"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Aceptados"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "En Fina"
				}

			];

$(document).ready(function(){
		var $input = $('#desde').pickadate();
		var pickerd = $input.pickadate('picker');

		var $inputs = $('#hasta').pickadate();
		var pickerh = $inputs.pickadate('picker');

		pickerd.on({
			set: function(context) {
				var fecha = new Date($('#desde').val());
				pickerh.clear();
				pickerh.set('min', fecha);
			},
  		});



});

function generar(){
	if (validar() == 1){
		var tip = $("#modulo option:selected").val();
		var est = $("#estatus option:selected").val();
		var des = $("#desde").val();
		var has = $("#hasta").val();
		var valor = 0;
		dtSource = {tipo: tip, estatus: est, desde: des, hasta : has};
		$.getJSON(sUrlP + "consultaGeneral/", dtSource)
		 .done(function(data) {
			var cadena = '<table class="striped bordered"><tr><th>CEDULA</th><th>AFILIADO</th><th>CODIGO</th><th>FECHA</th></tr>';
			$("#estadistica").html('');
			$("#reporte").html('');		
			if(data != ""){
				$.each(data, function(key, val) {			
					cadena += '<tr><td>' + val.cedu + '</td><td>' + val.nomb + '</td><td>' + val.numero + '</td><td>' + val.fcita + '</td></tr>';			
				});
			}else{
				Materialize.toast("No se encontraron registros", 3000, 'rounded');
			}
			cadena += '</table>';
			$("#legend").html('<h5 style="text-transform: uppercase;"><i class="material-icons left small green-text text-lighten-2">print</i>Listado de ' + $("#modulo option:selected").text() + ' en: ' + 
			$("#estatus option:selected").text() + '</h5>');

			$("#reporte").append(cadena);
			
		}).fail(function(jqXHR, textStatus) {
			alert(jqXHR.responseText);
		});
	}else{
		Materialize.toast("Los campos de desde y hasta son obligatorios", 3000);
	}
}

function estadistica(){
	if (validar() == 1){
		var tip = $("#modulo option:selected").val();
		var des = $("#desde").val();
		var has = $("#hasta").val();
		var valor = 0;
		dtSource = {tipo: tip, desde: des, hasta : has};
		


		$("#estadistica").html('');
		$("#reporte").html('');
		$.getJSON(sUrlP + "consultaEstadisticas/", dtSource)
		 .done(function(data) {
			if(data != ""){
				cadena = '<ul>';
				$.each(data, function(key, val) {			
					cadena += '<li><a href="#"><i class="material-icons tiny left" style="color:' 
					+ val.color + ' ">donut_large</i> <span>'+ val.value + ' ' + val.label + '</span></a></li>';			
				});
				cadena += "</ul>";
				$("#estadistica").html('<canvas id="myChart"  width="300" height="300"/>');	
				var ctx = document.getElementById("myChart").getContext("2d");
				myPie = new Chart(ctx).Pie(data); //myPie.generateLegend()
				$("#legend").html(cadena);
			}else{
				Materialize.toast("No se encontraron registros", 3000, 'rounded');
			}
			
			
		}).fail(function(jqXHR, textStatus) {
			alert(jqXHR.responseText);
		});

	}else{
		Materialize.toast("Los campos de desde y hasta son obligatorios", 3000);
	}
}

function validar(){
	res = 1;
	if($("#desde").val() == '' || $("#hasta").val() == ''){
		res = 0;
	}
	return res;
}


function imprimir(){

    var mywindow = window.open('', 'my div', 'height=400,width=600');
    mywindow.document.write('<html><head><title>Imprimir</title>');
    mywindow.document.write('<script type="text/javascript" src="' + sUrl + 'public/js/char.js"></script>');
    mywindow.document.write('</head><body >');
    mywindow.document.write($("#imprimir").html());
    mywindow.document.write('</body></html>');

    //mywindow.document.close(); // necessary for IE >= 10
    mywindow.open();
    mywindow.focus(); // necessary for IE >= 10

    //mywindow.print();
    //mywindow.close();

    return true;
}
