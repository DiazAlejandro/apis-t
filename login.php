<?php
    include_once 'connect/conexion.php';
    session_start();
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
    }

    /*if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: recepcionista/inicio.php');
            break;
            case 2:
                header('location: alumno/inicio.php');
            break;

            default:
        }
    }*/

    if(isset($_POST['email']) && isset($_POST['pass'])){
        $email = $_POST['email'];
        $encriptado = $_POST['pass'];
        $pass = sha1($encriptado);

        $db = new DB();
        $query = $db->connect()->prepare('SELECT * FROM usuario WHERE email = :email AND pass = :pass');
        $query->execute(['email' => $email, 'pass' => $pass]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            $rol = $row[2];
            $_SESSION['rol'] = $rol;
            $_SESSION['email'] = $email;
            switch($_SESSION['rol']){
            case 1:
                header('location: administrador/inicio.php');
            break;
            case 2:
                header('location: recepcionista/inicio.php');
            break;
            case 3:
                header('location: alumno/inicio.php');
            break;

            default:
        }
        }else{
            $var = "El usuario o contraseña son incorrectos";
            echo "<script> alert('".$var."'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/logo-header.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" cotent="ie-edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href='css/ingreso.css'>
    <title>Login </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>
    <div class="container"></div>

    <div class="row justify-content-center pt-5 mt-5 mr-4">
        <div class="col-9 col-sm-8 col-md-6 col-lg-4 col-xL-4 formulario ">

            <div class="form-group text-center">
                <div id=Login>
                    <div class="form-group apist-img">
                        <img src="img/logo-header.png">
                    </div>
                    <br>
                    <h1 class="ti">Login</h1>
                    <form name="formulario" action="#" method="post" id="formulario">
                        <div class="form-group mt-5 mx-sm-6" id="correo">
                            <input pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]+" type="email" name="email" id="email" class="form-control Input"
                            placeholder="Ingrese su Correo Electrónico" required><br><br>
                        </div>
                        <div class="form-group  mx-sm-6" id="contraseña">
                            <input type="password" name="pass" id="password" class="form-control Input"
                            placeholder="Ingrese su contraseña" minlength="4" required><br><br>
                        </div>
                        <div class="form-group mx-sm-5">
                            <button type="submit" class="btn btn-blue btn-lg  ingresar " id="enviar" ><i
                                class="fas fa-sign-in-alt"></i>  Iniciar Sesión</button>
                        </div>
                        <div>
                            <a class="reg font-weight-bold" href="index.php">Regresar</a>
                        </div>
                    </form>
                        <script src="user.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>


</html>