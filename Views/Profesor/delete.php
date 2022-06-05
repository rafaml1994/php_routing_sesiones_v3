<?php
$id = $_GET['id'];
$base = new Connect();
$conexion = $base->getConnection();
$resultado = $conexion->prepare("delete from grupo where idalumno = " . $id);
$resultado2 = $conexion->prepare("delete from alumnos where idalumno = " . $id);
$resultado->execute();
$resultado2->execute();

require_once('show.php');
