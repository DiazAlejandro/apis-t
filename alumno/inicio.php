<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    } else {
        if ($_SESSION['rol'] != 3) {
            header('location: login.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Inicio - Alumnos</title>
</head>


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

    <nav class="navbar navbar-expand-lg" id="barrita">
          <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse order-last" id="collapsibleNavbar">
              <div>
                  <ul class="tabs navbar-nav">
                  <li class="nav-item" style="border: 1px solid white">
                        <a class="nav-link active text-light font-weight-bold" href="#">Inicio</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                    <a class="nav-link active text-light font-weight-bold" aria-current="page" href="inscribir_curso.php">Cursos Disponibles</a>
                    </li>
                    <li class="nav-item" style="border: 1px solid white">
                    <a class="nav-link text-light font-weight-bold" href="pagos_realizados.php">Pagos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light font-weight-bold" href="#">Pricing</a>
                    </li>
                    <li class="nav-item text-light font-weight-bold">
                    <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin barra de navegación-->




    <!--Contenido-->
    
    <h1>Bienvenido: </h1>
    <?php
        if (isset($_SESSION['email'])) {
            $rol =$_SESSION['email'];
            echo $rol;
        }
    ?>
</body>

</html>


