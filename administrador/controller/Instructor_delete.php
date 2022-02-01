<?php
    include ("../../connect/conectar.php");
    if (isset($_GET['curp'])){    
        $curp = $_GET['curp'];
        
        $delete = "DELETE FROM instructor WHERE curp = '$curp'";
        #delete from curso where clave='001'; delete from curso where clave='001';
        if (mysqli_query($conexion, $delete)){
            $messaget = "INSTRUCTOR BORRADO CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../tabla_instructor.php';
                    </script>";
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:../tabla_instructor.php'); # Redireccionar el archivo
        }else{
            $messaget = "INSTRUCTOR ACTUAL EN DESARROLLO";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../tabla_instructor.php';
                    </script>";
            #echo "Error al borrar registro: " . mysqli_error($conexion);
        }
    }
?>