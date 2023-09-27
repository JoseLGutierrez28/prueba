<?php
date_default_timezone_set('America/Bogota');
include '../Config/conexion.php';

// Modelo encargado de enviar la informacion a la base de datos
class Cronograma
{

    public $id;
    public $fechaInicio;
    public $horaInicio;
    public $fechaCierre;
    public $horaCierre;
    public $estado;

    public function __construct()
    {
    }

    // Funcion para insertar los datos recibios a la DB
    function insertarCronogramaDB()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("INSERT INTO cronograma(fechaInicio,horaInicio,fechaCierre,horaCierre,estado) VALUES (?,?,?,?,?)");
        $insertar->bindParam(1, $this->fechaInicio);
        $insertar->bindParam(2, $this->horaInicio);
        $insertar->bindParam(3, $this->fechaCierre);
        $insertar->bindParam(4, $this->horaCierre);
        $insertar->bindParam(5, $this->estado);
        $insertar->execute();
    }

    // Funcion pra actilizar el estado en la DB del cronograma
    function actualizarEstadosCronograma()
    {
        $instancia = new Conexion();
        $obtenerCronogramas = $instancia->db->prepare("SELECT * FROM cronograma");
        $obtenerCronogramas->execute();
        $cronogramas = $obtenerCronogramas->fetchAll(PDO::FETCH_OBJ);

        foreach ($cronogramas as $cronograma) {
            $fechaActual = date('Y-m-d');
            $horaActual = date('H:i');

            // Se verifica si la fecha y hora actual son mayores o iguales a la Fecha y Hora de Inicio
            if ($fechaActual >= $cronograma->fechaInicio && $horaActual >= $cronograma->horaInicio) {
                // Actualizar el estado a "PUBLICADO"
                $actualizarEstado = $instancia->db->prepare("UPDATE cronograma SET estado = 'PUBLICADO' WHERE id = ?");
                $actualizarEstado->bindParam(1, $cronograma->id);
                $actualizarEstado->execute();
            }

            // Se vrifica si la fecha y hora actual son mayores o iguales a la Fecha y Hora de Cierre
            if ($fechaActual >= $cronograma->fechaCierre && $horaActual >= $cronograma->horaCierre) {
                // Actualizar el estado a "EVALUACIÓN"
                $actualizarEstado = $instancia->db->prepare("UPDATE cronograma SET estado = 'EVALUACION' WHERE id = ?");
                $actualizarEstado->bindParam(1, $cronograma->id);
                $actualizarEstado->execute();
            }
        }
    }

    // Funcion para capturar toda la informacion de x tabla. creando la instancia de la conexion
    function mostrarCronograma()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM cronograma");
        $insertar->execute();
        $objetoretornadoDB = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDB;
    }
}

// Crear una instancia de la clase Cronograma
$cronograma = new Cronograma();

// Llamar a la función actualizarEstadosCronograma antes de mostrar los datos
$cronograma->actualizarEstadosCronograma();

// Ahora puedes mostrar los datos
$datosCronograma = $cronograma->mostrarCronograma();
