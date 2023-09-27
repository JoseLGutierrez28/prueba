document.addEventListener('DOMContentLoaded', function () {
    // Obtén una referencia al formulario
    const formulario = document.querySelector('#form_procesos');

    // Agrega un evento al formulario cuando se envíe
    formulario.addEventListener('submit', function (event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();

        // Realiza la validación de campos
        const objeto = formulario.querySelector('input[name="objeto"]').value;
        const descripcion = formulario.querySelector('input[name="descripcion"]').value;
        const moneda = formulario.querySelector('select[name="moneda"]').value;
        const presupuesto = formulario.querySelector('input[name="presupuesto"]').value;
        const actividad = formulario.querySelector('input[name="actividad"]').value;

        // Ejemplo de validación simple para el campo "objeto"
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
    // Obtén referencias a los elementos del formulario
    const fechaInicioInput = document.getElementById('fechaInicio');
    const fechaCierreInput = document.getElementById('fechaCierre');
    const horaInicioInput = document.getElementById('horaInicio');
    const horaCierreInput = document.getElementById('horaCierre');
    const publicarProcesoBtn = document.getElementById('publicarProceso');

    // Agrega un controlador de eventos para validar cuando cambien los campos
    fechaInicioInput.addEventListener('input', validarFechaInicio);
    fechaCierreInput.addEventListener('input', validarFechaCierre);
    horaInicioInput.addEventListener('input', validarHoraInicio);
    horaCierreInput.addEventListener('input', validarHoraCierre);

    // Función para validar la fecha de inicio
    function validarFechaInicio() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaActual = new Date();

        if (fechaInicio < fechaActual) {
            alert('La fecha de inicio debe ser igual o posterior al día y hora actual.');
            fechaInicioInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Función para validar la fecha de cierre
    function validarFechaCierre() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaCierre = new Date(fechaCierreInput.value + 'T' + horaCierreInput.value);

        if (fechaCierre < fechaInicio) {
            alert('La fecha de cierre debe ser igual o posterior a la fecha de inicio.');
            fechaCierreInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Función para validar la hora de inicio
    function validarHoraInicio() {
        const fechaInicio = new Date(fechaInicioInput.value + 'T' + horaInicioInput.value);
        const fechaActual = new Date();

        if (fechaInicio <= fechaActual) {
            alert('La hora de inicio debe ser posterior a la hora actual.');
            horaInicioInput.value = ''; // Borra el valor del campo
            publicarProcesoBtn.disabled = true;
        }
    }

    // Función para validar la hora de cierre
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












