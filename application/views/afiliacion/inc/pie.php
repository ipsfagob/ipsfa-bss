


<!--Import jQuery before materialize.js-->
<?php 
    $this->load->view("js/rutas.js.php");
?> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/price_format.2.0.min.js"></script>


<script type="text/javascript">

	var bPreguntar = true;	 
	$( window ).on('beforeunload', function() {
	 	if (bPreguntar)return 'Bienestar y Seguridad Social';
	});

    $(document).ready(function(){
    	$('.tooltipped').tooltip({delay: 10});
		$('.materialboxed').materialbox();
  		$('select').material_select();  
		
  		$("input").keyup( function() {
	        var value = $(this).val();
	        $(this).val(value.toUpperCase());
	    });
	    $("textarea").keyup( function() {
	        var pos_act = $(this).scrollTop();
	        var value = $(this).val();
	        $(this).val(value.toUpperCase());
	        $(this).scrollTop(pos_act);
	    });

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
	    	format: 'yyyy/mm/dd',
	    	formatSubmit: 'yyyy/mm/dd',
	    	min: new Date(1910,01,01),
	  		max: new Date(2016,12,31)
	  	});
		
		$('.dropdown-panel').dropdown({
			inDuration: 400,
			outDuration: 225,
			constrain_width: false, // Does not change width of dropdown to that of the activator
			hover: true, // Activate on hover
			gutter: 0, // Spacing from edge
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'left' // Displays dropdown with edge aligned to the left of button
			}
		);

    	$(".sidebar-collapse").sideNav({
	      menuWidth: 300, // Default is 240
	      edge: 'left', // Choose the horizontal origin
	      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	    });
    	  
    	$("#search").keypress(function(event) {
    		if (event.which == 13) {
    			listarProductos($("#search").val());
    			$("#search").val('');
    		}
    	  });

    	$('.modal-trigger').leanModal();
    	
    	$('.datepicker').pickadate({
	    	selectMonths: true, // Creates a dropdown to control month
	    	selectYears: 15 // Creates a dropdown of 15 years to control year
	  	});


	  	//$('textarea#direccion').characterCounter();

	  	$('#monto').priceFormat({
		    prefix: '',
		    thousandsSeparator: ''
		});
		
	  	$('a').click(function (e){
			 bPreguntar = false;
		});	  	
      	
		$('form').submit(function (){
			 bPreguntar = false;
		});	
		    	 
      });

    function cancel(){
    	bPreguntar = false;
    }

	function cargando(){
		$("#cargando").show();
	}

   
	function readURL(input, id, tipo) {
	   	var archivo = input.files[0];      	
      	bFile = 0;
      	if(archivo.size < 1000000){
	        if (input.files && input.files[0]) {
	        	if (!archivo.type.match('pdf') && !archivo.type.match(/image.*/)) {
	        		Materialize.toast('El archivo no posee el formato', 3000);
	        		limpiarObjetos(input, id);
	        		return false;
	        	}
	        	$("#load" + id).show();
	            var reader = new FileReader();
	            reader.onload = function (e) {
	            	if(tipo == 'pdf'){	            		
	            		$('#view-' + id).html('<object type="application/pdf" data= "'+ e.target.result + '" #toolbar=0&amp;navpanes=0&amp;scrollbar=0" width="200" height="100">');
	            	}else{
	                	$('#pre-view-' + id).attr('src', e.target.result);
	            	}
	            	bFile = 1;
	            };	         
			    reader.readAsDataURL(input.files[0]);	            
			    $("#load" + id).hide();			   
	        }
	    }else{    	
			limpiarObjetos(input, id);
	    	Materialize.toast('No se puede subir un archivo mayor a 1 MB', 3000);
	    }
    }
    
    function limpiarObjetos(input, id){
    	input.value = "";
    	$('#view-' + id).html('<img style="width: 190px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-' + id + '" />');
    }

    function irPanel(){
    	bPreguntar = false;
    	$(location).attr('href', sUrlP + "index");
    }
    function irAtras() {
    	bPreguntar = false;
	    window.history.back();
	}

	function validar(){
		var inputFileImage = document.getElementById("inputFile[1]");
		var file = inputFileImage.files[0];
		if(file == undefined){
			form.submit = false;
		}
	}


      
    </script>
    
</main>
<footer class="page-footer" style="background-color:#00345A">
	<div class="container white-text">
		© 2016 Ipsfa en linea
	</div>	
</footer>

</body>
</html>
