<?php

class Connect
{
    public static function getConnection()
    {
        //Conexión bd nube: (si hacemos el commit con la conexion comentada, se actualiza y no funciona en internet) 
        $conexion = new PDO("pgsql:host=bj3tedylayej2naoqaso-postgresql.services.clever-cloud.com;port=5432;dbname=bj3tedylayej2naoqaso", "ugqnfhoj1rro5xqz0w7f", "SSg1p5HbN2LhLtJvtJeS");
        return $conexion;

        //Conexión con servidor en Docker:
        //$conexion = new PDO("pgsql:host=postgres;port=5432;dbname=pruebas", "admin", "admin");
        //return $conexion;
    }
}
