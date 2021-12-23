<?php
    include("connect/conectar.php");
    //Datos del usuario 
    $curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $fecha_nac = $_POST['fecha_nac'];
    $genero = $_POST['genero'];
    $medio = $_POST['medioE'];
    $edad = $_POST['edad'];
    $telefono = "9999999999";
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $cp = $_POST['cp'];
    $estatus = "ACTIVO";
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rol_id = "3";
    

    $seguro_med = $_POST['seguro_med'];
    $servicio = $_POST['servicio'];
    $num_seguridad = $_POST['num_seguridad'];
    $estado = $_POST['estado'];
    $enfermedad = $_POST['enfermedad'];
    $covid = $_POST['covid'];
    $alergias = $_POST['alergias'];
    $prescripcion = $_POST['prescripcion'];
    $observaciones = $_POST['observaciones'];

    $tutor_curp = $_POST['curp_tutor'];
    $nombre_tutor = $_POST['nombre_tutor'];
    $apellido_p_tutor = $_POST['apellido_p_tutor'];
    $apellido_m_tutor = $_POST['apellido_m_tutor'];
    $parentesco = $_POST['parentesco'];
    $telefono1 = $_POST['telefono1'];
    $telefono2 = $_POST['telefono2'];

    $sqlUsuario = "INSERT INTO usuario(email, pass, rol_id)
                    VALUES('$email',SHA1('$pass'),'$rol_id')";
    $executeSQLDireccion = mysqli_query($conexion,$sqlUsuario);

    if ($executeSQLDireccion == 1){
        $sqlTutor = "INSERT INTO tutor (curp, nombre, apellido_p, apellido_m, parentesco, telefono, telefono_adicional, email)
                    VALUES ('$tutor_curp','$nombre_tutor','$apellido_p_tutor','$apellido_m_tutor','$parentesco','$telefono1','$telefono2','$email')";
        $executeSQLTutor = mysqli_query($conexion,$sqlTutor);  
        if($executeSQLTutor == 1){
            $sqlAlumno = "INSERT INTO `alumno` (`curp`, `nombre`, `apellido_p`, `apellido_m`, `fecha_nac`, `sexo`, `edad`, `telefono`, `medio`, `calle`, `colonia`, `municipio`, `cp`, `estatus`, `tutor_curp`, `email`) 
                        VALUES ('$curp', '$nombre', '$apellido_m', '$apellido_p', '$fecha_nac', '$genero', '$edad', '$telefono', '$medio', '$calle', '$colonia', '$municipio', '$cp', '$estatus', '$tutor_curp','$email')";
            $executeSQLAlumno = mysqli_query($conexion,$sqlAlumno);
        } 
        if ($executeSQLAlumno == 1){
            $sqlEstadoSalud = "INSERT INTO estado_salud (seguro_med, servicio, num_seguridad, estado, enfermedad, covid, alergias, prescripcion, observaciones, alumno_curp )
                                                VALUES('$seguro_med','$servicio','$num_seguridad','$estado','$enfermedad','$covid','$alergias','$prescripcion','$observaciones','$curp')";
            $executeSQLEstadoSalud = mysqli_query($conexion,$sqlEstadoSalud);  
            if ($executeSQLEstadoSalud == 1){
                $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../apis-t/login.php';
                    </script>";
            }else{
                $messagec = "NO SE AGREGÓ EL ALUMNO";
                echo "<script type='text/javascript'>
                        alert('$messagec');
                        window.location.href = '../registro.php';
                    </script>";
            }                              
        }else{            
        }
    }
?>