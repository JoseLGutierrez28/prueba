document.addEventListener('DOMContentLoaded', function () {
    // Capturar formulario a validar
    const formulario = document.querySelector('#form_procesos');

    // Evento al formulario cuando se envíe
    formulario.addEventListener('submit', function (event) {
        // Envia el formulario sin recargar la pagina
        event.preventDefault();

        // Obtener los valores de los campos del formulario
        const objeto = formulario.querySelector('input[name="objeto"]').value;
        const descripcion = formulario.querySelector('input[name="descripcion"]').value;
        const moneda = formulario.querySelector('select[name="moneda"]').value;
        const presupuesto = formulario.querySelector('input[name="presupuesto"]').value;
        const actividad = formulario.querySelector('input[name="actividad"]').value;

        // Se valida que el campo OBJETO no este vacio eliminando los espacios al inicio y fin"
        if (objeto.trim() === '') {
            alert('El campo "Objeto" es obligatorio.');
            return;
        }

        if (objeto.length > 50) {
            alert('El campo "Objeto" no debe tener mas de 50 caracteres.');
            return;
        }

        if (descripcion.trim() === '') {
            alert('El campo "Descripcion" es obligatorio.');
            return;
        }

        if (descripcion.length > 50) {
            alert('El campo "Descripcion" no debe tener mas de 50 caracteres.');
            return;
        }

        if (moneda.trim() === '') {
            alert('El campo "Moneda" es obligatorio.');
            return;
        }

        if (presupuesto.trim() === '') {
            alert('El campo "Presupuesto" es obligatorio.');
            return;
        }

        if (presupuesto.length > 9) {
            alert('El campo "Presupuesto" no debe tener mas de 9 caracteres.');
            return;
        }

        if (actividad.trim() === '') {
            alert('El campo "Actividad" es obligatorio.');
            return;
        }

        // Enviar formulario al pasar las validaciones
        formulario.submit();
    });
});

// ---------------------- Validaciones del cronograma -----------------------

document.addEventListener('DOMContentLoaded', function () {
    // Capturar formulario a validar
    const fechaInicioInput = document.getElementById('fechaInicio');
    const fechaCierreInput = document.getElementById('fechaCierre');
    const horaInicioInput = document.getElementById('horaInicio');
    const horaCierreInput = document.getElementById('horaCierre');
    const publicarProcesoBtn = document.getElementById('publicarProceso');

    // Eventos para validar cuando cambien los campos de las fechas u horas
    fechaInicioInput.addEventListener('input', validarFechaInicio);
    fechaCierreInput.addEventListener('input', validarFechaCierre);
    horaInicioInput.addEventListener('input', validarHoraInicio);
    horaCierreInput.addEventListener('input', validarHoraCierre);

    // Validar la fecha de inicio
    function validarFechaInicio() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaActual = new Date();

        if (fechaInicio < fechaActual) {
            alert('La fecha de inicio debe ser igual o posterior al día y hora actual.');
            fechaInicioInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Validar la fecha de cierre
    function validarFechaCierre() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaCierre = new Date(fechaCierreInput.value + 'T' + horaCierreInput.value);

        if (fechaCierre < fechaInicio) {
            alert('La fecha de cierre debe ser igual o posterior a la fecha de inicio.');
            fechaCierreInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Validar la hora de inicio
    function validarHoraInicio() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaActual = new Date();

        if (fechaInicio <= fechaActual) {
            alert('La hora de inicio debe ser posterior a la hora actual.');
            horaInicioInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Validar la hora de cierre
    function validarHoraCierre() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaCierre = new Date(fechaCierreInput.value + 'T' + horaCierreInput.value);

        if (fechaCierre <= fechaInicio) {
            alert('La hora de cierre debe ser posterior a la hora de inicio.');
            horaCierreInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;

        }
        else publicarProcesoBtn.disabled = false;
    }
});












