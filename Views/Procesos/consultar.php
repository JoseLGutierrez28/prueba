<?php
$dir = __DIR__;
// Construir la ruta completa al header.php
$headerPath = $dir . '../../../Inc/header.php';
// Incluir el archivo header.php
include $headerPath;
?>

<hr class="hryellow">
<h1 class="tittle">Búsqueda</h1>

<div class="form" id="consultar_data">

    <div class="row">

        <div class="col">
            <label for="">Objeto/ Descripcion</label>
            <input type="texto" class="form-control" name="objeto" id="objeto" placeholder="Objeto/ Descripcion" autocomplete="off">
        </div>

        <div class="col">
            <label for="">Actividad</label>
            <div class="input-group">
                <input type="text" class="form-control" name="actividad" id="actividad_buscar" placeholder="actividad" autocomplete="off">
            </div>
        </div>

        <div class="col">
            <label for="">Estado</label>
            <select class="form-select" name="estado" id="estado">
                <option value="">Selecciona</option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="PUBLICADO">PUBLICADO</option>
                <option value="EVALUACION">EVALUACION</option>
            </select>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <div class="text-end mt-3">
            <button class="btn btn-secondary" id="buscar" type="button">Buscar</button>
            <button class="btn btn-success" onclick="exportToExcel()">Exportar a Excel</button>
        </div>
    </div>

</div>

<hr>

<div id="mensaje_resultados"></div>

<section class="form" id="tablasGenrarExcel">
    <table class="table table-striped table-hover tabla-cronograma-oculta" id="table_consulta_cronograma">
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
            <?php foreach ($objetoretornadoDBCronograma as $Cronograma) { ?>

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

    <table class="table table-striped table-hover tabla-procesos-oculta" id="table_consulta_procesos">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th scope="col">Objeto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Moneda</th>
                <th scope="col">Presupuesto</th>
                <th scope="col">Actividad</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <?php foreach ($objetoretornadoDBProcesos as $Procesos) {
                $partes = explode(';', $Procesos->actividad); ?>
                <tr>
                    <td><?php echo $Procesos->objeto ?></td>
                    <td><?php echo $Procesos->descripcion ?></td>
                    <td><?php echo $Procesos->moneda ?></td>
                    <td><?php echo $Procesos->presupuesto ?></td>
                    <td><?php echo isset($partes[1]) ? $partes[1] : ''; ?></td>
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