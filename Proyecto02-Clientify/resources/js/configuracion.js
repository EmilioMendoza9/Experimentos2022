$(document).ready( function() {

    $('#cbMostrarContra').click( function () {
        if($('#txtContra1').attr('type') == "password"){
            $('#txtContra1').attr('type', 'text');
            $('#txtContra2').attr('type', 'text');
        }
        else{
            $('#txtContra1').attr('type', 'password');
            $('#txtContra2').attr('type', 'password');
        }
    });

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
    
    $('#cbPrivacidad').click(function () {
        $.when(
            $.ajax({
            type: "GET",
            url: "resources/php/capaNegocios/configuracionPrivacidad.php",
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
              console.log(response);
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
        let contra1 = $('#txtContra1').val();
        let contra2 = $('#txtContra2').val();
        if(contra1.length >= 8){
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
                        console.log(response);
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
                return false;
            }
            else{
                alert('La contraseña debe coincidir en ambos campos.');
            }
        }
        else{
            alert('La contraseña debe tener minimo 8 caracteres.');
        }
    });


});
$("#formInfoPersonal").submit(function () {
    var datos = $("#formInfoPersonal").serializeArray();
    $.when(
        $.ajax({
        type: "POST",
        url: "resources/php/capaNegocios/configuracionCambiarInfo.php",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            console.log(response);
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
    return false;        
});

