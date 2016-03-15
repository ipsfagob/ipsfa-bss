<!DOCTYPE html>

  <html>
  <title>IpsfaNet</title>
    <head>
      <!--Import Google Icon Font
      

      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	-->					
      <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <style>
    
      body {
	    display: flex;
	    min-height: 100vh;
	    flex-direction: column;
		  }
		
		  main {
		    flex: 1 0 auto;
		  }


		  .material-icons.md-128 { font-size: 140px; }
      .button { /* clase general */
          border: 1px solid #dedede;
          border-radius: 3px;
          color: #555;
          font: 12px/12px HelveticaNeue, Arial;
          padding: 8px 11px;
          text-decoration: none;
        }
      </style>
    </head>
 <body class="white lighten-4">
    <main>
   <nav class="grey lighten-4" style="height: 58px; text-align: right; padding-right: 20px; margin-top: -10px;">
     <a href="<?php echo base_url(); ?>index.php/Login" class="button" >+ Salir del Sistema</a>
   </nav>
