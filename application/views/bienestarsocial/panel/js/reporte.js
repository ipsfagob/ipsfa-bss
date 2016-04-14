
$(document).ready(function(){
		var $input = $('#desde').pickadate();
		var pickerd = $input.pickadate('picker');

		var $inputs = $('#hasta').pickadate();
		var pickerh = $inputs.pickadate('picker');

		pickerd.on({
			set: function(context) {
				var fecha = new Date($('#desde').val());
				pickerh.set('min', fecha);
			},


  		});


});

function consultar(){
	
}

