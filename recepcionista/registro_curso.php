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

    <link rel="stylesheet" href="../css/reg-curso.css">
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

<body>
    <!-- Barra de navegación-->
    <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="../img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold lead ">INSTITUTO APIS-T</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="inicio.php" id="home">Regresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class=" bg-dark font-weight-bold lead text-white card-header">
        <h5> </h5>
    </div>

    <!--Formulario-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card ">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 text-light">Registrar datos del curso</h1>
                    </div>
                    <div class="card-body">

                        <form action="../recepcionista/controller/Curso.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtclave">Clave:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="txtclave"
                                    placeholder="Ingresa la clave del curso">
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Nombre:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="txtnombre"
                                    placeholder="Ingresa el nombre del curso">
                            </div>
                            <div class="form-group">
                                <label for="txtAsesor">Seleciona el Instructor:<span class="text-danger">*</span></label>
                                <select name="txtasesor" class="form-control">
                                 <option selected="true" disabled="disabled">Seleccione</option>
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
                                <label for="txtDuracion">Duración:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="txtduracion"
                                    placeholder="Ingresa la duracion del curso">
                            </div>
                            <div class="form-group">
                                <label for="timeHora">Hora:<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="timehora" id="idhora">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPeriodo">Periodo de pago:<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="txtperiodo" id="idperioso"
                                    placeholder="Ingresa el periodo de pago">
                            </div>
                            <div class="form-group">
                                <label for="txtCoste">Coste:<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="txtcoste"
                                    placeholder="Ingresa el costo del curso">
                            </div>
                            <br><br>
                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-success font-weight-bold text-dark">Registrar Curso</button>
                            <button type="reset" name="accion" value="restaurar"
                                    class="btn btn-warning font-weight-bold ">Restaurar</button>
                            <a class="btn btn-danger font-weight-bold text-dark" 
                                    href="tabla_curso.php">Cancelar</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

            <?php
    include('template/pie.php')
?>