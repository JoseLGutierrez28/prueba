<?php
include '../Models/cronograma.php';


//Controlador encargado de recibir la informacion de metodo GET o POST
class CronogramaControllers extends Cronograma
{
    public function __construct()
    {
    }

    // Funcion para Enviar los datos al modelo para guardarlos a la DB
    public function verificarInsertar($fechaInicio, $horaInicio, $fechaCierre, $horaCierre, $estado)
    {
        // El this son las variables y funciones que estan en el modelo
        $this->fechaInicio = $fechaInicio;
        $this->horaInicio = $horaInicio;
        $this->fechaCierre = $fechaCierre;
        $this->horaCierre = $horaCierre;
        $this->estado = $estado;
        $this->insertarCronogramaDB();
        $this->redireccionar();
    }

    // Funcion para capturar los datos del modelo y enviarlos a la vista
    public function verificarMostrar()
    {
        $objetoretornadoDB = $this->mostrarCronograma();
        include '../Views/Procesos/cronograma.php';
    }

    // Funcion de redireccionar, funciona que se llama segun sea el caso
    public function redireccionar()
    {
        header("location: cronogramaControllers.php?action=view");
    }
}

// Condicion para verificar las acciones y crerar la instancia para la clase, recibidos por POST
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $instancia = new CronogramaControllers();
    $instancia->verificarInsertar($_POST['fechaInicio'], $_POST['horaInicio'], $_POST['fechaCierre'], $_POST['horaCierre'], $_POST['estado']);
}

// Condicion para verificar las acciones y crerar la instancia para la clase recibidos por GET
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $instancia = new CronogramaControllers();
    $instancia->verificarMostrar();
}
