<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 3) {
        header('location: login.php');
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

    $curp = $fila['curp'];
}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link href="../css/inicio.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!--Título de la pagina-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Alumno</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold lead ">INSTITUTO APIS-T</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#" id="home">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="PerfilAlum.php?curp=<?php echo $curp?>" id="Perfil">Perfil </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="../connect/cerrar_sesion.php" id="entrar">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Bienvenido: </h1>
    <?php
    if (isset($_SESSION['email'])) {
        $rol = $_SESSION['email'];
        echo $rol;
    }
    ?>
</body>

</html>