<?php
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: /apis-t/login.php');
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link href="../css/recep.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap"
        rel="stylesheet">
        
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!--Título de la pagina-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Recepcionista</title>
</head>
<body id="fondo">
    <!--Barra de navegación-->
<nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <div class="form-group logo-img " >
                <img src="../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
            <a class="navbar-brand font-weight-bold lead ">INSTITUTO APIS-T</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="btn font-weight-bold" href="../connect/cerrar_sesion.php" id="entrar">Cerrar sesión</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
    <div class="font-weight-bold card-header" id="barrita"></div>
 <!--Contenido
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="tabla_curso.php">Cursos Registrados</a>
                <a class="nav-link active" aria-current="page" href="tabla_instructor.php">Instructores Registrados</a>
                <a class="nav-link active" aria-current="page" href="registro_curso.php">Alta Curso</a>
                <a class="nav-link active" aria-current="page" href="registro_instructor.php">Alta Instructores</a>
            </div>
            </div>
        </div>
    </nav>
-->
<div class="wrapper">
    <div class="sidebar">
        <h2>Administrador</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="registro_instructor.php"><i class="fas fa-user"></i>Alta de instructor</a></li>
            <li><a href="tabla_instructor.php"><i class="fas fa-address-card"></i>Instructores registrados</a></li>
            <li><a href="registro_curso.php"><i class="fas fa-project-diagram"></i>Alta de curso</a></li>
            <li><a href="tabla_curso.php"><i class="fas fa-blog"></i>Cursos registrados</a></li>
            <li><a href="#"><i class="fas fa-address-book"></i>Contact</a></li>
            <li><a href="#"><i class="fas fa-map-pin"></i>Map</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
</div>
</body>
</html>