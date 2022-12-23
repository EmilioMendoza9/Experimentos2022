$(document).ready( function() {
    $('#btnCerrarS').click( function () {
        $.when(
            $.ajax({
            type: "GET",
            url: "resources/php/capaNegocios/principalCerrarSesion.php",
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
    
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
                window.location.href = "vIndex.php";
            }
        );
    });

    $('#btnAbrirS').click( function () {
        window.location.href = "vInicioSesion.php";
    });

    botones = $('[id*="btnSeguir"]');
    for (let i = 0; i < botones.length; i++) {
      $('#' + botones[i].id).click(seguimiento);
    }  
  });
  
  function seguimiento() {
    console.log('Cortina para cancelar todo');
    idActual = $(this).attr('id');
    salida = false;
    if($(this).prop("innerHTML") == "Siguiendo"){
      var datos = [{name:"Estado",value:$(this).prop("innerHTML")}, {name:"idEmpresa",value:$(this).attr("value")}];
      $.when(
          $.ajax({
          type: "GET",
          url: "resources/php/capaNegocios/principalEliminarRelacion.php",
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
            $('#' + idActual).addClass('bg-opacity-75');
            $('#' + idActual).html('Seguir');
          }
      );
    }
    else if($(this).prop("innerHTML") == "Seguir"){
      var datos = [{name:"Estado",value:$(this).prop("innerHTML")}, {name:"idEmpresa",value:$(this).attr("value")}];
      $.when(
          $.ajax({
          type: "GET",
          url: "resources/php/capaNegocios/principalAgregarRelacion.php",
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
            $('#' + idActual).removeClass('bg-opacity-75');
            $('#' + idActual).html('Siguiendo');
          }
      );
    }
    else{
      console.log('Error');
    }
  }


