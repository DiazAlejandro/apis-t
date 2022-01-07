<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: /apis-t/login.php');
        }
    }
    include("../connect/conectar.php");
    if (isset($_GET['curp'])){   
        $curp = $_GET['curp'];
        $update = "SELECT * FROM instructor WHERE curp = '$curp'";
    }

    $resultado = mysqli_query($conexion,$update);

    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' ;
        exit;
    }
    else{
        $fila = mysqli_fetch_assoc($resultado);
        $nombre     = $fila['nombre'];
        $apellido_p = $fila['apellido_p'];
        $apellido_m = $fila['apellido_m'];
        $telefono   = $fila['telefono'];
        $correo     = $fila['correo_electronico'];
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

    <!-- Contenido-->

    <!-- Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card " id="contorno">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3">Editar datos del instructor</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Instructor_update.php" method="post">
                            <div class="form-group">
                                <label>CURP:<span class="text-danger" id="marca">*</span></label>
                                <input type="text" name="curp" class="form-control" id="curp" value="<?php echo $curp?>">
                                <input type="hidden" name="old_curp" class="form-control" id="old_curp" value="<?php echo $curp?>">
                            </div>

                            <div class="form-group">
                                <label for="txtclave">Nombre:<span class="text-danger" id="marca">*</span></label>
                                <input type="text" name="nombre" class="form-control" id="nombre" value = "<?php echo $nombre?>">
                            </div>

                            <div class="form-group">
                                <label>Apellido paterno: <span class="text-danger" id="marca">*</span></label>
                                <input type="text" name="apellido_p" class="form-control" id="apellido_p"
                                value = "<?php echo $apellido_p?>">
                            </div>

                            <div class="form-group">
                                <label>Apellido materno: <span class="text-danger" id="marca">*</span></label>
                                <input type="text" name="apellido_m" class="form-control" id="apellido_m"
                                value = "<?php echo $apellido_m?>">
                            </div>

                            <div class="form-group">
                                <label>Teléfono: <span class="text-danger" id="marca">*</span></label>
                                <input type="text" name="telefono" class="form-control" id="telefono"
                                value = "<?php echo $telefono?>">
                            </div>

                            <div class="form-group">
                                <label>Correo electrónico <span class="text-danger" id="marca">*</span></label>
                                <input type="email" name="email" class="form-control" id="email" 
                                value = "<?php echo $correo?>">
                            </div>

                            <br>
                            <button type="submit" name="accion" value="enviar" id="reg"
                            class="btn btn-warning font-weight-bold" >Editar</button>
                            <a class="btn font-weight-bold" id="btn"
                                    href="tabla_instructor.php">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>