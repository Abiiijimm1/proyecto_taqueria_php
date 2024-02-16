<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    
    <h1>.:Bebidas:.</h1>
    <?php
    if(isset($_SESSION['usuario'])){
        echo "<h4>Bienvenido " . $_SESSION['usuario'] . "</h4>";
       if($_SESSION['idrol'] == 3){
    ?>
    <!-- 
    <form action="" method="post">
        <table>
          <tr><td><label>Nombre:</label></td>
              <td><input type="text" name="txtNombre"></td></tr>
          <tr><td><label>Precio:</label></td>
              <td><input type="text" name="txtPrecio"></td>
          <tr><label>Descripción:</label>
        <input type="text" name="txtDescripcion"><br>
        <label>Existencias:</label>
        <input type="text" name="txtExistencias"><br>
        <button type="submit">Registrar Bebida</button>
        
    </form>
   
  -->
    <?php
        include("conexion/conexion.php");
        $consulta = "SELECT * FROM bebida WHERE estatus = '1'";
        //Ejecutando la consulta
        $bebidas = mysqli_query($conectar,$consulta);
        //Extraer Datos de Bebidas
        while($regBebida = mysqli_fetch_assoc($bebidas)){
            echo $regBebida["idBebidas"] . "<br>";
            echo "<table border='1'>
            <tr>
               <th>Bebida</th>
               <th>Precio</th>
               <th>Descripción</th>
               <th>Existencias</th>
               <th>Editar</th>
               <th>Eliminar</th>
            </tr>
            ";
            echo "<tr>" . 
            "<td>" . $regBebida["nombreBebidas"] . "</td>" . 
            "<td>" . $regBebida["precioBebida"] . "</td>" . 
            "<td>" . $regBebida["descripcion"] . "</td>" . 
            "<td>" . $regBebida["existencia"] . "</td>" . 
            "<td><a title='Editar' href='actualizar-bebida.php?idBebida=".$regBebida["idBebidas"]."'><img src='img/ic_edit.png' width='20' height='20'></a></td>" .
            "<td><a title='Eliminar' href='eliminar-bebida.php?idBebida=".$regBebida["idBebidas"]."'><img src='img/ic_trash.png' width='20' height='20'></a></td>" .
            "</tr></table>";
        }
        mysqli_close($conectar);
       //rol
       }else{
           echo "No tienes los permisos para consultar bebidas, contacte al Admin";
       }
    //sesion
    }else{
        echo "Para consultar las bebidas debe iniciar sesion";
    }
    ?>
    
</body>
</html>
