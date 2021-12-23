<?php
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/registro_curso.css">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Registro de Curso</title>
</head>

<body id="fondo">
    <!-- Barra de navegación-->
    <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand" id="texto-nav">INSTITUTO APIS-T</a>
            </div>
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-dark" href="inicio.php" id="home">Regresar</a>
                </li>
            </ul>
 
        </div>
    </nav>

    <div class="font-weight-bold card-header" id="barrita"></div>

    <!--Formulario-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card" id="contorno">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 ">Registrar datos del curso</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Curso.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtclave">Clave:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Z]+[0-9]+" type="text" class="form-control" id="bord" name="txtclave"
                                    placeholder="Ingresa la clave del curso" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9_- ]+" type="text" class="form-control" id="bord" name="txtnombre"
                                    placeholder="Ingresa el nombre del curso" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAsesor">Seleciona el Instructor:<span class="text-danger" id="marca">*</span></label>
                                <select pattern="[A-Za-z0-9]+" name="txtasesor" class="form-control" id="bord" required>
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
                            <div class="form-group">
                                <label for="txtDuracion">Duración: (SEMANAL)<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="text" class="form-control" id="bord" name="txtduracion"
                                    placeholder="Ingresa la duración del curso" required>
                            </div>
                            <div class="form-group">
                                <label for="timeHora">Hora:<span class="text-danger" id="marca">*</span></label>
                                <input type="time" class="form-control" id="bord" name="timehora" id="idhora" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPeriodo">Período de pago:<span
                                        class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z ]+" type="text" class="form-control" id="bord" name="txtperiodo" id="idperioso"
                                    placeholder="Ingresa el periodo de pago" required>
                            </div>
                            <div class="form-group">
                                <label for="txtCoste">Coste:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="number" class="form-control" id="bord" name="txtcoste"
                                    placeholder="Ingresa el costo del curso" required>
                            </div>
                            <br><br>
                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-primary font-weight-bold" id="reg">Registrar Curso</button>
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