<?php
    include("../connect/conectar.php");
    $resultado = mysqli_query($conexion,"SELECT * FROM alumno");
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
    <title>Registro de Pagos</title>
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
                        <h1 class="font-weight-bold mb-3 ">Registrar pago</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Pago.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtfolio">Folio:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Z]+[0-9]+" type="text" class="form-control" id="bord" name="txtfolio"
                                    placeholder="Ingresa el folio del pago" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label for="txtFecha">Fecha:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[A-Za-z0-9_- ]+" type="date" class="form-control" id="bord" name="txtfecha"
                                    placeholder="Ingresa la fecha del pago" required>
                            </div>
                            <div class="form-group">
                                <label for="timeHora">Hora:<span class="text-danger" id="marca">*</span></label>
                                <input type="time" class="form-control" id="bord" name="timehora" id="idhora" required>
                            </div>
                            <div class="form-group">
                                <label for="txtConcepto">Concepto:<span class="text-danger" id="marca">*</span></label>
                                <input pattern="[0-9]+" type="number" class="form-control" id="bord" name="txtconcepto"
                                    placeholder="Ingresa el concepto del pago" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAlumno">Alumno:<span class="text-danger" id="marca">*</span></label>
                                <select pattern="[A-Za-z0-9]+" name="txtasesor" class="form-control" id="bord" required>
                                 <option value="" selected="true" disabled="disabled">Seleccione el nombre del alumno</option>
                                    <?php
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="'.$fila['curp'].'">'.$fila['nombre'].' '.$fila['apellido_p'].' '.$fila['apellido_m'].'</option>';
                                            
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            
                            <br><br>
                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-primary font-weight-bold" id="reg">Registrar Pago</button>
                            <a class="btn font-weight-bold" id="btn"
                                    href="tabla_curso.php">Cancelar</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</body>
</html>