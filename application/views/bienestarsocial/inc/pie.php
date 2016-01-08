


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="/ipsfa-dg/public/js/jquery-2.min.js"></script>
<script type="text/javascript"
	src="/ipsfa-dg/public/js/materialize.min.js"></script>

<script type="text/javascript">
      
    $(document).ready(function(){
    	  
		$('.materialboxed').materialbox();
		$('.dropdown-button').dropdown({
			inDuration: 400,
			outDuration: 225,
			constrain_width: false, // Does not change width of dropdown to that of the activator
			hover: false, // Activate on hover
			gutter: 0, // Spacing from edge
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'left' // Displays dropdown with edge aligned to the left of button
			}
		);

    	$(".button-collapse").sideNav({
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

    	  	 
      });
      
    </script>
</main>
<footer class="page-footer blue">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Primera versión</h5>
				<p class="grey-text text-lighten-4">Enfocados en la atención en pro
					de la automatización a fines de lograr una digitalización.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Enlaces de interes</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Mi Casa bien
							Equipada</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Instuto
							Venezolano de los Seguros Sociales</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2016 MamonSoft<a class="grey-text text-lighten-4 right"
				href="http://www.mamonsoft.com.ve">http://www.mamonsoft.com.ve</a>
		</div>
	</div>
</footer>

</body>
</html>
