<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de Instructor</title>
</head>

<body>
    <!-- Contenido-->
    <h4>Nuevo Instructor</h4>
    <form action="../recepcionista/controller/Instructor.php" method="post">

        <div class="row">
            <label >Nombre: <span >*</span></label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre">
        </div>

        <div class="row">
            <label>Apellido paterno: <span>*</span></label>
            <input type="text" name="apellido_p" class="form-control" placeholder="Ingrese apellido paterno">
        </div>
        
        <div class="row">
            <label >Apellido materno: <span>*</span></label>
            <input type="text" name="apellido_m" class="form-control" placeholder="Ingrese apellido materno">
        </div>

        <div class="row">
            <label >CURP:<span>*</span></label>
            <input type="text" name="curp" class="form-control" placeholder="Ingrese curp">
        </div>

        <div class="row">
            <label>Teléfono: <span>*</span></label>
            <input type="text" name="telefono" class="form-control" placeholder="Ingrese su número de teléfono">
        </div>

        <div class="row">
            <label>Correo electrónico <span>*</span></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo electrónico">
        </div>

        <button type="submit" value="Registrarse">Registrar</button>
        <a href="index.php" role="button">Regresar</a>
    </form>
</body>
</html>