$(document).ready(function() {
    $.when(
        $.ajax({
        type: "GET",
        url: "resources/php/capaNegocios/configuracionCargar.php",
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            obj = JSON.parse(response);
            console.log(obj);
            if(obj["datosPrivados"] == 'Y'){
                $('#cbPrivacidad').prop('checked', true);
            }

        },
        error: function( jqXHR, textStatus, errorThrown ) {
            if (jqXHR.status === 0) {
                console.log('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                console.log('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                console.log('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                console.log('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                console.log('Time out error.');
            } else if (textStatus === 'abort') {
                console.log('Ajax request aborted.');
            } else {
                console.log('Uncaught Error: ' + jqXHR.responseText);
            }
            salida = false;
        }
    })
    ).done(
        
    );
});
$('#cbMostrarContra').click(function () {
    if($('#txtContra1').attr('type') == "password"){
        $('#txtContra1').attr('type', 'text');
        $('#txtContra2').attr('type', 'text');
    }
    else{
        $('#txtContra1').attr('type', 'password');
        $('#txtContra2').attr('type', 'password');
    }
});
$("#formInfoPersonal").submit(function () {
    let correo = $("#txtCorreo").val();
    let telefono = $("#txtTelefono").val();
    let nombres = $("#txtNombres").val();
    let apellidos = $("#txtApellidos").val();
    if(correo != "" || telefono != "" || nombres != "" || apellidos != ""){
        error = "";
        if(telefono != ""){
            if(!$.isNumeric(telefono)){
                error += "El campo telefono solo debe incluir números.\n";
            }
        }
        if(nombres != ""){
            if(!/^[A-Za-záéíóuÁÉÍÓÚ]+(\s[A-Za-záéíóuÁÉÍÓÚ]+)*$/.test(nombres)){
                error += "El campo nombres esta incorrecto.\n";
            }
        }
        if(apellidos != ""){
            if(!/^[A-Za-záéíóuÁÉÍÓÚ]+(\s[A-Za-záéíóuÁÉÍÓÚ]+)*$/.test(apellidos)){
                error += "El campo apellidos esta incorrecto.\n";
            }
        }
        if(error != ""){
            alert(error);
            return false;
        }
        var datos = $("#formInfoPersonal").serializeArray();
        $.when(
            $.ajax({
            type: "POST",
            url: "resources/php/capaNegocios/configuracionCambiarInfo.php",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
                if(response == 1){
                    alert("Los cambios solicitados ya estan guardados.");
                }
                else{
                    if(nombres != "")
                        $("#welcome").text("Bienvenido: "+nombres);
                    $("#txtCorreo").val("");
                    $("#txtTelefono").val("");
                    $("#txtNombres").val("");
                    $("#txtApellidos").val("");
                    alert("El cambio se ha realizado con exito.");
                }
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                if (jqXHR.status === 0) {
                    console.log('Not connect: Verify Network.');
                } else if (jqXHR.status == 404) {
                    console.log('Requested page not found [404]');
                } else if (jqXHR.status == 500) {
                    console.log('Internal Server Error [500].');
                } else if (textStatus === 'parsererror') {
                    console.log('Requested JSON parse failed.');
                } else if (textStatus === 'timeout') {
                    console.log('Time out error.');
                } else if (textStatus === 'abort') {
                    console.log('Ajax request aborted.');
                } else {
                    console.log('Uncaught Error: ' + jqXHR.responseText);
                }
                salida = false;
            }
        })
        ).done(
            function () {
                return false;
            }
        ); 
    }
    else{
        alert("Los campos requeridos estan en blanco. Debe de llenar al menos 1.");
    }
    return false;        
});
$('#cbPrivacidad').click(function () {
    $.when(
        $.ajax({
        type: "GET",
        url: "resources/php/capaNegocios/configuracionPrivacidad.php",
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            alert("Se han modificado la privacidad de sus datos.");
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            if (jqXHR.status === 0) {
                console.log('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                console.log('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                console.log('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                console.log('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                console.log('Time out error.');
            } else if (textStatus === 'abort') {
                console.log('Ajax request aborted.');
            } else {
                console.log('Uncaught Error: ' + jqXHR.responseText);
            }
            salida = false;
        }
    })
    ).done(
        function () {

        }
    ); 
});
$('#formCC').submit(function () {
    var error = "";
    let contra1 = $('#txtContra1').val();
    let contra2 = $('#txtContra2').val();
    if(contra1.length >= 8 && contra1.length < 20){
        /* if(/^[0-9]+$/.test(contra1)){
            alert('1 '+ contra1);
        }
        if(/^[A-Z]+$/.test(contra1)){
            alert('2 '+ contra1);
        }
        if(/^[a-z]+$/.test(contra1)){
            alert('3 '+ contra1);
        }
        if(/^[\s!"#$%&'()*+,-.\/:;<=>?@\\^_`|~]+$/.test(contra1)){
            alert('4 '+ contra1);
        }
        return false; */
        if(contra1 == contra2){

            var datos = $("#formCC").serializeArray();
            $.when(
                $.ajax({
                type: "POST",
                url: "resources/php/capaNegocios/configuracionCambiarContra.php",
                data: datos,
                contentType: "application/x-www-form-urlencoded",
                success: function(response)
                {
                    $('#txtContra1').val("");
                    $('#txtContra2').val("");
                    alert("La contraseña se ha cambiado con exito.");
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    if (jqXHR.status === 0) {
                      console.log('Not connect: Verify Network.');
                    } else if (jqXHR.status == 404) {
                      console.log('Requested page not found [404]');
                    } else if (jqXHR.status == 500) {
                      console.log('Internal Server Error [500].');
                    } else if (textStatus === 'parsererror') {
                      console.log('Requested JSON parse failed.');
                    } else if (textStatus === 'timeout') {
                      console.log('Time out error.');
                    } else if (textStatus === 'abort') {
                      console.log('Ajax request aborted.');
                    } else {
                      console.log('Uncaught Error: ' + jqXHR.responseText);
                    }
                    salida = false;
                }
            })
            ).done(
                function () {
                    return false;
                }
            ); 
        }
        else{
            error += 'La contraseña debe coincidir en ambos campos.\n';
        }
    }
    else{
        error += 'La contraseña debe tener minimo 8 caracteres y max 20 caracteres.\n';
    }
    if(error != ""){
        alert(error);
    }
    return false;
});