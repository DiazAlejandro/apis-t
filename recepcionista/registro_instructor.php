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
    <title>Registro de Instructor</title>
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
    <!-- Contenido-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card ">
                    <div class="card-header" id="cabeza">
                        <h1 class="font-weight-bold mb-3 text-light">Instructor</h1>
                    </div>
                    <div class="card-body">
                        <form action="../recepcionista/controller/Instructor.php" method="post">
                            <div class="form-group">
                                <label for="txtclave">Nombre:<span class="text-danger">*</span></label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre">
                            </div>

                            <div class="form-group">
                                <label>Apellido paterno: <span class="text-danger">*</span></label>
                                <input type="text" name="apellido_p" class="form-control"
                                    placeholder="Ingrese apellido paterno">
                            </div>

                            <div class="form-group">
                                <label>Apellido materno: <span class="text-danger">*</span></label>
                                <input type="text" name="apellido_m" class="form-control"
                                    placeholder="Ingrese apellido materno">
                            </div>

                            <div class="form-group">
                                <label>CURP:<span class="text-danger">*</span></label>
                                <input type="text" name="curp" class="form-control" placeholder="Ingrese curp">
                            </div>

                            <div class="form-group">
                                <label>Teléfono: <span class="text-danger">*</span></label>
                                <input type="text" name="telefono" class="form-control"
                                    placeholder="Ingrese su número de teléfono">
                            </div>

                            <div class="form-group">
                                <label>Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Ingresa tu correo electrónico">
                            </div>

                            <button type="submit" name="accion" value="enviar" 
                                   class="btn btn-success font-weight-bold text-dark">Registrar Instructor</button>
                            <button type="reset" name="accion" value="restaurar"
                                    class="btn btn-warning font-weight-bold ">Restaurar</button>
                            <a class="btn btn-danger font-weight-bold text-dark" 
                                    href="tabla_instructor.php">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>