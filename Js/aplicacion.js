$(document).ready(function () {
    // Click al botn de acceder para mostrar los iconos de navegacion
    $("#proceso-eventos").click(function () {
        $("#icon-container").toggle();
        $("#btnAcceder").remove();
    });

    // Redireccionar segun al icono o tarea que desea realizar
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

    // ACTUALIZAR ESTADOS EN EL CRONOGRAMA
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
    setInterval(actualizarEstados, 10000); // = 10 segundos
});


// Filtrar las busquedas de los procesos
$(document).ready(function () {
    // Evento de click en el botón de búsqueda para filtrar los resultados
    $('#buscar').on('click', function () {
        var objetoFiltro = $('#objeto').val().toLowerCase();
        var actividadFiltro = $('#actividad_buscar').val().toLowerCase();

        // Se muestra la tabla solo si hay filtros que coincidan
        if (objetoFiltro || actividadFiltro) {
            $('.tabla-procesos-oculta').show();
        } else {
            $('.tabla-procesos-oculta').hide();
            return; // No hay filtros, salir de la función
        }

        $('#table_consulta_procesos tbody tr').each(function () {
            var objeto = $(this).find('td:eq(0)').text().toLowerCase();
            var actividad = $(this).find('td:eq(4)').text().toLowerCase();

            // Mostrar las fila si hay coincidencia en alguno de los campos
            if ((objetoFiltro && objeto.includes(objetoFiltro)) || (actividadFiltro && actividad.includes(actividadFiltro))) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

$(document).ready(function () {

    // Función para realizar el filtrado del cronograma
    $('#buscar').on('click', function () {
        var estadoFiltro = $('#estado').val().toLowerCase();

        // Se muestra la tabla solo si hay filtros que coincidan
        if (estadoFiltro) {
            $('.tabla-cronograma-oculta').show();
        } else {
            $('.tabla-cronograma-oculta').hide();
            return; // No hay filtros, salir de la función
        }

        $('#table_consulta_cronograma tbody tr').each(function () {
            var objeto = $(this).find('td:eq(4)').text().toLowerCase();

            // Mostrar las fila si hay coincidencia en alguno de los campos
            if ((estadoFiltro && objeto.includes(estadoFiltro))) {
                $(this).show();
            } else {
                $('.tabla-cronograma-oculta').hide();
            }
        });
    });
});



