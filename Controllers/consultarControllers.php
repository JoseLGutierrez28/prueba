<?php
include '../Models/consultar.php'; //Incluir el modelo para poder acceder a datos de este


//Controlador encargado de recibir la informacion de metodo GET o POST
class ConsultarControllers extends Consultar
{
    public function __construct()
    {
    }

    // Funcion para capturar los datos del modelo y enviarlos a la vista
    function mostrarInsertar()
    {
        $objetoretornadoDBCronograma = $this->mostrarCronograma();
        $objetoretornadoDBProcesos = $this->mostrarProcesos();
        include '../Views/Procesos/consultar.php';
    }
}

// Condicion para verificar las acciones y crerar la instancia para la clase
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $instancia = new ConsultarControllers();
    $instancia->mostrarInsertar();
}

