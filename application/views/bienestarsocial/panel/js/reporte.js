
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
			var cadena = '<table class="striped bordered"><tr><th>CEDULA</th><th>AFILIADO</th><th>FECHA</th></tr>';
			$("#reporte").html('');		
			if(data != ""){
				$.each(data, function(key, val) {			
					cadena += '<tr><td>' + val.cedu + '</td><td>' + val.nomb + '</td><td>' + val.fcita + '</td></tr>';			
				});
			}else{
				Materialize.toast("No se encontraron registros", 3000, 'rounded');
			}
			cadena += '</table>';
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
		$("#estadistica").html('<canvas id="myChart"  width="300" height="300"/>');	
		var ctx = document.getElementById("myChart").getContext("2d");
		myPie = new Chart(ctx).Pie(pieData);
		$("#js-legend").html(myPie.generateLegend());

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

//

