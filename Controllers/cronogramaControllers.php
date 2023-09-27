<?php
include '../Models/cronograma.php';


//Controlador encargado de recibir la informacion de metodo GET o POST
class CronogramaControllers extends Cronograma
{
    public function __construct()
    {
    }

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

    public function verificarMostrar()
    {
        $objetoretornadoDB = $this->mostrarCronograma();
        include '../Views/Procesos/cronograma.php';
    }

    public function redireccionar()
    {
        header("location: cronogramaControllers.php?action=view");
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $instancia = new CronogramaControllers();
    $instancia->verificarInsertar($_POST['fechaInicio'], $_POST['horaInicio'], $_POST['fechaCierre'], $_POST['horaCierre'], $_POST['estado']);
}

if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $instancia = new CronogramaControllers();
    $instancia->verificarMostrar();
}
