<?php

include '../Config/conexion.php';

//Modelo encargado de enviar la informacion a la base de datos
class Consultar
{

    public $id;

    public function __construct()
    {
    }


    function mostrarCronograma()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM cronograma");
        $insertar->execute();
        $objetoretornadoDBCronograma = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDBCronograma;
    }

    function mostrarProcesos()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM procesos");
        $insertar->execute();
        $objetoretornadoDBProcesos = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDBProcesos;
    }
}
