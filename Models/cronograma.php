<?php

include '../Config/conexion.php';

//Modelo encargado de enviar la informacion a la base de datos
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


    function mostrarCronograma()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM cronograma");
        $insertar->execute();
        $objetoretornadoDB = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDB;
    }
}
