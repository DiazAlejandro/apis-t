<?php
    include("../connect/conectar.php");
    $sql = "SELECT sexo, COUNT(*) FROM alumno GROUP BY sexo";

    $result = mysqli_query($conexion, $sql);
    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($result)) {
        $valoresY[] = $ver[1];
        $valoresX[] = $ver[0];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

?>

<div id="graficaBarras"></div>

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
    var data = [{
        x: datosX,
        y: datosY,
        type: 'bar',
        marker: {
            color: 'blue'
        }
    }];

    Plotly.newPlot('graficaBarras', data);
</script>