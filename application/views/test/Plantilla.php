<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font
        <link type="text/css" href="<?php echo base_url(); ?>public/css/material.css" rel="stylesheet">

      -->							
      
       <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      

      <style type="text/css">
        th, td {
            padding: 20px;
            text-align: left;
        }
      </style>
  
    </head>

    <body>
      <main>

        <div class="navbar-fixed">
          <nav>

            <div class="nav-wrapper blue">
              <a href="#" class="brand-logo">Pruebas Unitarias</a>




            </div>






          </nav>

        </div>

        <div class="container">          
                <div class="row">

                <div class="col s12"> <!-- Note that "m8 l9" was added -->
                  <!-- Teal page content

                        This content will be:
                    9-columns-wide on large screens,
                    8-columns-wide on medium screens,
                    12-columns-wide on small screens  -->
                    <?php echo $Reporte?>

                </div>

       

            </div>
        </div>
     </main>
    </body>
    
    </head>
    </html>
