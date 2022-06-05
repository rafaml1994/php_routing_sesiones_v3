<?php

class Alumno
{

    private $id;
    private $nombre;
    private $contraseña;
    private $dni;

    public function __construct($id, $nombre, $contraseña, $dni)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setContraseña($contraseña);
        $this->setDni($dni);
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
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni;
    }
}
