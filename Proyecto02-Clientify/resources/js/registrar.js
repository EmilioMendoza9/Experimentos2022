$(document).ready( function() {
    $("#formRegistrar").submit( function () {
        salida = false;
        let txtCorreo = $("#txtCorreo").val();
        let txtTelefono = $("#txtTelefono").val();
        let txtClave = $("#txtClave").val();
        let txtClave2 = $("#txtClave2").val();
        let txtNombres = $("#txtNombres").val();
        let txtApellidos = $("#txtApellidos").val();

        var datos = $("#formRegistrar").serializeArray();
        $.when(
            $.ajax({
            type: "POST",
            url: "resources/php/capaNegocios/registrarInsert.php",
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
                if(salida){
                    window.location.href = "vRegistrar.php";
                }
                else{
                    return salida;
                }
            }
        );
        return salida;
    });
});