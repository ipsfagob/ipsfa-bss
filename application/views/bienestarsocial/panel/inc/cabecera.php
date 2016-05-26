<!DOCTYPE html>

  <html>
    <head>
      <!--Import Google Icon Font
      

      		-->	
      <title>Ipsfa en linea</title>				
	  <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet" />

      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/estilo.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	  <style type="text/css">
	  	  [class*="img-cred-"]{
	  	  	width:96%;height:55px;margin:auto
	  	  }


		.btns-sminf{color:#003E82;text-align:justify;width:93%;float:left;font-weight:bold; box-sizing: border-box}
		.btns-sminh{color:#006699;width:7%;height:24px;float:left; box-sizing: border-box;}
		.__ctdrs_xxmall{font-size:8pt;text-align:justify;width:100%;float:left;color:#3C3C3C}
		.cortar{text-overflow:ellipsis;white-space:nowrap; overflow:hidden;-webkit-transition: all 1s;-moz-transition: all 1s;transition: all 1s;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}

		.bhts{font-size:xx-small;color:#4FB4FF;width:33.3%;float:left;text-align:center}

		.btns-smin{background:#fff;height:auto;width:100%;cursor:pointer;padding:5px;margin:0;box-sizing:border-box;border:0.1rem #e0e0e0 solid}
		.btns-smin:hover{height:auto;width:100%;box-shadow: 0.1rem 0.1rem 0.2rem 0.1rem #990000;cursor:pointer}


		.btns-smin,.row .col{float:left;box-sizing:border-box;padding:0.4rem 0.4rem 0.4rem 0.4rem}
		.btns-smin:hover,.row .col{float:left;box-sizing:border-box;padding:0.4rem 0.4rem 0.4rem 0.4rem}




		.file-path-wrapper-pre-view{border:1px #e0e0e0 solid;width:80%;height:97px;float:left;margin-left:0.1em;background: url(../materializecss/ic_content_paste_white_24px.svg) no-repeat left top  #FBFBFB; color:#C4C4C4;box-sizing:border-box;clear:left}
		.file-path-wrapper-sopor{border:0px #009933 solid;width:80%;box-sizing:border-box;clear:left;float:left}  


		.input-field .btn {background-color:#00345A;width:50px;height:50px;border-radius:50px;-moz-border-radius:50px;-webkit-border-radius:50px;padding:0px}
		.file-field .btn, .file-field .btn-large {float: right;height: 50px;line-height: 50px;}
		.input-field .btn:hover {background-color:#990000;}  


		.file-field-input-field{box-sizing:border-box;background:#fff;} 


		.btns-add{background-color:#00CC33;color:#FFF;text-align:center;}

		.mnu:hover{height:auto;width:100%;box-shadow: 0.1rem 0.1rem 0.2rem 0.1rem #CECECE;cursor:pointer}
		.input-field input[id="search"] {
		 border-bottom: 0px ;
		 box-shadow: 0 0px 0 0 #000;
		}
		.input-field input[id="search"]:hover {
		 border-bottom: 0px;
		 box-shadow: 0 0px 0 0 #000;
		}
		.input-field input[id="search"]:focus {
		 border-bottom: 0px ;
		 box-shadow: 0 0px 0 0 #000;
		}

		.input-field label {
		 border-bottom: 0px ;
		 box-shadow: 0 0px 0 0 #000;
		 color: #000;
		}

		.img-min{background:#fff;height:100px;width:100px;cursor:pointer;padding:10px;margin:0;box-sizing:border-box;border:0.1rem #e0e0e0 solid}

		.chart-legend li span{
		    display: inline-block;
		    padding: 10px;
		    width: 10px;
		    height: 10px;
		    margin-right: 5px;
		}
		.pie-legend-text {
			color:#990000;

		}

		.menu {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		}

		.menu li {
		    float: left;
		}

		.menu li a {
		    display: block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}

		.menu li a:hover {}
		.menu li a span {color: #333}
		.imagen-text-right{background:url(/ipsfa-bss/public/img/texts_active.svg) #696C68  no-repeat right;}
		.titulo{background:#fff;height:auto;width:100%;cursor:pointer;padding:5px;margin:0;color:#003E82;font-size: 16px; font-weight: bold;}
	    /** imagen-text-right valid **/
	    ::-webkit-input-placeholder { color: blue; } /* WebKit */
		:-moz-placeholder { color: blue; } /* Firefox 18- */
		::-moz-placeholder { color: blue; } /* Firefox 19+ */
		:-ms-input-placeholder { color: blue; } /* IE 10+ */
  		</style>
   	</head>
    <body class="grey lighten-3">
	<main>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper" style="background-color:#00345A">
				<a href="#" class="brand-logo">
					
					<img src="<?php echo base_url(); ?>public/img/logo-ipsfa.png" >

				</a>
				<a href="#" data-activates="nav-mobile" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only" style="background-color:#00345A" id="menuprincipal"><i class="mdi-navigation-menu"></i></a>
				
								
				<ul id="reportes" class="dropdown-content " >
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/consulta">
						<font class="black-text" >Consultar Codigo</font><i class="material-icons left green-text ">search</i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/farmacia/me">
						<font class="black-text" >Notificar Afiliado</font><i class="material-icons left blue-text ">contact_mail</i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/farmacia/me">
						<font class="black-text" >Configurar Solicitud</font><i class="material-icons left blue-text ">settings</i></a>
					</li>			  			 
				  	
											
					<li class="divider"></li>	
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/farmacia/me">
						<font class="black-text" >Reembolsos y Apoyos</font><i class="material-icons left blue-text ">print</i></a>
					</li>			
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel
					/citas">
						<font class="black-text" >Citas Tratamientos</font><i class="mdi-action-alarm-add left blue-text text-darken-3"></i></a>							
					</li>		
					

				</ul>
				
				<ul id="nav-mobile" class="side-nav">
					<br>	
					<!-- <img src="<?php echo base_url(); ?>public/img/ipsfa.png" class="responsive-img"> -->
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/index/">Principal
					<i class="mdi-action-home left blue-text"></i></a></li>
					
					
					
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/salir" class="tooltipped" data-position="top" data-delay="10" data-tooltip="Volver al menu">
						Salir<i class="mdi-action-settings-power left red-text"></i> </a>
					</li>
				</ul>
				
				<ul class="right hide-off-med-and-down">					
					
				</ul>

				<ul class="right hide-on-med-and-down">
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/index" >
						<i class="right"></i>ANALISTA</a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/index" >
						<i class="mdi-action-home"></i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/index" >
						<i class="material-icons">notifications</i></a>
					</li>
					<li><a class="dropdown-panel" href="#!" data-activates="reportes">
						<i class="material-icons">more_vert</i></a>
					</li>
					<li><a href="<?php echo base_url(); ?>index.php/BienestarPanel/index" >
						<i class="material-icons">settings_power</i></a>
					</li>
									
				</ul>
				
				
				
			</div>
		</nav>
	</div>



	

