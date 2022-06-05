<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$repetir = $_POST['repetir'];
$profesor = $_SESSION['id'];
$dni = $_POST['dni'];



$conexion = Connect::getConnection();
$resultado = $conexion->query("select usuario from alumnos");
$resultado->execute();
foreach ($resultado->fetchAll() as $fila) {
    $controlUsuario = $fila[0];
    if ($usuario === $controlUsuario) {
        $error = true;
    }
}
if ($contraseña === $repetir && !empty($contraseña) && $error !== true) {

    $profesor = new Profesor('1', 'carmelo', 'admin', '1');
    $validar = $profesor->dni($dni);
    var_dump($validar);
    if ($validar === true) {
        //Insertamos usuario en caso de que no exista y se hayan cumplido el resto de condiciones.
        $insert = $conexion->prepare("insert into alumnos values('$profesor',default, '$usuario','$contraseña','$dni')");
        $insert->execute();
        $_SESSION['mensaje'] = "¡Alumno creado correctamente!";
        header('Location: index.php?controller=profesor&action=show');
    } else {
        $_SESSION['mensajeW'] = "Formato DNI incorrecto o campo vacío";
        require_once('register.php');
    }
} elseif ($error !== true && $repetir !== $contraseña || $contraseña !== $repetir || empty($contraseña)) {
    $_SESSION['mensajeW'] = "¡Las contraseñas no coinciden o contraseña vacía!";
    require_once('register.php');
} elseif ($error === true) {
    $_SESSION['mensajeW'] = "¡El usuario ya existe!";
    require_once('register.php');
}
