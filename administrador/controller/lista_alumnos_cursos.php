<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../../login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../../login.php');
    }
}
include("../../connect/conectar.php");

$clave = $_GET['clave'];
$resultado = mysqli_query($conexion, "SELECT 
    alumno.curp,
    alumno.apellido_p,
    alumno.apellido_m,
    alumno.nombre,
    inscripcion.fecha_inicio,
    inscripcion.fecha_fin 
    FROM inscripcion INNER JOIN alumno
    ON alumno.curp = inscripcion.alumno_curp
    AND inscripcion.curso_clave = '$clave'  
    ORDER BY inscripcion.fecha_inicio  ASC");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
}

$resultado2 = mysqli_query($conexion, "SELECT 
curso.clave,
curso.nombre,
CONCAT(instructor.nombre, ' ', instructor.apellido_p, ' ', instructor.apellido_m) AS nombre_inst
FROM curso INNER JOIN instructor 
ON curso.instructor_curp = instructor.curp 
AND curso.clave = '$clave'");

if (!$resultado2) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
}else{
    if (mysqli_num_rows($resultado2) > 0) {
        while ($fila2 = mysqli_fetch_assoc($resultado2)) {
            $clave = $fila2['clave'];
            $nombre_curso = $fila2['nombre'];
            $nombre_inst = $fila2['nombre_inst'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../../img/logo-header.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/tabla_curs.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Alumnos por cursos</title>
</head>

<body id="fondo">
    <!-- Barra de navegación-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="../../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand" id="texto-nav">INSTITUTO APIS-T</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold border " href="../connect/cerrar_sesion.php" id="entrar">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <div class="card ">
                    <div class="card-header" id="cabeza">
                        <div class="row">
                            <div class="col-lg-2">
                                <h3 class="font-weight-bold mb-3 bg-gray">CLAVE: </h3>
                            </div>
                            <div class="col-lg-3">
                                <h3 class="mb-3 bg-gray"><?php echo $clave?> </h3>
                            </div>
                            <div class="col-lg-2">
                                <h3 class="font-weight-bold mb-3 bg-gray">CURSO: </h3>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="mb-3 bg-gray"><?php echo $nombre_curso?> </h3>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-3">
                                <h3 class="font-weight-bold mb-3 bg-gray">INSTRUCTOR: </h3>
                            </div>
                            <div class="col-lg-7">
                                <h3 class="font-weight-bold mb-3 bg-gray"><?php echo $nombre_inst?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="cuerpo">
                        <?php
                        if (mysqli_num_rows($resultado) > 0) {
                            
                                ?>
                                <div class="col-md-12">
                                    <br>
                                    <table class="table table-dark table-sm ">

                                        <thead>
                                            <tr>
                                                <th>CURP</th>
                                                <th>APELLIDO P</th>
                                                <th>APELLIDO M</th>
                                                <th>NOMBRE</th>
                                                <th>FECHA INICIO</th>
                                                <th>FECHA FIN</th>
                                            </tr>
                                        </thead>
                                        <tbody id="t-body">
                                        <?php
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                            echo $fila['curp'];
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            echo $fila['apellido_p'];
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            echo $fila['apellido_m'];
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            echo $fila['nombre'];
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            echo $fila['fecha_inicio'];
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            echo $fila['fecha_fin'];
                                                            ?>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <h2>SIN ALUMNOS REGISTRADOS</h2>
                                    <?php

                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>