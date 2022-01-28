<?php
    require_once('../vendor/autoload.php');
    include("../connect/conectar.php");
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } else {
        if ($_SESSION['rol'] != 2) {
            header('location: ../login.php');
        }
    }
    $curp = $_GET['curp'];

    $consultaCumplimiento = "SELECT 
            alumno.nombre as nameAlumno, 
            alumno.apellido_p, 
            alumno.apellido_m, 
            alumno.curp, 
            inscripcion.fecha_inicio, 
            inscripcion.fecha_fin, 
            inscripcion.folio, 
            curso.clave, 
            curso.nombre 
        FROM inscripcion INNER JOIN alumno 
            ON inscripcion.alumno_curp = alumno.curp AND alumno.curp = '".$curp."'
            INNER JOIN curso 
            ON inscripcion.curso_clave = curso.clave";

    $resultado = mysqli_query($conexion,$consultaCumplimiento);
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' ;
        exit;
    }
    $fila = mysqli_fetch_assoc($resultado);

    // Obteniendo la fecha actual del sistema con PHP
    $year = date('Y');
    $month = date('m');
    $day = date('d');

    $mes = '';
    if ($month == 1) $mes = 'enero';
    if ($month == 2) $mes = 'febrero';
    if ($month == 3) $mes = 'marzo';
    if ($month == 4) $mes = 'abril';
    if ($month == 5) $mes = 'mayo';
    if ($month == 6) $mes = 'junio';
    if ($month == 7) $mes = 'julio';
    if ($month == 8) $mes = 'agosto';
    if ($month == 9) $mes = 'septiembre';
    if ($month == 10) $mes = 'octubre';
    if ($month == 11) $mes = 'noviembre';
    if ($month == 12) $mes = 'diciembre';


    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $mpdf->WriteHTML('

    <body style="font-family: Arial; font-size: 15pt;">
        <div style="align-items: center; text-align: center;"> 
        <img src="../img/headerCons.png">
        <p>El Instituto APIS-T otorga la presente <br>
            </p>
            <h3>CONSTANCIA</h3> 
            <p>A: '.$fila['nameAlumno'].' '.$fila['apellido_p'].' '.$fila['apellido_m'].'<br><br>
            Por haber concluido satisfatoriamente el curso denominado: </p>
            <h3>'.$fila[nombre].'</h3>
            <p>En un periodo comprendido del '.$fila['fecha_inicio'].' al '.$fila['fecha_fin'].' <br><br>
            Se expide la presente en la Ciudad de Oaxaca de Juárez, Oax. a los '.$day.' días de '.$mes.' de '.$year.'</p>
            <img src="../img/firma.png">
            <p>Nombre de la directora <br>Directora de la Institución</p>
            </div>
    </body>
    ');
    $mpdf->Output();
?>