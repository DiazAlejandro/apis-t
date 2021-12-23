function iniciar() {
    
}

function validarApellidoP() {
    var ap1 = document.getElementById('apellidoP').value;
    var curp = document.getElementById('curp').value.substring(0, 2);
    var primerV = "";
    var cons = "";
    var regexVocal = /^[aeiouAEIOU].*/i;
    var regexConso = /^[BCDFGHJKLMNÑPQRSTVWXYZbcdfghjklmnñpqrstvwxyz].*/i;
    for (var i = 0; i < ap1.length; i++) {
        if (ap1.charAt(i).match(regexVocal)) {
            primerV = primerV + ap1.charAt(i);
        }
        if (ap1.charAt(i).match(regexConso)) {
            cons = cons + ap1.charAt(i);
        }
    }

    var iniciales = cons.charAt(0) + primerV.charAt(0);
    console.log("INICIALES: " + iniciales);
    if (ap1 == "") {
        document.getElementById('apellidoP').style.background = '#FFDDDD';
    } else {
        if (curp == iniciales) {
            document.getElementById('apellidoP').style.background = '#FFFFFF';
        } else {
            $('#ApellidoPModal').modal('show');
            document.getElementById('apellidoP').style.background = '#FFDDDD';
            document.getElementById('apellidoP').value = "";
        }

    }
}

function validarApellidoM() {
    var ap2 = document.getElementById('apellidoM').value;
    var curp = document.getElementById('curp').value.substring(2, 3);
    var app = document.getElementById('apellidoM').value.substring(0, 1);
    if (ap2 == "") {
        document.getElementById('apellidoM').style.background = '#FFDDDD';
    } else {
        if (curp == app) {
            document.getElementById('apellidoM').style.background = '#FFFFFF';
        } else {
            $('#ApellidoMModal').modal('show');
            document.getElementById('apellidoM').style.background = '#FFDDDD';
            document.getElementById('apellidoM').value = "";
        }

    }
}

function validarTelefonoT() {
    const regex = /^[0-9]*$/;
    const numero = regex.test(document.getElementById("telefono").value);

    if (!numero || document.getElementById("telefono").value.length < 10 || document.getElementById("telefono").value.length > 10) {
        document.getElementById("telefono").value = "";
        document.getElementById("telefono").style.background = '#FFDDDD';
        document.getElementById("telefono").focus();
        $('#validarTelefono').modal('show');
    } else {
        document.getElementById("telefono").style.background = '#FFFFFF';
    }
}

function validarNombre() {
    var name = document.getElementById('nombre').value;
    var curp = document.getElementById('curp').value;
    if (name == "") {
        document.getElementById('nombre').style.background = '#FFDDDD';
    } else {
        if (curp.charAt(3) == name.charAt(0)) {
            document.getElementById('nombre').style.background = '#FFFFFF';
        } else {
            $('#nombreModal').modal('show');
            document.getElementById('nombre').style.background = '#FFDDDD';
            document.getElementById('nombre').value = "";
        }
    }
}


function validarCurp() {
    var curp = document.getElementById('curp').value;
    curp.toUpperCase();
    if (!curpValida(curp)) {
        $('#curpModal').modal('show');
        document.getElementById('curp').value = "";
        document.getElementById('curp').style.background = '#FFDDDD';
    } else {
        document.getElementById('curp').style.background = '#FFFFFF';
    }

    console.log(curp);
}

function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
        return false;

    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma = 0.0,
            lngDigito = 0.0;
        for (var i = 0; i < 17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }

    if (validado[2] != digitoVerificador(validado[1]))
        return false;

    return true; //Validado
}

window.onload = function () {
    try {
        
        //validar_formulario();
    } catch (error) {
        console.log(error);
        console.log("Error - Cargando Datos");
    }
}

window.addEventListener("load", iniciar, false);