<?php
   //inicio sesion
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiTiendita.com</title>
</head>
<body>
    <h1>Taquería "El perro felíz"</h1>
    
    <?php
    //Primero valido que las variables de sesion existan
    //Si existen es porque el usuario ya se autentificó
    //Si no existen el usuario no se ha autentificado
    if(isset($_SESSION['usuario'])){
        echo "<h4>Bienvenido " . $_SESSION['usuario'] . "</h4>";
        echo "<a href='cerrarsesion.php'>Cerrar Sesión</a>";
       if($_SESSION['idrol'] == 3){

       ?>
          <a href="bebidas.php"><h5>Bebidas</h5></a>
          <a href="insumo-platillos.php"><h5>Insumo-Platillos</h5></a>
          <a href='reporte-bebidas.php'><h5>Reporte Bebidas</h5></a>
    <?php
       }elseif($_SESSION['idrol'] == 1 || $_SESSION['idrol']== 2){
           echo "<a href='reporte-bebidas.php'><h5>Reporte Bebidas</h5></a>";
       }
    }else{
        echo "<h3>Acceso denegado, debes iniciar sesión</h3>";
        echo "<a href='autentificar.php'>Iniciar Sesión</a>";
    }   
    ?>
    
    
</body>
</html>
