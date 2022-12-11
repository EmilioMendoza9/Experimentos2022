$(document).ready( function() {
    $('#cbMostrarContra').click( function () {
        if($('#txtContra').attr('type') == "password"){
            $('#txtContra').attr('type', 'text');
        }
        else{
            $('#txtContra').attr('type', 'password');
        }
    });
});


$("#formInicio").submit( function () {
    let txtCorreo = $("#txtCorreo").val();
});
