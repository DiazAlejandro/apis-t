<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="css/reg.css" rel="stylesheet">

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
    <title>Registro</title>
</head>

<body>
     <!-- Barra de navegación-->
     <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <div class="form-group logo-img ">
                <img src="img/logo-header.png" width="80" height="80">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold lead ">INSTITUTO APIS-T</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="index.php" id="home">Regresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class=" bg-dark font-weight-bold lead text-white card-header"></div>
    <!-- Contenido-->
    <section class="contact-box">
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
                <div class="position-absolute testiomonial p-4">
                    <h3 class="font-weight-bold text-light">Instituto Apist-t</h3>
                    <p class="lead text-light">Aprendizaje</p>
                </div>
            </div>
            <!-- Formulario -->
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="font-weight-bold mb-3 text-light">Registro de datos</h1>

                    <p class="mb-5 font-weight-bold text-warning">Datos del alumno</p>
                    <form action="Alumno_tutor.php" method="POST">
                    <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">CURP:<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="curp" class="form-control" placeholder="Ingrese curp">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Nombre: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Apellido paterno: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="apellido_p" class="form-control"
                                    placeholder="Ingrese apellido paterno">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Apellido materno: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="apellido_m" class="form-control"
                                    placeholder="Ingrese apellido materno">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Fecha de nacimiento: <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="fecha_nac" class="form-control"
                                    placeholder="Ingrese su fecha de nacimiento">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Edad: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="edad" class="form-control" placeholder="Ingrese su edad">
                            </div>
                            <div class="form-group col-md-6  text-light">
                                <label class="font-weight-bold ">Género: <span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="genero" value="M" >Masculino
                                <input type="radio" name="genero" value="F">Femenino
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Medio:  <span
                                        class="text-danger">*</span></label>
                                <select name="medio" class="custom-select" id="medio">
                                    <option selected="true" disabled="disabled">Seleccione</option>
                                    <option value="Redes Sociales">Redes Sociales</option>
                                    <option value="Promotor">Promotor</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <!--Datos de localización-->
                        <p class="mb-5 font-weight-bold text-warning">Datos de localización</p>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Teléfono: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="telefono" class="form-control"
                                    placeholder="Ingrese su número de teléfono">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Calle: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="calle" class="form-control" placeholder="Ingrese su calle">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Colonia: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="colonia" class="form-control" placeholder="Ingrese su colonia">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Municipio: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="municipio" class="form-control"
                                    placeholder="Ingrese su municipio">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">CP:<span class="text-danger">*</span></label>
                                <input type="text" name="cp" class="form-control"
                                    placeholder="Ingrese su código postal">
                            </div>
                        </div>
                        <!--Datos de salud-->
                        <p class="mb-5 font-weight-bold text-warning">Estado de salud del alumno</p>

                        <div class="form-row mb-2">
                            <div class="form-group mb-3  text-light">
                                <label class="font-weight-bold">¿Cuenta con seguro médico? <span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="seguro_med" value="true">Si
                                <input type="radio" name="seguro_med" value="false">No
                            </div>
                            <div class="form-group ">
                                <label class="font-weight-bold text-light">Seleccione el tipo de servicio médico:<span
                                        class="text-danger">*</span></label>
                                <select name="servicio" class="custom-select" id="servicio">
                                    <option selected="true" disabled="disabled">Seleccione</option>
                                    <option value="IMSS">IMSS</option>
                                    <option value="ISSTE">ISSTE</option>
                                    <option value="ISSEMYM">ISSEMYM</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">No. de seguridad social:</label>
                                <input type="text" name="num_seguridad" id="num_seguridad" class="form-control"
                                    placeholder="Ingresa tu número de seguridad social">
                            </div>
                            <div class="form-group mb-3 text-light" >
                                <label class="font-weight-bold ">¿Cómo considera su estado de salud?<span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="estado" value="BUENO">Bueno
                                <input type="radio" name="estado" value="REGULAR">Regular
                                <input type="radio" name="estado" value="MALO">Malo
                            </div>
                            <div class="form-group mb-3  text-light">
                                <label class="font-weight-bold">¿Padece alguna enfermedad crónica?<span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="enfermedad" value="SI">Si
                                <input type="radio" name="enfermedad" value="NO">No
                            </div>
                            <div class="form-group mb-3  text-light">
                                <label class="font-weight-bold ">¿Ha presentado síntomas de COVID-19 o algún
                                    familiar cercano?<span class="text-danger">*</span></label>
                                <input type="radio" name="covid" value="true">Si
                                <input type="radio" name="covid" value="false">No
                            </div>
                            <div class="form-group mb-3  text-light">
                                <label class="font-weight-bold ">¿Presenta Alergias?<span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="alergias" value="SI">Si
                                <input type="radio" name="alergias" value="NO">No
                            </div>
                            <div class="form-group col-md-8 text-light">
                                <label class="font-weight-bold">¿Presenta alguna Preescripción médica?<span
                                        class="text-danger">*</span></label>
                                <input type="radio" name="prescripcion" value="SI">Si
                                <input type="radio" name="prescripcion" value="NO">No
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Observaciones generales:</label>
                                <input type="text" name="observaciones" id="observaciones" class="form-control"
                                    placeholder="Ingresa observaciones en caso de tenerlas">
                            </div>
                        </div>
                        <!--Datos del tutor-->
                        <p class="mb-5 font-weight-bold text-warning">Datos del tutor</p>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">CURP:<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="curp_tutor" class="form-control" placeholder="Ingrese curp">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Nombre: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nombre_tutor" class="form-control" placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Apellido paterno: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="apellido_p_tutor" class="form-control"
                                    placeholder="Ingrese apellido paterno">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Apellido materno: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="apellido_m_tutor" class="form-control"
                                    placeholder="Ingrese apellido materno">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Parentesco: <span
                                class="text-danger">*</span></label>
                                    <select name="parentesco" class="custom-select" id="parentesco">
                                        <option selected="true" disabled="disabled">Seleccione</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Tío">Tío</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Teléfono 1: <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="telefono1" class="form-control"
                                    placeholder="Ingrese su número de teléfono">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Teléfono 2: </label>
                                <input type="text" name="telefono2" class="form-control"
                                    placeholder="Ingrese un número de teléfono">
                            </div>
                        </div>
                         <!--Datos de logeo-->
                        <p class="mb-5 font-weight-bold text-warning">Datos del logeo</p>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Correo electrónico <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-light">Contraseña <span
                                        class="text-danger">*</span></label>
                                <input type="password" name="pass" id="pass" class="form-control"
                                    placeholder="Ingresa una contraseña">
                            </div>
                            <div class="form-group mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label text-light">Al seleccionar esta casilla aceptas
                                       que todos los datos ingresados son correctos</label>
                                </div>
                            </div>
                            <div class="form-group mx-sm-5 pd-6">
                                <button type="submit" class="btn btn-blue btn-lg ingresar " value="Registrarse"> Registrarse</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>