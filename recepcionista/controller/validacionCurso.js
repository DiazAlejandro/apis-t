window.addEventListener("load", iniciar, false);

function iniciar(){

    valcosto = document.getElementById("costo");
    valcosto.addEventListener("change", validarCosto, true);
}

function validarCosto(){
    var costo = document.getElementById("costo").value;
    if (validarEntradaCosto(costo)){

    }else{
        console.log("Datos erroneos");
    }

}


function validarEntradaCosto(costo) {
    const regex = /^[0-9]*$/;
    const numero = regex.test(costo);

    if (!numero || costo.length <= 0) {
        return false
    } else {
        return true
    }
}

function validarNombreT() {
    var name = document.getElementById('nombreT').value;
    var curp = document.getElementById('curp_tutor').value;
    if (name == "") {
        document.getElementById('nombreT').style.background = '#FFDDDD';
    } else {
        if (curp.charAt(3) == name.charAt(0)) {
            document.getElementById('nombreT').style.background = '#FFFFFF';
        } else {
            $('#nombreModal').modal('show');
            document.getElementById('nombreT').style.background = '#FFDDDD';
            document.getElementById('nombreT').value = "";
        }
    }
}