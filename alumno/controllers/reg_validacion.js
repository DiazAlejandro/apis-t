function validar_formulario() {


}

function iniciar() {
    valedad = document.getElementById("edad");
    valedad.addEventListener("change", validarEdad, true);
    valnombre = document.getElementById("nombre");
    valnombre.addEventListener("change", validarNombre, true);
    valApellidoP = document.getElementById("apellidoP");
    valApellidoP.addEventListener("change", validarApellidoP, true);
    valApellidoM = document.getElementById("apellidoM");
    valApellidoM.addEventListener("change", validarApellidoM, true);
    valFecha = document.getElementById("fecha_nac");
    valFecha.addEventListener("change", validarFecha, true);
    valMedioE = document.getElementById("medioE");
    valMedioE.addEventListener("change", validarMedioE, true);
    valTelefono = document.getElementById("telefono");
    valTelefono.addEventListener("change", validarTelefono, true);
    valCp = document.getElementById("cp");
    valCp.addEventListener("change", validarCP, true);
    valCalle = document.getElementById("calle");
    valCalle.addEventListener("change", validarCalle, true);
    valColonia = document.getElementById("colonia");
    valColonia.addEventListener("change", validarCalle, true);
    valMunicipio = document.getElementById("municipio");
    valMunicipio.addEventListener("change", validarMunicipio, true);


    document.informacion.addEventListener("invalid", validacion, true);
    document.getElementById("boton").addEventListener("click", enviar, false);
    
}


function validarSeguro(){ 
    console.log("Please Select Your Gender");

}

function validacion(e) {
    var elemento = e.target; //Referencia al objeto que ha  generado el evento
    elemento.style.background = '#FFDDDD';
}

function enviar() {
    var valido = document.informacion.checkValidity();
    if (valido) {
        document.informacion.submit();
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

function validarNombre() {
    var name = document.getElementById('nombre').value;
    var curp = document.getElementById('curp').value;
    if (name == "") {
        valnombre.style.background = '#FFDDDD';
    } else {
        if (curp.charAt(3) == name.charAt(0)) {
            valnombre.style.background = '#FFFFFF';
        } else {
            $('#nombreModal').modal('show');
            valnombre.style.background = '#FFDDDD';
            valnombre.value = "";
        }
    }
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
        valApellidoP.style.background = '#FFDDDD';
    } else {
        if (curp == iniciales) {
            valApellidoP.style.background = '#FFFFFF';
        } else {
            $('#ApellidoPModal').modal('show');
            valApellidoP.style.background = '#FFDDDD';
            valApellidoP.value = "";
        }

    }
}

function validarApellidoPT() {
    var ap1 = document.getElementById('apellidoPT').value;
    var curp = document.getElementById('curp_tutor').value.substring(0, 2);
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
        document.getElementById('apellidoPT').style.background = '#FFDDDD';
    } else {
        if (curp == iniciales) {
            document.getElementById('apellidoPT').style.background = '#FFFFFF';
        } else {
            $('#ApellidoPModal').modal('show');
            document.getElementById('apellidoPT').style.background = '#FFDDDD';
            document.getElementById('apellidoPT').value = "";
        }

    }
}

function validarApellidoM() {
    var ap2 = document.getElementById('apellidoM').value;
    var curp = document.getElementById('curp').value.substring(2, 3);
    var app = document.getElementById('apellidoM').value.substring(0, 1);
    if (ap2 == "") {
        valApellidoM.style.background = '#FFDDDD';
    } else {
        if (curp == app) {
            valApellidoM.style.background = '#FFFFFF';
        } else {
            $('#ApellidoMModal').modal('show');
            valApellidoM.style.background = '#FFDDDD';
            valApellidoM.value = "";
        }

    }
}


function validarApellidoMT() {
    var ap2 = document.getElementById('apellidoMT').value;
    var curp = document.getElementById('curp_tutor').value.substring(2, 3);
    var app = document.getElementById('apellidoMT').value.substring(0, 1);
    if (ap2 == "") {
        document.getElementById('apellidoMT').style.background = '#FFDDDD';
    } else {
        if (curp == app) {
            document.getElementById('apellidoMT').style.background = '#FFFFFF';
        } else {
            $('#ApellidoPModal').modal('show');
            document.getElementById('apellidoMT').style.background = '#FFDDDD';
            document.getElementById('apellidoMT').value = "";
        }

    }
}


