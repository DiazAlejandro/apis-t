<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../login.php');
    }
}
include("../connect/conectar.php");
if (isset($_GET['curp'])) {
    $curp = $_GET['curp'];
    $update = "SELECT * FROM alumno WHERE curp = '$curp'";
}

$resultado = mysqli_query($conexion, $update);

if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else {
    $fila = mysqli_fetch_assoc($resultado);

    $curp = $fila['curp'];
    $nombre = $fila['nombre'];
    $apellido_p = $fila['apellido_p'];
    $apellido_m = $fila['apellido_m'];
    $fecha_nac = $fila['fecha_nac'];
    $genero = $fila['sexo'];
    $medio = $fila['medio'];
    $edad = $fila['edad'];
    $telefono = $fila['telefono'];
    $calle = $fila['calle'];
    $colonia = $fila['colonia'];
    $municipio = $fila['municipio'];
    $cp = $fila['cp'];
    $estatus = $fila['estatus'];
    $email = $fila['email'];
    $tutor_curp = $fila['tutor_curp'];
}


$updateU = "SELECT * FROM usuario WHERE email = '$email'";
$resultado1 = mysqli_query($conexion, $updateU);

if (!$resultado1) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else {
    $fila = mysqli_fetch_assoc($resultado1);

    $pass = $fila['pass'];
    $rol_id = $fila['rol_id'];
}


$updateS = "SELECT * FROM estado_salud WHERE alumno_curp = '$curp'";
$resultado2 = mysqli_query($conexion, $updateS);

