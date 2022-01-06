<?php
    include("../../connect/conectar.php");
    //Datos del Pago 
    $folio = (isset($_POST['txtfolio']))?$_POST['txtfolio']:"";
    $fecha = (isset($_POST['txtfecha']))?$_POST['txtfecha']:"";
    $hora = (isset($_POST['timehora']))?$_POST['timehora']:"";
    $concepto = (isset($_POST['txtconcepto']))?$_POST['txtconcepto']:"";
    $alumno_curp = (isset($_POST['txtasesor']))?$_POST['txtasesor']:"";
    
    $consultaExiste = "SELECT * FROM pago WHERE folio='$folio'";
    $resultadoExiste = mysqli_query($conexion, $consultaExiste);
    if (mysqli_num_rows($resultadoExiste)>0){
        //Existe
        $messaget = "YA EXISTE UN PAGO ASOCIADO A ESTE FOLIO";
        echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../reg_pagos.php';
            </script>";
    }else{
        $sqlPago = "INSERT INTO pago (folio,fecha,hora,concepto,alumno_curp) 
                    VALUES ('$folio','$fecha','$hora','$concepto','$alumno_curp')";

        if (mysqli_query($conexion,$sqlPago)){
            $estado = (isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
            $folioInscripcion = (isset($_POST['txtInscripcion']))?$_POST['txtInscripcion']:"";
            $descripcion = (isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
            $sqlDetallePago = "INSERT INTO detalle_pago (pago_folio,descripcion,estado,inscripcion_folio) 
                                VALUES ('$folio','$descripcion','$estado','$folioInscripcion')";

            if (mysqli_query($conexion,$sqlDetallePago)){
                $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../reg_pagos.php';
                    </script>";
                
            }
            
        }else{
            $messagec = "NO SE AGREGÓ EL PAGO";
            echo "<script type='text/javascript'>
                    alert('$messagec');
                    window.location.href = '../reg_pagos.php';
                </script>";
    }

    }

    
?>