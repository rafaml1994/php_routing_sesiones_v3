<?php

require_once('connection.php');
$conexion = Connect::getConnection();

if ($_SESSION['grupos'] == 0) {
    $crearTabla = $conexion->query("create table grupo(
        idgrupo int,
        idalumno int, 
        grupo varchar(20),
        foreign key (idalumno) references alumnos(idalumno), 
        foreign key (idgrupo) references grupos(idgrupo)
    );");
}

$resultado = $conexion->query("select idalumno,usuario from alumnos");
$i = 0;
foreach ($resultado->fetchAll() as $fila) {
    //$name[$i] = $fila[1];
    $id[$i] = $fila[0];
    $i++;
}
//shuffle($name);
shuffle($id);
//var_dump($id[5]);

//sesion del profesor que crea el grupo:
$profesor = $_SESSION['usuario'];


//iniciamos el  proceso para crear los grupos:

$limite = $_POST['select'];

$grupo = round((count($id) / $limite), 0, PHP_ROUND_HALF_UP);
// var_dump($limite . "<br>");
// echo "El numero de grupos a crear es: " . $grupo;

//pasar el grupo como un post desde show() indicando el número de grupos.
$vueltas = 0;

if ($_SESSION['grupos'] == 0) {
    for ($z = 0; $z < count($id); $z++) {

        for ($x = 1; $x <= $grupo; $x++) {
            $nuevoId = $id[$vueltas];
            $vueltas++;
            var_dump($x);
            $insert = $conexion->prepare("insert into grupos values(1,'$x')"); //el valor 1 representaria el id del profesor en caso de que metamos más profesores.
            $insert->execute();
            $insert2 = $conexion->prepare("insert into grupo values('$x','$nuevoId','Grupo $x')");
            $insert2->execute();
        }
    }
    $_SESSION['grupos'] = 1;
}

//var_dump($_SESSION['grupos']);
header('Location: index.php?controller=profesor&action=show');





































//Intento de Shuffle:

// for ($z = 0; $z < count($random); $z++) {

//     do {

//         $array = $random[rand(0, count($random) - 1)];
//         if ($array != $comparar[$array] && $array !== null) {
//             echo "<hr>";
//             $comparar = $array;
//             $capturar[$z] = $array;
//             echo "Este es el valor de capturar: " . ($capturar[$z]);
//             echo "<br>";
//             echo "Este es el valor de Z: " . $z;

//             if ($capturar != $randomArray) {
//                 $randomized = $capturar[$z];
//                 $randomArray[$z] = $randomized;
//                 $z++;
//             }
//             echo "<br>";
//             echo "Este es el valor de Randomized: " . $randomized;
//         }
//     } while ($z !== count($random));
// }

//iniciamos el registro de la tabal grupos con los datos aleatorios;
