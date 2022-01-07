<?php
    include("../../connect/conectar.php");
    $curp = filter_input(INPUT_POST, 'curp'); //obtenemos el parametro que viene de ajax
    if ($curp != '') { //verificamos nuevamente que sea una opcion valida     
        /*Obtenemos los discos de la banda seleccionada*/
        $consultaCursosA = 'SELECT  curso.nombre,
                                    curso.clave,
                                    inscripcion.folio
                                    FROM curso INNER JOIN inscripcion 
                                        ON curso.clave = inscripcion.curso_clave 
                                            INNER JOIN alumno
                                        ON inscripcion.alumno_curp = alumno.curp and alumno.curp = "' . $curp.'"';
        $resultado = mysqli_query($conexion, $consultaCursosA);

    }

?>
<option value="" selected="true" disabled="disabled">Seleccione el nombre del curso</option>
<?php
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $fila['folio'] . '">' . $fila['clave'] . ' '. $fila['nombre'].'</option>';
        }
    }
?>