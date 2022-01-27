<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    } else {
        if ($_SESSION['rol'] != 2) {
            header('location: /apis-t/login.php');
        }
    }
    include("../connect/conectar.php");
    if (isset($_GET['curp'])) {
        $curp = $_GET['curp'];
        $update = "SELECT * FROM pago WHERE alumno_curp = '$curp'";
    }
    $resultado = mysqli_query($conexion, $update);

    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ';
        exit;
    } 
    
    
    include("../connect/conectar.php");
if (isset($_GET['folio'])) {
    $folio = $_GET['folio'];
    $update = "SELECT * FROM pago WHERE folio = '$folio'";
}
$resultadoa = mysqli_query($conexion, $update);

if (!$resultadoa) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else {
    $fila = mysqli_fetch_assoc($resultadoa);

    $folio = $fila['folio'];
    $fecha = $fila['fecha'];
    $hora = $fila['hora'];
    $concepto = $fila['concepto'];
    $alumno_curp = $fila['alumno_curp'];
}
    $updatea = "SELECT * FROM alumno WHERE curp = '$alumno_curp'";


$resultadoa = mysqli_query($conexion, $updatea);

if (!$resultadoa) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else {
    $fila = mysqli_fetch_assoc($resultadoa);

    $curp = $fila['curp'];
    $nombre = $fila['nombre'];
    $apellido_p = $fila['apellido_p'];
    $apellido_m = $fila['apellido_m'];
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

    <title>Historial de pagos</title>
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
            <div class="row justify-content-center">
                <div class="col-md-13 col-lg-10">
                    <br>
                    <div class="card">
                        <div class="card-header" id="cabeza">
                            <h1 class="font-weight-bold mb-3 bg-gray">Historial de pagos</h1>
                        </div>
                        <div class="card-body" id="cuerpo">
                            <div class="col-md-12">
                                <br>
                            
                                <label for="txtAlumno" class="font-weight-bold" style="font-size: 15pt;">NOMBRE:</label>
                                <label style="font-size: 15pt;" value="<?php echo $curp ?>">
                                    <?php
                                      echo $nombre . ' ' . $apellido_m . ' ' . $apellido_p;
                                    ?>
                                </label>
                                <br><br>
                                <table class="table table-dark table-sm ">
                                    <thead>
                                        <tr>
                                            <th>Folio de pago</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Concepto</th>
                                            <th>Imprimir</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if (mysqli_num_rows($resultado) > 0) {
                                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                                ?>
                                    <tbody id="t-body">
                                        
                                                <tr>
                                                    <td>
                                                        <?php
                                                                echo $fila['folio'];
                                                                ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                                echo $fila['fecha'];
                                                                ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                                echo $fila['hora'];
                                                                ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                                echo $fila['concepto'];
                                                                ?>
                                                    </td>
                                                    <td>
                                                        <a href="comprobante.php?folio=<?php echo $fila['folio'];?>" class="btn btn-info" >
                                                        <i class="fas fa-print"></i></i>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div>
                                    <a class="btn btn-danger font-weight-bold" id="btn" href="consultar_pagos.php">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>