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


    // function mostrarProveedor()
    // {
    //     $instancia = new Conexion();
    //     $insertar = $instancia->db->prepare("SELECT * FROM Proveedor");
    //     $insertar->execute();
    //     $objeto = $insertar->fetchAll(PDO::FETCH_OBJ);

    //     return $objeto;
    // }

    // public function borrarProveedor()
    // {
    //     $instancia = new Conexion();

    //     // Paso 1: Desvincular los productos asociados al proveedor que se va a eliminar
    //     $actualizarProductos = $instancia->db->prepare("UPDATE Producto SET Proveedor_id = NULL WHERE Proveedor_id = :proveedor_id");
    //     $actualizarProductos->bindParam(':proveedor_id', $this->id);
    //     $actualizarProductos->execute();

    //     // Paso 2: Eliminar el proveedor de la tabla Proveedor después de haber desvinculado los productos
    //     $eliminarProveedor = $instancia->db->prepare("DELETE FROM Proveedor WHERE id = :proveedor_id");
    //     $eliminarProveedor->bindParam(':proveedor_id', $this->id);
    //     $eliminarProveedor->execute();
    // }

    // public function mostrarunProveedor()
    // {
    //     $instancia = new Conexion();
    //     $insertar = $instancia->db->prepare("SELECT * FROM Proveedor WHERE id = '$this->id'");
    //     $insertar->execute();
    //     $objetoRes = $insertar->fetchAll(PDO::FETCH_OBJ);
    //     return $objetoRes;
    // }

    // public function actualizarProveedor()
    // {
    //     $instancia = new Conexion();
    //     $insertar = $instancia->db->prepare("UPDATE Proveedor SET nombre='$this->nombre' , direccion = '$this->direccion', telefono = '$this->telefono' WHERE id = '$this->id' ");
    //     $insertar->execute();
    // }


    // public function muestra1()
    // {
    //     $instancia = new Conexion();
    //     $insertar = $instancia->db->prepare("SELECT nombre, direccion, telefono FROM Proveedor WHERE id = '$this->id' ");
    //     $insertar->execute();
    //     $objetoRespu = $insertar->fetchAll(PDO::FETCH_OBJ);
    //     return $objetoRespu;
    // }
}
