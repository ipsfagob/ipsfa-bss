


<!--Import jQuery before materialize.js-->
<?php 
    $this->load->view("js/rutas.js.php");
?> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/price_format.2.0.min.js"></script>

<script type="text/javascript">
	var bFile = 0;
	var bPreguntar = true;	 
	$( window ).on('beforeunload', function() {
	 	if (bPreguntar)return 'Bienestar y Seguridad Social';
	});

    $(document).ready(function(){


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

    	$('.tooltipped').tooltip({delay: 10});
		$('.materialboxed').materialbox();
  		$('select').material_select();  
		
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
		    centsSeparator: ',',
    		thousandsSeparator: '.'
		});

		$('a').click(function (e){
			 bPreguntar = false;
		});	  	
      	
		$('form').submit(function (){
			 bPreguntar = false;
		});	 
	    

	});

	function cargando(){
		$("#cargando").show();
	}

    function cancel(){
    	bPreguntar = false;
    }
    
	function readURL(input, id, tipo) {
	   	var archivo = input.files[0];      	
      	bFile = 0;
      	if(tipo != 'pdf'){	
      		type = 'image.*';
      	}else{
      		type = 'pdf.*';
      	}
      	if(archivo.size < 1000000){
	        if (input.files && input.files[0]) {
	        	if (!archivo.type.match(type)) {
	        		Materialize.toast('El formato de archivo debe ser: (' + type + ')', 3000);
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
    	$('#view-' + id).html('<img style="width: 140px;height: 140px; margin-left: 0px" class="file-path-wrapper-pre-view" id="pre-view-' + id + '" />');
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
		cargando();
		var result = true;
		var sAux = '';
		var frm = document.getElementById("frmData");
		for (i=0;i<frm.elements.length;i++){
			if(frm.elements[i].type == 'file'){
				var inputFileImage = document.getElementById(frm.elements[i].id);
				var file = inputFileImage.files[0];
				if(file == undefined){
					$("#cargando").hide();
					//Materialize.toast('Debe cargar el documento nombre: ' + frm.elements[i].name + ' para continuar', 3000);
					result = false;
					//form.submit = false;
				}
				
			}
			sAux = '';
		}
		if(result == true){
			$("#btnEnviarDoc").hide();
			$("#btnAnterior").hide();			
			$('#frmData').submit();
		} else {
			$("#btnAnterior").show();
			$("#btnEnviarDoc").show();
			Materialize.toast('Debe cargar cada uno de los documentos', 3000);
		}

		return result;
		/**
		$.each(files, function(index, file) {
			console.log(file);
		});
		**/
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
