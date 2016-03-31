


<!--Import jQuery before materialize.js-->
<?php 
    $this->load->view("js/rutas.js.php");
?> 
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/price_format.2.0.min.js"></script>


<script type="text/javascript">

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
		    centsSeparator: ',',
    		thousandsSeparator: '.'
		});


      



    $(window).load(function(){

    function readURL(input) {
        if (input.files && input.files[0]) {
	            var reader = new FileReader();
				
	            reader.onload = function (e) {
	               
				   var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
				   var fileExtension2 = ['pdf'];
				  
				   //alert($(input).val().split('.').pop().toLowerCase());
					
					if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == 1) {
						$('#pre-view-1').html('<img src="'+ e.target.result + '" width="108px" height="97px" />');
					}
					
					
					if ($(input).val().split('.').pop().toLowerCase() == "pdf") {
						
						//$('#image_upload_preview').html('<iframe src="'+ e.target.result + '" width="100" height="100" >your</iframe>');
						$('#pre-view-1').html('<object type="application/pdf" data= "'+ e.target.result + '" #toolbar=0&amp;navpanes=0&amp;scrollbar=0" width="200" height="100">');
					}
					
					
			   }
				
	            reader.readAsDataURL(input.files[0]);
	        }
	    }

	    $("#bdd_copia_carmil").change(function () {
	        readURL(this);
	    });

	});

    </script>
</main>
<footer class="page-footer" style="background-color:#00345A">
	<div class="container white-text">
		
		© 2016 IpsfaNet
	</div>	
</footer>

</body>
</html>
