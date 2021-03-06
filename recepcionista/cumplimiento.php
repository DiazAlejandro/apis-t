<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } else {
        if ($_SESSION['rol'] != 2) {
            header('location: ../login.php');
        }
    }
    if (isset($_GET['curp'])) {
        $curp = $_GET['curp'];
        
    }
    $name ="";
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        
    }
    include("../connect/conectar.php");
    $resultado = mysqli_query($conexion,"SELECT * FROM inscripcion INNER JOIN curso ON inscripcion.curso_clave = curso.clave where alumno_curp = '$curp'");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/tabla_curs.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap" 
    rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Cumplimiento del alumno</title>
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

    <!--Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <div class="card " >
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 bg-gray">Cumplimiento</h1>
                    </div>
                    <div class="card-body" id="cuerpo">
                        <div class="col-md-12">
                            <br>
                            <table class="table table-dark table-sm ">
                                <thead >
                                    <tr>
                                        <th style="text-align: center;">FOLIO</th>
                                        <th style="text-align: center;">FECHA INICIO</th>
                                        <th style="text-align: center;">FECHA FINAL</th>
                                        <th>ALUMNO</th>
                                        <th>CURSO</th>
                                        <th style="text-align: center;">CUMPLIMIENTO</th>
                                        <th style="text-align: center;">GENERAR CONSTANCIA</th>
                                    </tr>
                                </thead>
                                <tbody id="t-body">
                                    <?php
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <tr>
                                        <td class="col-1" style="text-align: center;"><?php
                                            echo $fila['folio'];
                                        ?></td>
                                        <td class="col-1" style="text-align: center;"><?php
                                            echo $fila['fecha_inicio'];
                                        ?></td>
                                        <td class="col-1" style="text-align: center;"><?php
                                            echo $fila['fecha_fin'];
                                        ?></td>
                                        <td class="text-uppercase"><?php
                                            echo $name;
                                        ?></td>
                                        <td class="col-4"><?php
                                            echo $fila['nombre'];
                                        ?></td>
                                        <td class="col-1 text-uppercase" ><?php
                                            echo $fila['cumplimiento'];
                                        ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                                if($fila['cumplimiento'] == "PENDIENTE" ||  $fila['cumplimiento'] == "SIN FINALIZAR"){

                                                }else{
                                                    ?>
                                                    <a href="constancia.php?folio=<?php echo $fila['folio']?>&curp=<?php echo $fila['alumno_curp']?>&name=<?php echo $name?>" class="btn btn-info">
                                                    <i class="fas fa-print"></i></i>
                                                    </a>
                                                    <?php
                                                }
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