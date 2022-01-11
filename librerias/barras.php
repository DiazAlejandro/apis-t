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
datosY = crearCadenaLineal('<?php echo $datosY ?>');
var data = [{
  values: datosY,
  labels: ['Mujeres', 'Hombres'],
  type: 'pie',
  marker: {
      colors: [
        'rgb(230, 176, 223)',
        'rgb (119,167,255)',
        'rgb(118, 17, 195)',
        'rgb(0, 48, 240)',
        'rgb(240, 88, 0)',
        'rgb(215, 11, 11)',
        'rgb(11, 133, 215)',
        'rgb(0, 0, 0)',
        'rgb(0, 0, 0)',
        'rgb(0, 0, 0)'
      ]
    }
}];

var layout = {
  height: 450,
  width: 600
};

Plotly.newPlot('graficaBarras', data, layout);

</script>