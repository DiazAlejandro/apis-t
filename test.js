$(document).ready(function(){
    var inscripcion = $('#inscripcion');
    var alumno_sel = $('#alumno_sel');
    //Ejecutar accion al cambiar de opcion en el select de las bandas
    $('#curp_alumno').change(function(){
    var curp = $(this).val(); //obtener el id seleccionado
        
    if(curp !== ''){ //verificar haber seleccionado una opcion valida
        console.log(curp);
        /*Inicio de llamada ajax*/
        $.ajax({
        data: {curp:curp}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
        dataType: 'html', //tipo de datos que esperamos de regreso
        type: 'POST', //mandar variables como post o get
        url: '/apis-t/recepcionista/controller/get_cursos.php' //url que recibe las variables
        }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

        inscripcion.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
        inscripcion.prop('disabled', false); //habilitar el select
        });
        /*fin de llamada ajax*/

    }else{ //en caso de seleccionar una opcion no valida
        inscripcion.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
        inscripcion.prop('disabled', true); //deshabilitar el select
    }    
    });

    //mostrar una leyenda con el disco seleccionado
    $('#inscripcion').change(function(){
    $('#alumno_sel').html($(this).val() + ' - ' + $('#inscripcion option:selected').text());
    });

});