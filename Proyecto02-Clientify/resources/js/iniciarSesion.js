var salida = false;
$(document).ready(function() {

});
$('#cbMostrarContra').click(function () {
    if($('#txtContra').attr('type') == "password"){
        $('#txtContra').attr('type', 'text');
    }
    else{
        $('#txtContra').attr('type', 'password');
    }
});

$('#btnRegistrar').click(function () {
    window.location.href = "vRegistrar.php"; 
});

$("#formInicio").submit(function () {
    salida = false;
    var txtCorreo = $("#txtCorreo").val();
    var txtClave = $("#txtContra").val();

    var datos = $("#formInicio").serializeArray();
    $.when(
        $.ajax({
        type: "POST",
        url: "resources/php/capaNegocios/iniciarSesionAuth.php",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            console.log(response);
            if(response == 10){
                window.location.href = "vSeguidores.php";
            }
            else if(response == 0){
                salida = true;
            }
            else if(response == 1){
                alert('No hay usuarios registrados con este correo o telefono.');
                salida = false;
            }
            else if(response == 2){
                alert('La contraseña es incorrecta.');
                salida = false;
            }
            else{
                alert('Ocurrió un error inesperado.');
                console.log(response);
                salida = false;
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
            if(salida){
                window.location.href = "vPrincipal.php";
            }
            else{
                return false;
            }
        }
    );
    return false;
});