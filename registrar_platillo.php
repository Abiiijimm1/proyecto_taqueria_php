<?php
    include("conexion/conexion.php");
    $platillo = $_POST['selectPlatillo'];
    $insumo = $_POST['selectInsumo'];
    $cantidad = $_POST['txtCantidad'];

    #$consulta = "CALL insertarInsumosPlatillos('$platillo','$insumo','$cantidad')";
    $consulta = "INSERT insumosplatillos VALUES (
        DEFAULT,
        (SELECT platillos.clvPlatillos FROM platillos WHERE
         platillos.nombrePlatillo='$platillo'),
        (SELECT insumos.idInsumos FROM insumos WHERE
         insumos.nombreInsumo='$insumo'),
        '$cantidad')";
    if(mysqli_query($conectar,$consulta)){
        #Redirecciono a insumo-platillo
        header("location:insumo-platillos.php");
    }else{
        echo "Problemas al registrar el insumo al platillo";
        echo "<br>Consulte al Administrador del sitio";
    }

    #echo "$platillo - $insumo - $cantidad";

?>
