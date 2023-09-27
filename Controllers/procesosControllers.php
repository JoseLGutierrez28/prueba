<?php
include '../Models/proceso.php';


//Controlador encargado de recibir la informacion de metodo GET o POST
class ProcesosControllers extends Procesos
{
    public function __construct()
    {
    }

    public function verificarInsertar($objeto, $descripcion, $moneda, $presupuesto, $actividad)
    {
        // El this son las variables y funciones que estan en el modelo
        $this->objeto = $objeto;
        $this->descripcion = $descripcion;
        $this->moneda = $moneda;
        $this->presupuesto = $presupuesto;
        $this->actividad = $actividad;
        $this->insertarProceso();
        $this->redireccionar();
    }

    function mostrarInsertar()
    {
        include '../Views/Procesos/insert.php';
    }

    public function redireccionar()
    {
        header("location: procesosControllers.php?action=insert");
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $instancia = new ProcesosControllers();
    $instancia->verificarInsertar($_POST['objeto'], $_POST['descripcion'], $_POST['moneda'], $_POST['presupuesto'], $_POST['actividad']);
}

if (isset($_GET['action']) && $_GET['action'] == 'insert') {
    $instancia = new ProcesosControllers();
    $instancia->mostrarInsertar();
}
