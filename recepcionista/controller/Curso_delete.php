<?php
    include ("../../connect/conectar.php");
    if (isset($_GET['clave'])){    
        $clave = $_GET['clave'];
        
        $delete = "DELETE FROM curso WHERE clave = $clave";
        #delete from curso where clave='001'; delete from curso where clave='001';
        if (mysqli_query($conexion, $delete)){
            $messaget = "CURSO BORRADO CORRECTAMENTE CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../apis-t/login.php';
                    </script>";
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:../tabla_curso.php'); # Redireccionar el archivo
        }else{
            $messaget = "CURSO ACTUAL EN DESARROLLO";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../apis-t/login.php';
                    </script>";
            #echo "Error al borrar registro: " . mysqli_error($conexion);
        }
    }
?>