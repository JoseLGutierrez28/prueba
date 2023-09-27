<!DOCTYPE html>
<html lang="en">


<!-- Llamar todos los css y js necesario para la ejecucion del proyecto, y el encabezado de la pagina -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba técnica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/prueba/Css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="http://localhost/prueba/Js/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="http://localhost/prueba/Js/aplicacion.js"></script>
    <script src="http://localhost/prueba/Js/modal.js"></script>
    <script src="http://localhost/prueba/Js/validaciones.js"></script>
</head>


<!-- Cuerpo de la pagina con el header para todas las paginas que se requieran -->
<body>
    <header>
        <nav>
            <ul>
                <li>
                    Procesos/ Eventos
                </li>

                <div class="d-flex justify-content-center" id="btnAcceder">
                    <div class="text-end mt-3">
                        <button class="btn btn-primary" id="proceso-eventos" type="button">Acceder</button>
                    </div>
                </div>

                <section class="icons" id="icon-container">
                    <a href="http://localhost/prueba/Controllers/procesosControllers.php?action=insert" class="links-header">
                        <div class="icon-box">
                            <i class="fas fa-pencil-alt"></i>
                            <div class="icon-text">Crear</div>
                        </div>
                    </a>

                    <div class="icon-box">
                        <i class="far fa-copy"></i>
                        <div class="icon-text">Copiar</div>
                    </div>

                    <a href="http://localhost/prueba/Controllers/consultarControllers.php?action=view" class="links-header">
                        <div class="icon-box">
                            <i class="fas fa-search-plus"></i>
                            <div class="icon-text">Consultar</div>
                        </div>
                    </a>

                </section>
            </ul>

        </nav>
    </header>