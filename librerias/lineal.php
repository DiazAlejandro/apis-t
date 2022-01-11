<?php
    include("../connect/conectar.php");
    $sql = "SELECT SUM(concepto), fecha FROM pago GROUP BY fecha";

    $result = mysqli_query($conexion, $sql);
    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($result)) {
        $valoresY[] = $ver[0];
        $valoresX[] = $ver[1];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

?>

<div id="grafica_lineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">
    datosX = crearCadenaLineal('<?php echo $datosX ?>');
    datosY = crearCadenaLineal('<?php echo $datosY ?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'bar',
        marker: {
            color: 'rgb(158,202,225)',
            line: {
                color: 'rgb(8,48,107)',
                width: 1.5
            }
        }
    };
    /** 
    var trace2 = {
        x: [1, 2, 3, 4],
        y: [16, 5, 11, 9],
        type: 'scatter'
    };*/

    var data = [trace1];

    Plotly.newPlot('grafica_lineal', data);
</script>