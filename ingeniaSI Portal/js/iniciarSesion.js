$(document).ready( function() {
    $("#formInicio").submit( function (e) {
        e.preventDefault(e);
        let txtCorreo = $("#txtCorreo").val();
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            if(pattern.test(txtCorreo)) {
                $.ajax({
                        type: "POST",
                        url: "./php/iniciarSesion.php", 
                        data: $(this).serialize(),
                        success: function(result) {
                            //Redirecciónar pagina
                            alert(result);
                        },
                        error: function(){
                            alert("Este es un error");
                        }
                    }               
                );
            }
            else
                alert('Correo no valido.');
            
        }
    );
});