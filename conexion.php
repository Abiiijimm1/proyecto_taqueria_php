<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $baseDatos = "tacos";

    $conectar = mysqli_connect(
                  $servidor,
                  $usuario,
                  $contrasenia,
                  $baseDatos) 
                  OR DIE
                  ("PROBLEMAS AL CONECTAR CON EL SERVIDOR DE DATOS");
   
   /*             if(!$conectar){
     echo "PROBLEMAS AL CONECTAR CON EL SERVIDOR DE DATOS";
   } 
   */
?>
