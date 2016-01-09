<?php
$this->load->view ( "bienestarsocial/inc/cabecera.php" );
?>
<script type="text/javascript"
	src="/ipsfa-bss/application/views/bienestarsocial/js/farmacia.js"></script>

<br>

<div class="row">
	<div class="col s12 ">
	<nav>
    <div class="nav-wrapper white ">      
        <div class="input-field col s10">
          <input id="search" type="text" required placeholder='Buscar...' class="grey-text">
          <label for="search"><i class="mdi-action-search grey-text "></i></label>
          
        </div>
    </div>
  </nav>	
	</div>
</div>



<ul class="collection" >


</ul>

<?php
$this->load->view ( "bienestarsocial/inc/pie.php" );
?>