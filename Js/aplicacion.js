$(document).ready(function () {
    $("#proceso-eventos").click(function () {
        $("#icon-container").toggle();
    });

    $('#btn-informacion').click(function () {
        location.href = "http://localhost/prueba/Controllers/procesosControllers.php?action=insert";
    })

    $('#btn-cronograma').click(function () {
        location.href = "http://localhost/prueba/Controllers/cronogramaControllers.php?action=view";
    })

    // Obtiene el nombre de la página actual (el pathname)
    var nombrePagina = window.location.pathname.split('/').pop();
    var parametrosDeConsulta = window.location.search;

    if (nombrePagina === "procesosControllers.php" && parametrosDeConsulta === "?action=insert") {
        $("#btn-informacion").addClass("active");
    } else if (nombrePagina === "cronogramaControllers.php" && parametrosDeConsulta === "?action=view") {
        document.getElementById("myHr").style.backgroundImage = "linear-gradient(to left, blue 50%, transparent 50%)";
        $("#btn-cronograma").addClass("active");
    }

    function actualizarEstados() {
        var filas = document.querySelectorAll("#table_cronograma tbody tr");

        filas.forEach(function (fila) {
            var fechaInicio = fila.querySelector("td:nth-child(1)").textContent;
            var horaInicio = fila.querySelector("td:nth-child(2)").textContent;
            var fechaCierre = fila.querySelector("td:nth-child(3)").textContent;
            var horaCierre = fila.querySelector("td:nth-child(4)").textContent;
            var estado = fila.querySelector("td:nth-child(5)");

            var fechaActual = new Date();
            var fechaInicioCrono = new Date(fechaInicio + ' ' + horaInicio);
            var fechaCierreCrono = new Date(fechaCierre + ' ' + horaCierre);

            if (fechaActual >= fechaInicioCrono && fechaActual < fechaCierreCrono) {
                estado.textContent = 'PUBLICADO';
            } else if (fechaActual >= fechaCierreCrono) {
                estado.textContent = 'EVALUACIÓN';
            }
        });
    }

    // Ejecutar la función cada minuto
    setInterval(actualizarEstados, 10000); // 60000 ms = 1 minuto
});
