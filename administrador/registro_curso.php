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
    $resultado = mysqli_query($conexion,"SELECT * FROM instructor");
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' ;
        exit;
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

    <title>Registro de curso</title>
    <script src="controller/validacionCurso.js"></script>
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

    <!--Formulario-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card" >
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 ">Registrar datos del curso</h1>
                    </div>
                    <div class="card-body">
                        <form action="controller/Curso.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="txtclave" class="font-weight-bold">Clave:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Z]+[0-9]+" type="text" class="form-control" id="bord" name="txtclave"
                                    placeholder="Ingresa la clave del curso" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtNombre" class="font-weight-bold">Nombre:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9_- ]+" type="text" class="form-control" name="txtnombre"
                                    placeholder="Ingresa el nombre del curso"  style="border: black 1px solid; box-shadow: 0px 10px 10px black;" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtAsesor" class="font-weight-bold">Seleciona el Instructor:<span class="text-danger" id="marca">*</span></label>
                                <select pattern="[A-Za-z0-9]+" name="txtasesor" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" required>
                                 <option value="" selected="true" disabled="disabled">Seleccione el nombre del instructor</option>
                                    <?php
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="'.$fila['curp'].'">'.$fila['nombre'].' '.$fila['apellido_p'].' '.$fila['apellido_m'].'</option>';
                                            
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtDuracion" class="font-weight-bold">Duración: (SEMANAL)<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="text" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" name="txtduracion"
                                    placeholder="Ingresa la duración del curso" maxlength="2" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="timeHora" class="font-weight-bold">Hora:<span class="text-danger" id="marca">*</span></label>
                                <input type="time" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" name="timehora" id="idhora" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPeriodo" class="font-weight-bold">Periodo de pago:<span
                                        class="text-danger" id="marca">*</span></label>
                                <select id="" name="txtperiodo" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" required>
                                    <option value="" selected="true" disabled="disabled">Seleccione periodo de pago</option>
                                    <option value="POR DIA">POR DIA</option>
                                    <option value="SEMANAL">SEMANAL</option>
                                    <option value="MENSUAL">MENSUAL</option>
                                    <option value="ANUAL">ANUAL</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtCoste" class="font-weight-bold">Coste:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="number" class="form-control" style="border: black 1px solid; box-shadow: 0px 10px 10px black;" name="txtcoste" maxlength="6"
                                    placeholder="Ingresa el costo del curso" id="costo" onblur="validarCosto()" required>
                            </div>
                            <br><br>
                         </div>
                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-warning font-weight-bold" id="btn" style="width: 150px;">Registrar Curso</button>
                            <button type="reset" name="accion" value="restaurar" class="btn font-weight-bold text-light" id="rest" style="background-color: black; width: 150px;">Restaurar</button>
                            <a class="btn font-weight-bold btn-danger" id="btn" href="tabla_curso.php" style="width: 150px;">Cancelar</a>
                         </form>
                    </div>
                </div>
            </div>
            </div>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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