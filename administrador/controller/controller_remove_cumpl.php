<?php
    include("../../connect/conectar.php");
    if (isset($_GET['curp'])) {
        $curp = $_GET['curp'];
    }
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    }
    if (isset($_GET['folio'])) {
        $folio = $_GET['folio'];

        $sqlInscripcion = "UPDATE inscripcion SET cumplimiento='SIN FINALIZAR' WHERE folio='$folio'";
        if (mysqli_query($conexion, $sqlInscripcion)) {
            $messaget = "EL ALUMNO NO HA TERMINADO SU CURSO";
                echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../cumplimiento.php?curp=$curp&name=$name';
                </script>";
        }else {
            $messaget = "ERROR, NO SE PUDO ACTUALIZAR LA INSCRIPCIÓN";
            echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../cumplimiento.php?curp=$curp&name=$name';
                    </script>";
        }
    }
?>