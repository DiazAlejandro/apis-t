<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: ../login.php');
    }
}

if (isset($_SESSION['email'])) {
    include("../connect/conectar.php");
    $email = $_SESSION['email'];
    $update = "SELECT * FROM alumno WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $update);
    $curp = '';
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ';
        exit;
    } else {
        $fila = mysqli_fetch_assoc($resultado);
    }
}
?>


<!doctype html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/logo-header.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/recep.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/tabla_curs.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Inicio - Recepcionista</title>
</head>

<body id="fondo">
    <!-- Barra de navegaci??n-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand" id="texto-nav">INSTITUTO APIS-T</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold border " href="../connect/cerrar_sesion.php" id="entrar">Cerrar sesi??n</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" id="barrita">
        <div class="container-fluid">
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="tabs navbar-nav">
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link active text-light font-weight-bold" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_instructor.php">Instructores registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_curso.php">Cursos registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_alumno.php">Alumnos registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="consultar_pagos.php">Consultar pagos</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="lista_alumnos.php">Cumplimiento</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-left">

            <img src="../img/a.JPG" class="float-xl-end rounded" width="350" height="350">

            <div class="col-md-8 p-lg-10 mx-3 my-5">
                <h1>Bienvenida</h1>
                <p></p>
                <p class="lead fw-normal text-justify">Esta es la p??gina de Inicio del Sistema de Gesti??n de Inscripciones del Instituto APIS-T. </p>
                <p class="lead fw-normal text-justify">En la barra superior encontrar?? todas las funciones necesarias para la correcta administraci??n de las inscripciones de los alumnos a los cursos, as?? como de los pagos.</p>
                <p class="lead fw-normal text-justify">Le deseamos lo mejor y esperamos la p??gina le sea de mucha utilidad.</p>
                <p class="lead fw-normal text-justify">No olvide cuidarse y seguir las indicaciones para el cuidado de su salud.</p>
            </div>
        </div>
    </div>
</body>
<footer>
    <br>
    <div style="background:black;">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-warning text-center pl-3">Instituto APIS-T</h5>
                    <p class="text-light pl-5" style="text-align: justify;">
                        Somos un grupo de profesionales que colaboran para brindar capacitaci??n y formaci??n en habilidades tecnol??gicas ??? educativas para las 3 ??reas m??s importantes de la vida diaria: Trabajo, Escuela y Negocios.
                    </p>
                </div>
                <div class="col-5 text-center">
                    <h5 class="text-warning text-center pl-3">Informaci??n</h5>
                    <li><a class="text-light" href="https://apist.mx/contacto/">Contacto</a></li>
                </div>
                
            </div>
            <p class="text-center text-secondary">2021 Todos los derechos reservados</p>
        </div>
        <br>
    </div>
</footer>
</html>