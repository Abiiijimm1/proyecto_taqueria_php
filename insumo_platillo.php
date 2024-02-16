<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Platillos-Insumos</title>
</head>

<body>
    <h1>.:Platillos-Insumos:.</h1>
    <form action="registrar-platillo-insumo.php" method="post">
        <table>
            <tr>
                <td><label>Platillo:</label></td>
                <td>
                    <select name="selectPlatillo">
                        <option value="">--Seleccione--</option>
                        <?php
                            include("conexion/conexion.php");
                            $consulta="SELECT clvPlatillos,
                                       nombrePlatillo 
                                       FROM platillos";
                            $platillo = mysqli_query($conectar,$consulta);
                            while($regPlatillo = mysqli_fetch_array($platillo)){
                               echo "<option value='" . $regPlatillo[1] . "'>".
                                $regPlatillo[1] ."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Insumo:</label></td>
                <td>
                    <select name="selectInsumo">
                        <option value="">--Seleccione--</option>
                        <?php
                            $consulta="SELECT
                            insumos.idInsumos, 
                            insumos.nombreInsumo
                        FROM
                            insumos";
                            $insumo = mysqli_query($conectar,$consulta);
                            while($regInsumo = mysqli_fetch_array($insumo)){
                               echo "<option value='" . $regInsumo[1] . "'>".
                                $regInsumo[1] ."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Cantidad:</label></td>
                <td>
                    <input type="text" name="txtCantidad">
                </td>
            </tr>
            <tr>
                <td><button type="submit">Registrar Insumo al Platillo</button></td>
            </tr>
        </table>
    </form>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Platillo</th>
            <th>Precio</th>
            <th>Insumo</th>
        </tr>
        <?php
        $consulta = "SELECT
        insumosplatillos.clvPlatillos, 
        platillos.nombrePlatillo, 
        platillos.precioPlatillo, 
        CONCAT(
        insumosplatillos.cantUnidadUsar, ' ',
        insumos.unidadInsumo, ' de ',
        insumos.nombreInsumo) insumo
    FROM
        insumosplatillos
        INNER JOIN
        insumos
        ON 
            insumosplatillos.idInsumos = insumos.idInsumos
        INNER JOIN
        platillos
        ON 
            insumosplatillos.clvPlatillos = platillos.clvPlatillos";
        //Ejecutando la consulta
        $platInsumo = mysqli_query($conectar, $consulta);
        //Extraer Datos de Bebidas
        while ($regPlatInsumo = mysqli_fetch_array($platInsumo)) {
            echo "<tr>" .
                "<td>" . $regPlatInsumo["0"] . "</td>" .
                "<td>" . $regPlatInsumo["1"] . "</td>" .
                "<td>" . $regPlatInsumo["2"] . "</td>" .
                "<td>" . $regPlatInsumo["3"] . "</td>" . 
                "</tr>";
        }
        mysqli_close($conectar);
        ?>
    </table>
</body>

</html>
