<?php
include("../connect/conectar.php");
$resultado = mysqli_query($conexion, "SELECT * FROM alumno");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
}

session_start();
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: /apis-t/login.php');
    }
}
?>

<!DOCTYPE html>
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

    <title>Registro de Instructor</title>
</head>

<body id="fondo">
    <!-- Barra de navegación-->
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
                        <a class="nav-link font-weight-bold border " href="../connect/cerrar_sesion.php" id="entrar">Cerrar sesión</a>
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
                        <a class="nav-link active text-light font-weight-bold" href="registro_instructor.php">Alta de instructor</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_instructor.php">Instructores registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="registro_curso.php">Alta de curso</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_curso.php">Cursos registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="reg_pagos.php">Registro de pagos</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_alumno.php">Alumnos registrados</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenido-->
    <!--Formulario-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card" id="contorno">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 ">Registrar pago</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Pago.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtfolio">Folio:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Z]+[0-9]+" type="text" class="form-control" id="bord" name="txtfolio" placeholder="Ingresa el folio del pago" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label for="txtFecha">Fecha:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9_- ]+" type="date" class="form-control" id="bord" name="txtfecha" placeholder="Ingresa la fecha del pago" required>
                            </div>
                            <div class="form-group">
                                <label for="timeHora">Hora:<span class="text-danger" id="marca">*</span></label>
                                <input type="time" class="form-control" id="bord" name="timehora" id="idhora" required>
                            </div>
                            <div class="form-group">
                                <label for="txtConcepto">Concepto:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="number" class="form-control" id="bord" name="txtconcepto" placeholder="Ingresa el concepto del pago" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAlumno">Alumno:<span class="text-danger" id="marca">*</span></label>
                                <select pattern="[A-Za-z0-9]+" name="txtasesor" class="form-control" id="bord" required>
                                    <option value="" selected="true" disabled="disabled">Seleccione el nombre del alumno</option>
                                    <?php
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $fila['curp'] . '">' . $fila['nombre'] . ' ' . $fila['apellido_p'] . ' ' . $fila['apellido_m'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>


                            <br><br>
                            <button type="submit" name="accion" value="enviar" class="btn btn-warning font-weight-bold" id="reg">Registrar Pago</button>
                            <a class="btn font-weight-bold" id="btn" href="tabla_curso.php">Cancelar</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>