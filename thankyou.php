<?php
if(isset($_GET['id_venta']) && isset($_GET['metodo'])){
  include "./php/conexion.php";
  $conexion->query("INSERT INTO pagos (id_venta,metodo) 
  VALUES (".$_GET['id_venta'].",'".$_GET['metodo']."')")or die($conexion->error);
  header("Location: ./thankyou.php?id_venta=".$_GET['id_venta']);
}
if(isset($_GET['id_pago']) && isset($_GET['id_cupon'])){
  include "./php/conexion.php";
  $conexion->query("INSERT INTO ventas (id_pago,id_cupon) 
  VALUES (".$_GET['id_pago'].",'".$_GET['id_cupon']."')")or die($conexion->error);
  header("Location: ./thankyou.php?id_venta=".$_GET['id_venta']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias por tu compra!</h2>
            <p class="lead mb-5">Tu pedido se completó con éxito.</p>
            <p><a href="verpedido.php?id_venta=<?php echo $_GET['id_venta']?>" class="btn btn-sm btn-primary">Ver pedido</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>