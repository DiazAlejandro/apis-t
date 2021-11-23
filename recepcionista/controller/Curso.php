<?php
    include("../../connect/conectar.php");

    $txtclave=(isset($_POST['txtclave']))?$_POST['txtclave']:"";
    $txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
    $txtasesor=(isset($_POST['txtasesor']))?$_POST['txtasesor']:"";
    $txtcoste=(isset($_POST['txtcoste']))?$_POST['txtcoste']:"";
    $txtduracion=(isset($_POST['txtduracion']))?$_POST['txtduracion']:"";
    $timehora=(isset($_POST['timehora']))?$_POST['timehora']:"";
    $txtperiodo=(isset($_POST['txtperiodo']))?$_POST['txtperiodo']:"";
    $acccion=(isset($_POST['acccion']))?$_POST['acccion']:"";


    $sqlCurso = "INSERT INTO `curso`(`clave`, `nombre`, `duracion`, `hora`, `periodo_pago`, `costo`, `instructor_curp`) 
    VALUES ('$txtclave','$txtnombre','$txtduracion','$timehora','$txtperiodo','$txtcoste','$txtasesor')";

if (mysqli_query($conexion,$sqlCurso)){
    $messaget = "SE REGISTRO El CURSO CORRECTAMENTE";
            echo "<script type='text/javascript'>
                    alert('$messaget');
                    window.location.href = '../tabla_curso.php';
                </script>";
}else{
    $messagec = "NO SE AGREGÓ EL CURSO";
    echo "<script type='text/javascript'>
            alert('$messagec');
            window.location.href = '../registro_curso.php';
        </script>";
}
?>