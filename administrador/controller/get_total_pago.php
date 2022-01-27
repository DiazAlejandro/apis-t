<?php
    include("../../connect/conectar.php");
    $folio_inscripcion = filter_input(INPUT_POST, 'folio_inscripcion'); //obtenemos el parametro que viene de ajax

    $suma_sql = 'SELECT SUM(concepto) AS suma FROM pago WHERE pago.folio_inscripcion = '.$fila['folio'].';';
    $resultado_sum = mysqli_query($conexion, $suma_sql);
?>
<option value="" selected="true" disabled="disabled">Mostar Total</option>
<?php
    if (mysqli_num_rows($resultado_sum) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado_sum)) {
            echo '<option value="' . $fila['suma'] . '">' . $fila['suma'].'</option>';
        }
    }
?>