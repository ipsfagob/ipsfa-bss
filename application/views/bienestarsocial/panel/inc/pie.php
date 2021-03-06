

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
		
		$('.dropdown-button').dropdown({
			inDuration: 400,
			outDuration: 225,
			constrain_width: false, // Does not change width of dropdown to that of the activator
			hover: false, // Activate on hover
			gutter: 0, // Spacing from edge
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'right' // Displays dropdown with edge aligned to the left of button
			}
		);

		$('.dropdown-panel').dropdown({
			inDuration: 400,
			outDuration: 225,
			constrain_width: false, // Does not change width of dropdown to that of the activator
			hover: true, // Activate on hover
			gutter: 0, // Spacing from edge
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'right' // Displays dropdown with edge aligned to the left of button
			}
		);

	  $(".button-collapse").sideNav();
    	$(".sidebar-collapse").sideNav({
	      menuWidth: 300, // Default is 240
	      edge: 'left', // Choose the horizontal origin
	      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	    });
    	  
    	

    	$('.modal-trigger').leanModal();
    	
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
	    	selectYears: 10, // Creates a dropdown of 15 years to control year
	    	format: 'yyyy/mm/dd',
	    	formatSubmit: 'yyyy/mm/dd'
  		});

	  	//$('textarea#direccion').characterCounter();

	  	$('#monto').priceFormat({
		    prefix: '',
		    centsSeparator: ',',
    		thousandsSeparator: '.'
		});

		$("#search").keypress(function(event) {
    		if (event.which == 13) {
    			
    			consultar($("#search").val());
    			$("#search").val('');
    		}
    	  });
		$('.materialboxed').materialbox();
		    	 
      });
      
    function irAtras() {
    	bPreguntar = false;
	    window.history.back();
	}
    </script>
</main>
<footer class="page-footer" style="background-color:#00345A">
	<div class="container white-text">		
		© 2016 Ipsfa en linea<br>
	</div>	
</footer>

</body>
</html>
