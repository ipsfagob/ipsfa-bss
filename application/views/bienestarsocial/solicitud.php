
<?php 
$this->load->view("bienestarsocial/inc/cabecera.php");
?>

<script type="text/javascript"
  src="<?php echo base_url(); ?>application/views/bienestarsocial/js/solicitud.js"></script>
<br><br>
<?php //echo $codigo?>
<div class="container .hide-on-small-only">
	
  <div class="row">
        <div class="col s12">
          <h5>Nota:</h5>
          <p><font color="red" >* Los archivos adjuntos para el informe medico debe ser en extensión PDF</font>
          <br>Deben estar en un orden correlativo acorde al Informe Médico, de igual forma los documentos deben estar legibles,
              asimismo el Informe medico deberá estar vigente.<br>
              Recuerde que si la factura es mayor a tres meses se considera extemporanéa.<br>
          </p>
        </div>
  </div>
 

    <form class="col s12" action="<?php echo base_url() . "index.php/BienestarSocial/subirArchivos";?>"  method="post" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $codigo;?>" name="codigo">
      <input type="hidden" value="<?php echo $url;?>" name="url">
      <?php
        foreach ($data as $clave => $valor) {
          foreach ($valor as $k => $v) {          
              $cabecera = '<div class="row">
                <div class="col s12">
                <div class="file-field input-field">
                <div class="btn col s1 m1 l1 btns-add" >
                <i class="small material-icons">attach_file</i>';
              $cuerpo = '<input type="file" accept=".pdf" name="' .  $v['nombre'] . '">';
              $pie = '</div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="' .  $v['descripcion'] . '" >
                </div>
                </div>
                </div>
                </div>';
              echo $cabecera . $cuerpo . $pie;
          }
        }       
      ?>
     
      
      <div class="row">
      	<div class="col s12">
    			<button class="btn-large waves-effect waves-light" style="background-color:#00345A"  
          name="action" onclick="enviar(<?php echo $url?>)" type="submit">Enviar Documentos
    			    <i class="material-icons right">send</i>
    			</button>
      	</div>
      </div>       
    </form>
 </div>
<?php 
$this->load->view("bienestarsocial/inc/pie.php");
?>