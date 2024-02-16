<?php
   include("conexion/conexion.php");
   $id = $_GET["idBebida"];

   $consulta = "CALL proc_borrar_bebida('$id')";

  if(mysqli_query($conectar,$consulta)){
    header("location:bebidas.php");
  }else{
    echo "No se puede eliminar la bebida, está siendo ocupada por otros registros";
  }

?>
