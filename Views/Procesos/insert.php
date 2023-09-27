<?php
// Obtener la ruta actual del archivo
$dir = __DIR__;
// Construir la ruta completa al header.php
$headerPath = $dir . '../../../Inc/header.php';

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
<h1 class="tittle">Información básica</h1>

<form action="http://localhost/prueba/Controllers/procesosControllers.php" method="POST" class="form" id="form_procesos">
    <div class="row">
        <div class="col">
            <label for="">Objeto</label>
            <input type="text" class="form-control" placeholder="Objeto" name="objeto" autocomplete="off">
            <input type="hidden" name="action" value="insert" id="action">

            <label for="">Descripción/Alcance</label>
            <input type="text" class="form-control" placeholder="Descripción/Alcance" name="descripcion" autocomplete="off">

            <div class="row">
                <div class="col">
                    <label for="">Moneda</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-list"></i>
                        </span>
                        <select class="form-select" name="moneda" id="moneda">
                            <option value="">Selecciona</option>
                            <option value="COP">COP</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="">Presupuesto</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </span>
                        <input type="number" class="form-control" name="presupuesto" id="presupuesto" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <label for="">Actividad</label>
            <div class="input-group">
                <input type="text" class="form-control" name="searchActividad" id="actividad" readonly>
                <input type="hidden" name="actividad" value="" id="codigoActividad">
                <span class="input-group-text">
                    <i class="fa-solid fa-search"></i>
                </span>
            </div>

            <div id="informacion"></div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal" id="excelModal">
        <div class="modal-content">
            <span class="close" data-dismiss="modal">&times;</span>
            <div id="excelTableContainer">
                <!-- Filas del Excel -->
            </div>
            <button id="loadMore" type="button">Cargar más</button>
        </div>
    </div>


    <hr class="division-button">
    <div class="text-center">
        <button class="btn btn-success" type="submit">Guardar</button>
    </div>

</form>


<?php
// Obtener la ruta actual del archivo
$dir = __DIR__;
// Construir la ruta completa al header.php
$headerPath = $dir . '../../../Inc/footer.php';

include $headerPath;
?>