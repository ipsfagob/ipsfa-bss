


<!--Import jQuery before materialize.js-->
<?php 
    $this->load->view("js/rutas.js.php");
?> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/price_format.2.0.min.js"></script>

<script type="text/javascript">

	

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


      	

	    

	});

	 function readURL(input, id, tipo) {
	 	div = '<div class="preloader-wrapper small active"><div class="spinner-layer spinner-green-only">';
	 	div += '<div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div>';
      	div += '</div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	if(tipo == 'pdf'){
            		$('#view-' + id).html('<p>Cargando...</p>');
            		$('#view-' + id).html('<object type="application/pdf" data= "'+ e.target.result + '" #toolbar=0&amp;navpanes=0&amp;scrollbar=0" width="200" height="100">');

            	}else{

                	$('#pre-view-' + id).attr('src', e.target.result);
            	}
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function irPanel(){
    	$(location).attr('href', sUrlP + "index");
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
