<?php

//Clase de la conexion que nos permite conectarnos a la base de datos
class Conexion
{
  public $db;

    public function __construct()
    {
        //Datos que me permite acceder a la base de datos
        $host = "localhost";
        $dbname = "prueba_suplos";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$host; dbname=$dbname",$username,$password);
        } catch (PDOexception $error) {
            echo 'Error: '.$error->getMessage();
        }
    
    }

    // Funcion que me permite cerrar la conexion de la base de datos
    function Closeconection()
    {
        $this->db = null;
    }

}

?>