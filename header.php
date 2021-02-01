<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>BHermanos</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../../BHermanosM-main/index.php"><img src="../../BHermanosM-main/IMGS/bhlogneg.png" style=" border= 0 "></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      

      <?php
        if(isset($_SESSION['userId'])){
          echo '<form action="../../BHermanosM-main/includes/logout.inc.php" method="post">
    <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../BHermanosM-main/index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="../../BHermanosM-main/empleados/empleados.php">Empleados <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="../../BHermanosM-main/venta/realizar_venta.php">Venta<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="../../BHermanosM-main/inventario/index.php">Inventario <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="../../BHermanosM-main/venta/historial.php">Historial Ventas <span class="sr-only">(current)</span></a>
          </li>
          
          <li class="nav-item">
            <button class="btn btn-danger">Cerrar Sesion</button>     
          </li>    
      </form>   ';
        }

      ?>
      
       


      
    </ul>
    
  </div>
</nav>



</body>
</html>