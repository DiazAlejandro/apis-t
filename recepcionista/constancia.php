<?php
    require_once('../vendor/autoload.php');
    include("../connect/conectar.php");
    
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

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<div style="align-items: center; text-align: center;"> 
    <p>El Instituto APIS-T <br>
        Otorga la presente <br>
        </p>
        <h3>CONSTANCIA</h3> 
        <p>A: '.$fila['nameAlumno'].' '.$fila['apellido_p'].' '.$fila['apellido_m'].'<br><br>
        Por haber concluido satisfatoriamente el curso denominado: </p><br>
        <h3>'.$fila[nombre].'</h3> <br> 
        <p>En un periodo comprendido del '.$fila['fecha_inicio'].' al '.$fila['fecha_fin'].' <br><br>
        Se expide la presente en la Ciudad de Oaxaca de Juárez, Oax. a los 26 días del mes de diciembre del 2021</p></div>
   ');
    $mpdf->Output();
?>