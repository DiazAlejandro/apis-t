<?php
include("../connect/conectar.php");
$sql = "SELECT SUM(concepto), fecha FROM pago WHERE fecha BETWEEN '2022-02-01' AND '2022-02-28'";

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
            color: 'rgb(68,204,31)'
        }
    };

    var trace2 = {
        x: datosX,
        y: datosY,
        type: 'scatter'
    };
    /** 
    var trace2 = {
        x: [1, 2, 3, 4],
        y: [16, 5, 11, 9],
        type: 'scatter'
    };*/

    var data = [trace1, trace2];
    var layout = {
        title: 'Ingresos mensuales correspondientes al mes vigente',
        font: {
            size: 13
        },
        xaxis: {
            title: 'Fecha de ingresos',
            titlefont: {
                color: 'black',
                size: 12
            },
            rangemode: 'tozero'
        },
        yaxis: {
            title: 'Cantidades ($)',
            titlefont: {
                color: 'black',
                size: 12
            },
            rangemode: 'tozero'
        }
    };
    var config = {
        responsive: true
    }
    Plotly.newPlot('grafica_lineal', data, layout, config);
</script>