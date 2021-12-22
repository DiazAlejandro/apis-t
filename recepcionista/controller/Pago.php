<?php
    include("../../connect/conectar.php");
    //Datos del Pago 
   $folio=(isset($_POST['txtfolio']))?$_POST['txtfolio']:"";
    $fecha=(isset($_POST['txtfecha']))?$_POST['txtfecha']:"";
    $hora=(isset($_POST['timehora']))?$_POST['timehora']:"";
    $concepto=(isset($_POST['txtconcepto']))?$_POST['txtconcepto']:"";
    $alumno_curp=(isset($_POST['txtasesor']))?$_POST['txtasesor']:"";
    $acccion=(isset($_POST['acccion']))?$_POST['acccion']:"";
       
    $sqlPago = "INSERT INTO pago (folio,fecha,hora,concepto,alumno_curp) 
                    VALUES ('$folio','$fecha','$hora','$concepto','$alumno_curp')";

    if (mysqli_query($conexion,$sqlPago)){
        $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
        echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../reg_pagos.php';
            </script>";
    }else{
        $messagec = "NO SE AGREGÓ EL PAGO";
        echo "<script type='text/javascript'>
                alert('$messagec');
                window.location.href = '../reg_pagos.php';
            </script>";
    }
?>