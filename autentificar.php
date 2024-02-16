<?php

/*Validar que los datos
del login si esten en la BD
y coicida el usuario con la contraseña */

//if(userForm == $userBD && pwForm == pwBD ){
     //Si existen entonces iniciamos la sesión
     session_start();
    // $_SESSION['usuario'] = $userBD;
    $_SESSION['usuario'] = "";
    $_SESSION['idrol'] = ;
    $_SESSION['email'] = "";
    header("location:index.php");

//}

?>
