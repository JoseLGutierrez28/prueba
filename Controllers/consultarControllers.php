<?php
include '../Models/consultar.php';


//Controlador encargado de recibir la informacion de metodo GET o POST
class ConsultarControllers extends Consultar
{
    public function __construct()
    {
    }

    function mostrarInsertar()
    {
        $objetoretornadoDBCronograma = $this->mostrarCronograma();
        $objetoretornadoDBProcesos = $this->mostrarProcesos();
        include '../Views/Procesos/consultar.php';
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $instancia = new ConsultarControllers();
    $instancia->mostrarInsertar();
}

