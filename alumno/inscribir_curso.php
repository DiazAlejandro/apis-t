<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } else {
        if ($_SESSION['rol'] != 3) {
            header('location: ../login.php');
        }
    }
    include("../connect/conectar.php");
    $resultado = mysqli_query($conexion,"SELECT * FROM curso");
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' ;
        exit;
    }

    $curp = "";
    $alumno = mysqli_query($conexion,"SELECT curp FROM alumno WHERE email='".$_SESSION['email']."'");
    if (mysqli_num_rows($alumno) > 0) {
        while ($alf = mysqli_fetch_assoc($alumno)) {
            $curp = $alf['curp'];
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Curso disponible - Alumno</title>
</head>

<body>
<body id="fondo">
    <nav class="navbar navbar-expand-lg  ">
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" style="border: 1px solid white" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" style="border: 1px solid white" aria-current="page" href="inscribir_curso.php">Cursos Disponibles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" style="border: 1px solid white" href="pagos_realizados.php">Pagos Realizados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" style="border: 1px solid white" href="perfil_alumno.php?curp=<?php echo $curp ?>">Información Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" style="border: 1px solid white" href="lista_cursos.php?curp=<?php echo $curp ?>">Cursos Inscritos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin barra de navegación-->
    <!--Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br>
                <div class="card">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3">Lista de cursos</h1>
                    </div>
                    <div class="card-body" id="cuerpo">
                        <div class="col-md-12">
                            <br>
                            <table class="table table-responsive-sm table-dark table-sm">
                                <thead >
                                    <tr>
                                        <th>Clave</th>
                                        <th>Curso</th>
                                        <th>Duración</th>
                                        <th>Costo</th>
                                        <th>Inscripción</th>
                                    </tr>
                                </thead>
                                <tbody id="t-body">
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
                                        <td>
                                            <a href="controllers/Inscribir_curso.php?clave=<?php echo $fila['clave']?>" class="btn btn-success font-weight-bold center" id="btn">
                                                INSCRIBIR
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
                                <a class="btn btn-danger font-weight-bold" id="btn" href="inicio.php">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


