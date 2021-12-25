<?php
    include("../../connect/conectar.php");
    //Datos del Curso 
    $old_clave=(isset($_POST['old_clave']))?$_POST['old_clave']:"";
    $txtclave=(isset($_POST['txtclave']))?$_POST['txtclave']:"";
    $txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
    $txtasesor=(isset($_POST['txtasesor']))?$_POST['txtasesor']:"";
    $txtcoste=(isset($_POST['txtcoste']))?$_POST['txtcoste']:"";
    $txtduracion=(isset($_POST['txtduracion']))?$_POST['txtduracion']:"";
    $timehora=(isset($_POST['timehora']))?$_POST['timehora']:"";
    $txtperiodo=(isset($_POST['txtperiodo']))?$_POST['txtperiodo']:"";
    $acccion=(isset($_POST['acccion']))?$_POST['acccion']:"";
       
    $sqlCurso= "UPDATE curso 
                SET clave ='$txtclave', 
                    nombre = '$txtnombre', 
                    duracion = '$txtduracion', 
                    hora = '$timehora', 
                    periodo_pago = '$txtperiodo', 
                    costo = '$txtcoste',
                    instructor_curp = '$txtasesor'
                WHERE clave = '$old_clave'";
                
    if (mysqli_query($conexion,$sqlCurso)){
        $messagec = "EDICIÓN REALIZADA CORRECTAMENTE";
        echo "<script type='text/javascript'>
                alert('$messagec');
                window.location.href = '../tabla_curso.php';
            </script>";
        }else{
        $messagec = "NO SE PUDO EDITAR EL CURSO";
        echo "<script type='text/javascript'>
                alert('$messagec');
                window.location.href = '../editar_curso.php;
            </script>";
    }
?>