function validarEdad() {
    var ve = valedad.value;
    const regex = /^[0-9]*$/;
    const numero = regex.test(ve);
    if (!numero || ve < 18) {
        $('#edadModal').modal('show');
        valedad.value = "";
        valedad.style.background = '#FFDDDD';
    } else {
        valedad.style.background = '#FFFFFF';
    }
}

function validarCurpTutor() {
    var curp = document.getElementById('curp_tutor').value;
    curp.toUpperCase();
    if (!curpValida(curp)) {
        $('#curpModal').modal('show');
        document.getElementById('curp_tutor').value = "";
        document.getElementById('curp_tutor').style.background = '#FFDDDD';
    } else {
        document.getElementById('curp_tutor').style.background = '#FFFFFF';
    }

    console.log(curp);
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

function validarFecha() {
    if (valFecha.value == "") {
        console.log("Fecha vacía");
        valFecha.style.background = '#FFDDDD';
        //$('#fechaModal').modal('show');
    } else {
        var dateSelected = valFecha.value.substring(2, 4) + "" + valFecha.value.substring(5, 7) + "" + valFecha.value.substring(8, 11);
        var curp = document.getElementById('curp').value.substring(4, 10);
        if (dateSelected == curp) {
            valFecha.style.background = '#FFFFFF';
        } else {
            $('#fechaCurpModal').modal('show');
            valFecha.style.background = '#FFDDDD';
            valFecha.value = "";
        }
    }
}

function validarMedioE() {
    if (valMedioE.value == 'Seleccione') {
        $('#validarMedioE').modal('show');
        valMedioE.style.background = '#FFDDDD';
        valMedioE.focus();
    } else {
        valMedioE.style.background = '#FFFFFF';
    }
}

function validarTelefono() {
    const regex = /^[0-9]*$/;
    const numero = regex.test(valTelefono.value);

    if (!numero || valTelefono.value.length < 10 || valTelefono.value.length > 10) {
        valTelefono.value = "";
        valTelefono.style.background = '#FFDDDD';
        valTelefono.focus();
        $('#validarTelefono').modal('show');
    } else {
        valTelefono.style.background = '#FFFFFF';
    }
}

function validarTelefonoT() {
    const regex = /^[0-9]*$/;
    const numero = regex.test(document.getElementById("tel1").value);

    if (!numero || document.getElementById("tel1").value.length < 10 || document.getElementById("tel1").value.length > 10) {
        document.getElementById("tel1").value = "";
        document.getElementById("tel1").style.background = '#FFDDDD';
        document.getElementById("tel1").focus();
        $('#validarTelefono').modal('show');
    } else {
        document.getElementById("tel1").style.background = '#FFFFFF';
    }
}

function validarCP() {
    const regex = /^[0-9]*$/;
    const numero = regex.test(valCp.value);

    if (!numero || valCp.value.length < 5 || valCp.value.length > 5) {
        valCp.value = "";
        valCp.style.background = '#FFDDDD';
        valCp.focus();
        $('#validaCp').modal('show');
    } else {
        valCp.style.background = '#FFFFFF';
    }
}



function validarCalle() {
    if (valCalle.value == "") {
        $('#campoObligatorioModal').modal('show');

        valCalle.style.background = '#FFDDDD';
    } else {
        valCalle.style.background = '#FFFFFF';
    }
}

function validarMunicipio() {
    if (valMunicipio.value == "") {
        $('#campoObligatorioModal').modal('show');

        valMunicipio.style.background = '#FFDDDD';
    } else {
        valMunicipio.style.background = '#FFFFFF';
    }
}

function validarColonia() {
    if (valColonia.value == "") {
        $('#campoObligatorioModal').modal('show');

        valColonia.style.background = '#FFDDDD';
    } else {
        valColonia.style.background = '#FFFFFF';
    }
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
        validar_formulario();
    } catch (error) {
        console.log(error);
        console.log("Error - Cargando Datos");
    }
}

window.addEventListener("load", iniciar, false);