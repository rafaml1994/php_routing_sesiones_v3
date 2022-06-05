<?php

require_once('connection.php');

$conexion = Connect::getConnection();
$resultado = $conexion->query("drop table grupo;");
$resultado->execute();

$_SESSION['grupos'] = 0;

require_once('Views/Profesor/show.php');
