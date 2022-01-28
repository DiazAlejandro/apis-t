<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } else {
        if ($_SESSION['rol'] != 2) {
            header('location: ../login.php');
        }
    }
    include("../connect/conectar.php");
    $resultado = mysqli_query($conexion,"SELECT * FROM curso");
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' ;
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/logo-header.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/tabla_curs.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <title>Cursos registrados</title>
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

    <!--Contenido-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card " >
                    <div class="card-header" id="cabeza">
                    <h1 class="font-weight-bold mb-3 bg-gray">Lista de cursos</h1>
                    </div>
                    <div class="card-body" >
                        <!-- Formulario para buscar --> 
                        <form action="search_curso.php" method="$_POST">
                            <div class="row">
                                <div class="col-lg-1 align-self-lg-center">
                                </div>
                                <div class="col-lg-3 align-self-lg-center">
                                    <h5 class="font-weight-bold">Buscar por NOMBRE:</h5>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" name="curso_search" placeholder="Ingrese NOMBRE del CURSO" required>
                                </div>
                                <div class="col-lg-2 align-self-lg-center">
                                    <button type="submit" class="btn btn-warning font-weight-bold" id="btn" style="width: 150px;">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <br>
                            <table class="table table-sm" id="tb">
                                <thead >
                                    <tr class="bg-dark text-light">
                                        <th class="border border-dark">Clave</th>
                                        <th class="border border-dark">Nombre del Curso</th>
                                        <th class="border border-dark">Duración</th>
                                        <th class="border border-dark">Costo</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark" id="t-body">
                                    <?php
                                        if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                                echo $fila['clave'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo $fila['nombre'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo $fila['duracion']." SEMANA(S)";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo "$ ".$fila['costo'];
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
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
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script>
    $("#tb").bootstrapTable({
        pagination: true, // Si se muestra la barra de paginación
        pageSize: 3, // Número de filas que se muestran en una página
        paginationLoop: false, // Si se abre el bucle infinito de la barra de paginación, haga clic en la página siguiente cuando la última página se convierta en la primera página
        pageList: [5, 10, 20], // Seleccione cuántas filas se muestran en cada página. Si los datos son demasiado pequeños, puede ser ineficaz
        formatLoadingMessage: function() {
            return ''; //Agregar un mensaje x
        }
    });
</script>
</html>


