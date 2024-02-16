<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Bebida</title>
</head>
<body>
    <h1>Actualizar Bebida</h1>
    <?php
        include("conexion/conexion.php");
       $idBebidaGet = $_GET['idBebida'];
       #echo $idBebidaGet . " SI FUNCINA :)"

       $consulta = "SELECT
       nombreBebidas, 
       precioBebida, 
       descripcion, 
       existencia
       FROM
       bebida
       WHERE
       bebida.idBebidas = '$idBebidaGet'";

       $bebida = mysqli_query($conectar,$consulta);
       $regBebida = mysqli_fetch_array($bebida); 
    ?>
    <form action="actualizar-bebida.php" method="post">
        <input type="hidden" name="txtIdBebida" value="<?php echo $idBebidaGet; ?>">
        <table>
          <tr><td><label>Nombre:</label></td>
              <td><input type="text" name="txtNombre" value="<?php echo $regBebida[0]; ?>"></td></tr>
          <tr><td><label>Precio:</label></td>
              <td><input type="text" name="txtPrecio" value="<?php echo $regBebida[1]; ?>"></td>
          <tr><td><label>Descripción:</label></td>
        <input type="text" name="txtDescripcion" value="<?php echo $regBebida[2]; ?>"><br>
        <label>Existencias:</label>
        <input type="text" name="txtExistencias" value="<?php echo $regBebida[3]; ?>"><br>
        <button type="submit">Registrar Bebida</button>
        </table>
    </form>
    <?php
        echo "Id Bebida: " .$_POST["txtIdBebida"] . "<br>" . "Bebida: ". $_POST["txtNombre"];
    ?>
</body>
</html>
