var pieData = [
				{
					value: 10,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Atendidos"
				},
				{
					value: 5,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Pendientes"
				},
				{
					value: 8,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Procesando"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				}

			];


var options = {
    segmentShowStroke: false,
    animateRotate: true,
    animateScale: false,
    percentageInnerCutout: 50,
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
}



window.onload = function(){
	var ctx = document.getElementById("myChart").getContext("2d");
	var myPie = new Chart(ctx).Pie(pieData, options);
	 document.getElementById('js-legend').innerHTML = myPie.generateLegend();
};