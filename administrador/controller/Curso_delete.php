<?php
    include ("../../connect/conectar.php");
    if (isset($_GET['clave'])){    
        $clave = $_GET['clave'];
        
        $delete = "DELETE FROM curso WHERE clave = '$clave'";
        #delete from curso where clave='001'; delete from curso where clave='001';
        if (mysqli_query($conexion, $delete)){
            $messaget = "CURSO BORRADO CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../tabla_curso.php';
                    </script>";
        }else{
            $messaget = "CURSO ACTUAL EN DESARROLLO";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../tabla_curso.php';
                    </script>";
            #echo "Error al borrar registro: " . mysqli_error($conexion);
        }
    }
?>