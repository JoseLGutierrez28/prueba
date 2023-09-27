<?php
include '../Models/proceso.php';


//Controlador encargado de recibir la informacion de metodo GET o POST
class ProcesosControllers extends Procesos
{
    public function __construct()
    {
    }

    // Funcion para Enviar los datos al modelo para guardarlos a la DB
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

    // Funcion para capturar los datos del modelo y enviarlos a la vista
    function mostrarInsertar()
    {
        include '../Views/Procesos/insert.php';
    }

    // Funcion de redireccionar, funciona que se llama segun sea el caso
    public function redireccionar()
    {
        header("location: procesosControllers.php?action=insert");
    }
}

// Condicion para verificar las acciones y crerar la instancia para la clase, recibidos por POST
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $instancia = new ProcesosControllers();
    $instancia->verificarInsertar($_POST['objeto'], $_POST['descripcion'], $_POST['moneda'], $_POST['presupuesto'], $_POST['actividad']);
}

// Condicion para verificar las acciones y crerar la instancia para la clase recibidos por GET
if (isset($_GET['action']) && $_GET['action'] == 'insert') {
    $instancia = new ProcesosControllers();
    $instancia->mostrarInsertar();
}
