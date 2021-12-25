<?php
    session_start();
    include ("../../connect/conectar.php");
    if (isset($_GET['clave'])){    
        $clave = $_GET['clave'];
        $curpA = "";
        //Obtener curp del alumno
        $alumno = mysqli_query($conexion,"SELECT curp FROM alumno WHERE email='".$_SESSION['email']."'");
        if (mysqli_num_rows($alumno) > 0) {
        while ($alf = mysqli_fetch_assoc($alumno)) {
            $curpA = $alf['curp'];
        }
        //Obtener duración del curso
        $duracionC = "";
        $duracion = mysqli_query($conexion,"select duracion from curso where clave ='".$clave."'");
        if (mysqli_num_rows($duracion) > 0) {
            while ($durc = mysqli_fetch_assoc($duracion)) {
                $duracionC = $durc['duracion'];
            }
        }

        $fecha_actual = date("Y-m-d");
        $fecha_final = date("Y-m-d",strtotime($fecha_actual."+ ".$duracionC." week")); 

        //echo "The current date and time are $DateAndTime.";
        //echo $clave." ".$curpA." ".$fecha_actual." ".$duracionC;
        //echo $fecha_final;

        $folio=mt_rand(1,99999);

        $sqlInscribir = "INSERT INTO `inscripcion`(`folio`, `fecha_inicio`, `fecha_fin`, `alumno_curp`, `curso_clave`) 
                    VALUES ('$folio','$fecha_actual','$fecha_final','$curpA','$clave')";
                    //echo $sqlInscribir;

        if (mysqli_query($conexion,$sqlInscribir)){
            $messaget = "INSCRIPCIÓN REALIZADA CORRECTAMENTE";
                    echo "<script type='text/javascript'>
                            alert('$messaget');
                            window.location.href = '../inicio.php';
                        </script>";
        }else{
            $messagec = "ERROR AL INSCRIBIR";
            echo "<script type='text/javascript'>
                    alert('$messagec');
                    window.location.href = '../inscribir_curso.php';
                </script>";
        }
    }
    }
?>