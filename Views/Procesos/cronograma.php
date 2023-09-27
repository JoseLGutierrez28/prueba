<?php
date_default_timezone_set('America/Bogota');
// Obtener la ruta actual del archivo
$dir = __DIR__;
// Construir la ruta completa al header.php
$headerPath = $dir . '../../../Inc/header.php';
// Incluir el archivo header.php
include $headerPath;
?>

<hr id="myHr" class="hrblue">
<div class="container">
    <div class="row">
        <div class="col">
            <p class="d-inline-flex gap-1 btn-groups">
                <button type="button" id="btn-informacion" class="btn-navigation btn-information" data-bs-toggle="button">Información básica</button>
                <button type="button" id="btn-cronograma" class="btn-navigation btn-cronograma" data-bs-toggle="button">Cronograma</button>
            </p>
        </div>
    </div>
</div>


<hr class="hryellow">
<h1 class="tittle">Cronograma</h1>

<form action="http://localhost/prueba/Controllers/cronogramaControllers.php" method="POST" class="form">
    <div class="row">

        <div class="col">
            <label for="fechaInicio">Fecha inicio <span>(*)</span></label>
            <div class="input-group">
                <input type="date" class="form-control" name="fechaInicio" id="fechaInicio">
                <input type="hidden" name="action" value="insert" id="action">
            </div>
            <p class="text-sm-end">(AAAA/MM/DD)</p>
        </div>


        <div class="col">
            <label for="">Hora inicio <span>(*)</span></label>
            <input type="time" class="form-control" name="horaInicio" id="horaInicio">
        </div>


        <div class="col">
            <label for="">Fecha de cierra <span>(*)</span></label>
            <div class="input-group">
                <input type="date" class="form-control" name="fechaCierre" id="fechaCierre">
            </div>
            <p class="text-sm-end">(AAAA/MM/DD)</p>
        </div>


        <div class="col">
            <label for="">Hora cierre (*)</label>
            <input type="time" class="form-control" name="horaCierre" id="horaCierre">
        </div>
        <input type="hidden" name="estado" value="ACTIVO" id="estado">
    </div>

    <div class="text-center">
        <button class="btn btn-success" id="publicarProceso" disabled type="submit">Publicar proceso</button>

    </div>
</form>

<hr>
<section class="form">
    <table class="table table-striped table-hover" id="table_cronograma">
        <thead>
            <tr>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Hora inicio</th>
                <th scope="col">Fecha cierre</th>
                <th scope="col">Hora cierre</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($objetoretornadoDB as $Cronograma) {
                $fechaActual = date('Y-m-d H:i');
                $horaActual = date('H:i');

                // Verificar si la fecha y hora actual son mayores o iguales a la Fecha y Hora de Inicio
                if ($fechaActual >= $Cronograma->fechaInicio && $horaActual >= $Cronograma->horaInicio) {
                    // Si se cumple la condición, el proceso está en estado "PUBLICADO"
                    $Cronograma->estado = 'PUBLICADO';
                }

                // Verificar si la fecha y hora actual son mayores o iguales a la Fecha y Hora de Cierre
                if ($fechaActual >= $Cronograma->fechaCierre && $horaActual >= $Cronograma->horaCierre) {
                    // Si se cumple la condición, el proceso está en estado "EVALUACIÓN"
                    $Cronograma->estado = 'EVALUACIÓN';
                }
            ?>

                <tr>
                    <td><?php echo $Cronograma->fechaInicio ?></td>
                    <td><?php echo $Cronograma->horaInicio ?></td>
                    <td><?php echo $Cronograma->fechaCierre ?></td>
                    <td><?php echo $Cronograma->horaCierre ?></td>
                    <td><?php echo $Cronograma->estado ?></td>
                </tr>


            <?php } ?>


        </tbody>
    </table>
</section>

<?php
// Obtener la ruta actual del archivo
$dir = __DIR__;
// Construir la ruta completa al header.php
$headerPath = $dir . '../../../Inc/footer.php';
// Incluir el archivo header.php
include $headerPath;
?>