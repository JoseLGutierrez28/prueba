<?php

include '../Config/conexion.php';

//Modelo encargado de enviar la informacion a la base de datos
class Consultar
{

    public $id;

    public function __construct()
    {
    }


    // Funcion para capturar toda la informacion de x tabla. creando la instancia de la conexion
    function mostrarCronograma()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM cronograma");
        $insertar->execute();
        $objetoretornadoDBCronograma = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDBCronograma;
    }

    // Funcion para capturar toda la informacion de x tabla. creando la instancia de la conexion
    function mostrarProcesos()
    {
        $instancia = new Conexion();
        $insertar = $instancia->db->prepare("SELECT * FROM procesos");
        $insertar->execute();
        $objetoretornadoDBProcesos = $insertar->fetchAll(PDO::FETCH_OBJ);

        return $objetoretornadoDBProcesos;
    }
}