if (!$resultado2) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else {
    $fila = mysqli_fetch_assoc($resultado2);

    $seguro_med = $fila['seguro_med'];
    $servicio = $fila['servicio'];
    $num_seguridad = $fila['num_seguridad'];
    $estado = $fila['estado'];
    $enfermedad = $fila['enfermedad'];
    $covid = $fila['covid'];
    $alergias = $fila['alergias'];
    $prescripcion = $fila['prescripcion'];
    $observaciones = $fila['observaciones'];
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

    <title>Datos del alumno</title>
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
                        <a class="nav-link active text-light font-weight-bold" href="registro_instructor.php">Alta de Instructor</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_instructor.php">Instructores registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="registro_curso.php">Alta de Curso</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_curso.php">Cursos registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="reg_pagos.php">Registro de Pagos</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="tabla_alumno.php">Alumnos registrados</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="consultar_pagos.php">Consultar Pagos</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link text-light font-weight-bold" href="lista_alumnos.php">Cumplimiento</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3">Datos del Alumno</h1>
                    </div>
                    <div class="card-body">
                        <form action="controller_alumno.php" method="post">
                        <p class="mb-5 font-weight-bold mt-4">DATOS PERSONALES</p>
                            <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                    <label class="font-weight-bold">CURP:<span class="text-danger">*</span></label>
                                    <input disabled type="text" name="curp" class="form-control" id="ing" placeholder="Ingrese curp" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" value="<?php echo $curp ?>">

                                </div>
                                <span>
                                    <input disabled type="hidden" name="old_curp" class="form-control" id="old_curp" value="<?php echo $curp ?>">
                                    <input disabled type="hidden" name="old_email" class="form-control" id="old_email" value="<?php echo $email ?>">
                                </span>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Nombre: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="nombre" class="form-control" id="ing" value="<?php echo $nombre ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" placeholder="Ingrese su nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Apellido paterno: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="apellido_p" class="form-control" id="ing" value="<?php echo $apellido_p ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" placeholder="Ingrese apellido paterno">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Apellido materno: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="apellido_m" class="form-control" id="ing" value="<?php echo $apellido_m ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" placeholder="Ingrese apellido materno">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Fecha de nacimiento: <span class="text-danger">*</span></label>
                                    <input disabled type="date" name="fecha_nac" class="form-control" id="ing" value="<?php echo $fecha_nac ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" placeholder="Ingrese su fecha de nacimiento">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Edad: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="edad" class="form-control" id="ing" value="<?php echo $edad ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" placeholder="Ingrese su edad">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label class="font-weight-bold ">Género: <span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="genero" value="M" <?php if ($genero == 'M') { ?> checked <?php } ?>>Masculino
                                    <input disabled type="radio" name="genero" value="F" <?php if ($genero == 'F') { ?> checked <?php } ?>>Femenino
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Medio: <span class="text-danger">*</span></label>
                                    <select disabled name="medio" class="custom-select" id="medio" value="<?php echo $medio ?>" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                        <option selected="true" disabled="disabled">Seleccione</option>
                                        <option value="Redes Sociales" <?php if ($medio == 'Redes Sociales') { ?> selected <?php } ?>>Redes Sociales</option>
                                        <option value="Promotor" <?php if ($medio == 'Promotor') { ?> selected <?php } ?>>Promotor</option>
                                        <option value="Otro" <?php if ($medio == 'Otro') { ?> selected <?php } ?>>Otro</option>
                                    </select>
                                </div>
                            </div>

                            <!--Datos de localización-->
                            <p class="mb-5 font-weight-bold ">DATOS DE LOCALIZACIÓN</p>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Teléfono: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="telefono" class="form-control" id="ing" value="<?php echo $telefono ?>" placeholder="Ingrese su número de teléfono" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Calle: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="calle" class="form-control" id="ing" value="<?php echo $calle ?>" placeholder="Ingrese su calle" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Colonia: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="colonia" class="form-control" id="ing" value="<?php echo $colonia ?>" placeholder="Ingrese su colonia" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Municipio: <span class="text-danger">*</span></label>
                                    <input disabled type="text" name="municipio" class="form-control" id="ing" value="<?php echo $municipio ?>" placeholder="Ingrese su municipio" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">CP:<span class="text-danger">*</span></label>
                                    <input disabled type="text" name="cp" class="form-control" id="ing" value="<?php echo $cp ?>" placeholder="Ingrese su código postal" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                </div>
                            </div>
                            <!--Datos de salud-->
                            <p class="mb-4 font-weight-bold  mt-4">ESTADO DE SALUD</p>

                            <div class="form-row mb-2">
                                <div class="form-group mb-3  col-md-8">
                                    <label class="font-weight-bold">¿Cuenta con seguro médico?<span class="text-danger" id="marca">*</span></label>
                                    <input disabled type="radio" name="seguro_med" value="true" <?php if ($seguro_med == 1) { ?> checked <?php } ?>>Si
                                    <input disabled type="radio" name="seguro_med" value="false" <?php if ($seguro_med == 0) { ?> checked <?php } ?>>No
                                </div><br>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Seleccione el tipo de servicio médico:<span class="text-danger">*</span></label>
                                    <select disabled name="servicio" class="custom-select" id="servicio" style="border: black 1px solid; box-shadow: 0px 10px 10px black;">
                                        <option selected="true" disabled="disabled" >Seleccione</option>
                                        <option value="IMSS" <?php if ($servicio == 'IMSS') { ?> selected <?php } ?>>IMSS</option>
                                        <option value="ISSTE" <?php if ($servicio == 'ISSTE') { ?> selected <?php } ?>>ISSTE</option>
                                        <option value="ISSEMYM" <?php if ($servicio == 'ISSEMYM') { ?> selected <?php } ?>>ISSEMYM</option>
                                        <option value="OTRO" <?php if ($servicio == 'OTRO') { ?> selected <?php } ?>>OTRO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">No. de seguridad social:</label>
                                    <input disabled type="text" name="num_seguridad" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" id="num_seguridad" class="form-control" value="<?php echo $num_seguridad ?>" placeholder="Ingresa tu número de seguridad social">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold ">¿Cómo considera su estado de salud?<span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="estado" value="BUENO" <?php if ($estado == 'BUENO') { ?> checked <?php } ?>>Bueno
                                    <input disabled type="radio" name="estado" value="REGULAR" <?php if ($estado == 'REGULAR') { ?> checked <?php } ?>>Regular
                                    <input disabled type="radio" name="estado" value="MALO" <?php if ($estado == 'MALO') { ?> checked <?php } ?>>Malo
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">¿Padece alguna enfermedad crónica?<span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="enfermedad" value="SI" <?php if ($enfermedad == 'SI') { ?> checked <?php } ?>>Si
                                    <input disabled type="radio" name="enfermedad" value="NO" <?php if ($enfermedad == 'NO') { ?> checked <?php } ?>>No
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold ">¿Ha presentado síntomas de COVID-19 o algún
                                        familiar cercano?<span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="covid" value="true" <?php if ($estado == 1) { ?> checked <?php } ?>>Si
                                    <input disabled type="radio" name="covid" value="false" <?php if ($estado == 0) { ?> checked <?php } ?>>No
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold ">¿Presenta Alergias?<span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="alergias" value="SI" <?php if ($alergias == 'SI') { ?> checked <?php } ?>>Si
                                    <input disabled type="radio" name="alergias" value="NO" <?php if ($alergias == 'NO') { ?> checked <?php } ?>>No
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="font-weight-bold">¿Presenta alguna Preescripción médica?<span class="text-danger">*</span></label>
                                    <input disabled type="radio" name="prescripcion" value="SI" <?php if ($prescripcion == 'SI') { ?> checked <?php } ?>>Si
                                    <input disabled type="radio" name="prescripcion" value="NO" <?php if ($prescripcion == 'NO') { ?> checked <?php } ?>>No
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Observaciones generales:</label>
                                    <input disabled type="text" name="observaciones" id="observaciones" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" class="form-control" value="<?php echo $observaciones ?>" placeholder="Ingresa observaciones en caso de tenerlas">
                                </div>
                            </div>

                            <!--Datos de logeo-->
                            <p class="mb-5 font-weight-bold mt-4">DATOS DEL LOGEO</p>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Correo electrónico <span class="text-danger">*</span></label>
                                    <input disabled type="email" name="email" id="email" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" class="form-control" value="<?php echo $email ?>" placeholder="Ingresa tu correo electrónico">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                                    <input type="password" name="pass" id="pass" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" class="form-control" value="<?php echo $pass ?>" placeholder="Ingresa una contraseña">
                                </div>
                            </div>
                            <br>
                            <a href="editar_alumno.php?curp=<?php echo $curp ?>" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Editar
                                </a>   

                        </form>
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
                    <p class="text-light text-justify pl-5">
                        Somos un grupo de profesionales que colaboran para brindar capacitación
                        y formación en habilidades tecnológicas – educativas para las 3 áreas más
                        importantes de la vida diaria: Trabajo, Escuela y Negocios.
                    </p>
                </div>
                <div class="col-5 text-center">
                    <h5 class="text-warning text-center pl-3">Información</h5>
                    <li><a class="text-light" href="https://apist.mx/contacto/">Contacto</a></li>
                </div>

            </div>
            <p class="text-center text-secondary">2021 Todos los derechos reservados</p>
        </div>
        <br>
    </div>
</footer>
</html>