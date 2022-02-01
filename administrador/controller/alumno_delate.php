<?php
include("../../connect/conectar.php");

if (isset($_GET['curp'])) {

    $curp = $_GET['curp'];
    #select de las inscripciones del alumno con la curp
    $resultado = mysqli_query($conexion, "SELECT * FROM inscripcion WHERE alumno_curp = $curp");
    #si no tiene ninguna inscripcion se eliminara de lo contrario el alumno seguira registrado
    if (!$resultado) {

        #Delate al estado de salud del alumno
        $delete = "DELETE FROM estado_salud WHERE alumno_curp = '$curp'";
        #Si se borro se hara lo siguiete 
        if (mysqli_query($conexion, $delete)) {
            #delate al alumno
            $deleteAlum = "DELETE FROM alumno WHERE curp = '$curp'";
            #Si se borro se hara lo siguiente
            if (mysqli_query($conexion, $deleteAlum)) {

                if (isset($_GET['email'])) {
                    $email = $_GET['email'];

                    #Delate al usuario del alumno
                    $deleteUser = "DELETE FROM usuario WHERE email = '$email'";

                    
                    if (mysqli_query($conexion, $deleteUser)) {


                        if (isset($_GET['tutor_curp'])) {
                            $tutor_curp =$_GET['tutor_curp'];
                            #Verificar si el alumno tiene un tutor 
                            if($tutor_curp!=null){
                                #select al tutor del alumno
                                $resultadoTutor = mysqli_query($conexion, "SELECT * FROM instructor WHERE curp = '$tutor_curp'");
                                $correo_electronico = '';

                                if ($resultadoTutor) {
                                    #obtener email del tutor
                                    if (mysqli_num_rows($resultadoTutor) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultadoTutor)) {
                                        $correo_electronico = $fila['correo_electronico'];
                                        }
                                    }
                                }
                                #delate al tutor

                                $deleteTutor = "DELETE FROM tutor WHERE curp = '$tutor_curp'";
                                if (mysqli_query($conexion, $deleteTutor)) {

                                    if($correo_electronico!=''){
                                        #delate al usuario del tutor
                                        $deleteUserT = "DELETE FROM user WHERE email = '$correo_electronico'";
                                        

                                        if (mysqli_query($conexion, $deleteUserT)) {
                                            $messaget = "SE ELIMINÓ AL ALUMNO CORRECTAMENTE";
                                    echo "<script type='text/javascript'>
                                                alert('$messaget');
                                                window.location.href = '../tabla_alumno.php';
                                            </script>";

                                        }else {
                                            $messaget = "ERROR AL ELIMINAR EL USUAIO DEL TUTOR";
                                            echo "<script type='text/javascript'>
                                                        alert('$messaget');
                                                        window.location.href = '../tabla_alumno.php';
                                                    </script>";
                                        }

                                    }

                                }else {
                                    $messaget = "ERROR AL ELIMINAR EL TUTOR";
                                    echo "<script type='text/javascript'>
                                                alert('$messaget');
                                                window.location.href = '../tabla_alumno.php';
                                            </script>";
                                }
                            }else {
                                $messaget = "SE ELIMINÓ AL ALUMNO CORRECTAMENTE";
                                echo "<script type='text/javascript'>
                                            alert('$messaget');
                                            window.location.href = '../tabla_alumno.php';
                                        </script>";
                            }
                            
                        }
                    } else {
                        $messaget = "USUARIO ACTUAL ACTIVO";
                        echo "<script type='text/javascript'>
                                    alert('$messaget');
                                    window.location.href = '../tabla_alumno.php';
                                </script>";
                    }
                }

            } else {
                $messaget = "ALUMNO ACTUAL INSCRITO EN CURSOS ";
                echo "<script type='text/javascript'>
                                alert('$messaget');
                                window.location.href = '../tabla_alumno.php';
                            </script>";
            }

        } else {
            $messaget = "ERROR ESTADO DE SALUD ALUMNO";
            echo "<script type='text/javascript'>
                            alert('$messaget');
                            window.location.href = '../tabla_alumno.php';
                        </script>";
        }

    } else {
        $messaget = "ALUMNO ACTUAL ESTA INSCRITO EN UN CURSO";
        echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../tabla_alumno.php';
                    </script>";
    }
}
?>