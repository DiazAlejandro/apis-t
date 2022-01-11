<?php
    include("../connect/conectar.php");
    $sql = "SELECT ";

    $result = mysqli_query($conexion,$sql);
    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($result)){
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

?>

<div id="grafica_lineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed){
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
        type: 'scatter'
    };
    /** 
    var trace2 = {
        x: [1, 2, 3, 4],
        y: [16, 5, 11, 9],
        type: 'scatter'
    };*/

    var data = [trace1, trace2];

    Plotly.newPlot('grafica_lineal', data);
</script>