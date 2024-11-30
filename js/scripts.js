$(document).ready(function() {
    $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        width: "auto",
        draggable: true,
        resizable: false,
        show: {
            effect: "fadeIn",
            duration: 500
        },
        hide: {
            effect: "fadeOut",
            duration: 500
        }
    });
});

function verificarCompatibilidad() {
    var sustancia1 = $("#sustancia1").val();
    var sustancia2 = $("#sustancia2").val();

    $("#loading").show(); // Mostrar el mensaje de carga

    $.ajax({
        url: "verificar_compatibilidad.php",
        type: "GET",
        data: {
            sustancia1: sustancia1,
            sustancia2: sustancia2
        },
        success: function(response) {
            $("#loading").hide(); // Ocultar el mensaje de carga
            $("#resultadoModal").html(response);
            $("#dialog").dialog("open");

            var colorClass = '';
            if (response.includes("¡GASES TOXICOS!")) {
                colorClass = "modal-yellow";
            } else if (response.includes("No hay incompatibilidad")) {
                colorClass = "modal-green";
            } else {
                colorClass = "modal-red";
            }
            $("#resultadoModal").removeClass("modal-yellow modal-green modal-red").addClass(colorClass);
        },
        error: function() {
            $("#loading").hide(); // Ocultar el mensaje de carga
            $("#resultadoModal").html("<p>Ocurrió un error al verificar la compatibilidad. Por favor, inténtelo de nuevo.</p>");
            $("#dialog").dialog("open");
            $("#resultadoModal").removeClass("modal-yellow modal-green").addClass("modal-red");
        }
    });
}



