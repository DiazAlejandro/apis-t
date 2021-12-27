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

    if (isset($_GET['clave'])){   
        $clave = $_GET['clave'];
        $update = "SELECT * FROM curso WHERE clave = '$clave'";
    }

    $instructores = mysqli_query($conexion,"SELECT * FROM instructor");
    if (!$instructores) {
        echo 'No se pudo ejecutar la consulta de instructores' ;
        exit;
    }

    $resultado = mysqli_query($conexion,$update);

    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta del curso: ' ;
        exit;
    }
    else{
        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];
        $duracion = $fila['duracion'];
        $hora = $fila['hora'];
        $periodo_pago = $fila['periodo_pago'];
        $costo = $fila['costo'];
        $instructor_curp = $fila['instructor_curp'];
    }

    $instructor = mysqli_query($conexion,"SELECT * FROM instructor WHERE curp = '$instructor_curp'");
    if(!$instructor){
        echo 'error al encontrar instructor'; 
    }
    else{
        $fila = mysqli_fetch_assoc($instructor);
        $nombre_instructor = $fila['nombre'];
        $apellido_p = $fila['apellido_p'];
        $apellido_m = $fila['apellido_m'];
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

    <!--Formulario-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card" id="contorno">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 ">Editar datos del curso</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Curso_update.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtclave">Clave:<span class="text-danger" id="marca">*</span></label>
                                <input type="hidden" name="old_clave" class="form-control" id="old_clave" value="<?php echo $clave?>">
                                <input pattern="[A-Z]+[0-9]+" type="text" class="form-control" id="bord" name="txtclave" value = "<?php echo $clave?>"
                                    placeholder="Ingresa la clave del curso" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9_- ]+" type="text" class="form-control" id="bord" name="txtnombre" value = "<?php echo $nombre?>"
                                    placeholder="Ingresa el nombre del curso" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAsesor">Seleciona el Instructor:<span class="text-danger" id="marca">*</span></label>
                                <select pattern="[A-Za-z0-9]+" name="txtasesor" class="form-control" id="bord" required>
                                    <option value="<?php echo $instructor_curp?>" selected><?php echo $nombre_instructor.' '.$apellido_p.' '.$apellido_m?> </option>
                                    <?php
                                    if (mysqli_num_rows($instructores) > 0) {
                                        while ($fila = mysqli_fetch_assoc($instructores)) {
                                            if($fila['curp'] != $instructor_curp){
                                                echo '<option value="'.$fila['curp'].'">'.$fila['nombre'].' '.$fila['apellido_p'].' '.$fila['apellido_m'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtDuracion">Duración:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9 ]+" type="text" class="form-control" id="bord" name="txtduracion" value = "<?php echo $duracion?>"
                                    placeholder="Ingresa la duración del curso" required>
                            </div>
                            <div class="form-group">
                                <label for="timeHora">Hora:<span class="text-danger" id="marca">*</span></label>
                                <input type="time" class="form-control" id="bord" name="timehora" id="idhora" value = "<?php echo $hora?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPeriodo">Período de pago:<span
                                        class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z ]+" type="text" class="form-control" id="bord" name="txtperiodo" id="idperioso" value = "<?php echo $periodo_pago?>"
                                    placeholder="Ingresa el periodo de pago" required>
                            </div>
                            <div class="form-group">
                                <label for="txtCoste">Coste:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="number" class="form-control" id="bord" name="txtcoste" value = "<?php echo $costo?>"
                                    placeholder="Ingresa el costo del curso" required>
                            </div>
                            <br><br>
                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-warning font-weight-bold" id="reg">Editar Curso</button>
                            <button type="reset" name="accion" value="restaurar"
                                    class="btn font-weight-bold" id="rest">Restaurar</button>
                            <a class="btn font-weight-bold" id="btn"
                                    href="tabla_curso.php">Cancelar</a>
                            
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
</html>