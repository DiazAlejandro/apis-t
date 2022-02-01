<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../login.php');
} else {
    if ($_SESSION['rol'] != 3) {
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

        $curp = $fila['curp'];
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
    
    <title>Inicio - Alumno</title>
</head>


<body id="fondo">
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light font-weight-bold" style="border: 1px solid white" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light font-weight-bold" style="border: 1px solid white" href="perfil_alumno.php?curp=<?php echo $curp ?>">Información Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light font-weight-bold" style="border: 1px solid white" aria-current="page" href="inscribir_curso.php">Cursos Disponibles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light font-weight-bold" style="border: 1px solid white" href="lista_cursos.php?curp=<?php echo $curp ?>">Cursos Inscritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light font-weight-bold" style="border: 1px solid white" href="pagos_realizados.php?curp=<?php echo $curp ?>">Pagos Realizados</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>

    <!--Contenido-->
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-4">
                <h3>BIENVENIDO...</h3>
                <br>
                <h5>Capacítate y construye tu conocimiento</h5>
                <p style="text-align: justify;">
                    Esta es su página principal, en la cuál podrá realizar distintas acciones que se encuentran en la barra de navegación ubicada en la parte superior.
                    <br><br>
                    Brindamos experiencias prácticas y vivenciales de herramientas tecnológicas que potencializarán la calidad de las actividades que desarrolle cada uno de nuestros estudiantes.
                </p>
            </div>
            <div class="col-sm-8">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-ride="carousel">
                    <ol class="carousel-indicators" id="flecha">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/al-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/al-2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/al-3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/al-4.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

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
                        Somos un grupo de profesionales que colaboran para brindar capacitación y formación en habilidades tecnológicas – educativas para las 3 áreas más importantes de la vida diaria: Trabajo, Escuela y Negocios.
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