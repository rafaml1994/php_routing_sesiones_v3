<?php
//En este caso habria que hacer un mapeo de datos cuando los extraemos de la bd e insertarlos en el modelo. Para este ejercicio el modelo no lo he tocado.
class Profesor
{
    private $id;
    private $nombre;
    private $contraseña;
    private $rol;

    public function __construct($id, $nombre, $contraseña, $rol)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setContraseña($contraseña);
        $this->setRol($rol);
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id;
    }
    public function getnombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre;
    }
    public function getContraseña()
    {
        return $this->contraseña;
    }
    public function setContraseña($contraseña)
    {
        $this->contraseña;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {

        $this->rol;
    }
    function dni($dni)
    {
        $letra = substr($dni, -1);
        $minuscula = strtolower(substr($dni, -1));
        $numeros = substr($dni, 0, -1);
        $valido = (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra || $minuscula && strlen($letra) == 1 && strlen($numeros) == 8) ? true : false;

        return $valido;
    }
}
