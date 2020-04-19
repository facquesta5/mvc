
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="app/Template/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app/Template/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="app/Template/css/brands.css">
    <link rel="stylesheet" type="text/css" href="app/Template/css/solid.css">

    
    



    <link rel="stylesheet" href="app/Template/css/style-day.css">
  

    <script type="text/javascript" src="app/Template/js/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="app/Template/js/bootstrap.min.js"></script>

    
  </head>
  <body class="body-day">
    <div class="container mvc">
      <!-- Content here -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="?pagina=home">MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?pagina=home">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pagina=sobre">Sobre</a>
            </li>
            <li class="nav-item" >
              <!--<i class="fas fa-toggle-off" style="margin: 14px 0 0 10px;"></i>-->
                <a href="?pagina=home" id="select-night" ><i class="fas fa-toggle-on" style="margin: 14px 0 0 10px;"></i></a>
              
            </li>
          </ul>
        </div>
        <a class="nav-link" href="?pagina=admin&metodo=index">Admin</a>
      </nav>
    </div>
    <hr>
    <div class="container mvc">
      
      {{area_dinamica}}
    </div>
  
  </body>
</html>
<script>
          
          $("#select-night").click(function(){
            $("body").removeClass("body-day")
            $("body").addClass("body-night");
          });
   </script>