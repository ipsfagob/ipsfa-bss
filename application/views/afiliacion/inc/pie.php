


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/price_format.2.0.min.js"></script>


<script type="text/javascript">
    var sUrl = 'http://' + window.location.hostname + '/ipsfa-bss';
	var sUrlP = sUrl + '/index.php/BienestarSocial/';

    $(document).ready(function(){

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
		    thousandsSeparator: ''
		});

		    	 
      });
      
    </script>
</main>
<footer class="page-footer" style="background-color:#00345A">
	<div class="container white-text">
		© 2016 MamonSoft C.A
	</div>	
</footer>

</body>
</html>
