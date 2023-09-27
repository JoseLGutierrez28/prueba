<?php

include '../Config/conexion.php';

//Modelo encargado de enviar la informacion a la base de datos
class Procesos
{

    public $id;
    public $objeto;
    public $descripcion;
    public $moneda;
    public $presupuesto;
    public $actividad;

    public function __construct()
    {
    }

    function insertarProceso()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("INSERT INTO procesos(objeto,descripcion,moneda,presupuesto,actividad) VALUES (?,?,?,?,?)");
        $insertar->bindParam(1, $this->objeto);
        $insertar->bindParam(2, $this->descripcion);
        $insertar->bindParam(3, $this->moneda);
        $insertar->bindParam(4, $this->presupuesto);
        $insertar->bindParam(5, $this->actividad);
        $insertar->execute();
    }
}
