<?php
    include('template/cabecera.php');
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

    <link rel="stylesheet" href="../css/tabla.css">
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
    <!--Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <br>
                <div class="card ">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 bg-gray text-light">Lista de Instructores</h1>
                    </div>
                    <div class="card-body" id="cuerpo">
                        <div class="col-md-12">
                            <br>
                            <table class="table table-dark table-sm">
                                <thead id="fondo">
                                    <tr>
                                        <th>CURP</th>
                                        <th>Nombre</th>
                                        <th>A. Paterno</th>
                                        <th>A. Materno</th>
                                        <th>Telefono</th>
                                        <th>Correo electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <tr>
                                        <td><?php
                                            echo $fila['curp'];
                                        ?></td>
                                        <td><?php
                                            echo $fila['nombre'];
                                        ?></td>
                                        <td><?php
                                            echo $fila['apellido_p'];
                                        ?></td>
                                        <td><?php
                                            echo $fila['apellido_m'];
                                        ?></td>
                                        <td><?php
                                            echo $fila['telefono'];
                                        ?></td>
                                        <td><?php
                                            echo $fila['correo_electronico'];
                                        ?></td>
                                        <td>
                                            <a href="update.php?clave=<?php echo $row['clave']?>" class="btn btn-secondary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="controller/Instructor_delete.php?curp=<?php echo $fila['curp']?>" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
    </table>
    <div>
                                <a class="btn btn-warning font-weight-bold" href="registro_instructor.php">Nuevo Instructor</a>
                            </div>
                        </div>
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