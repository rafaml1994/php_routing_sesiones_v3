<div style="height: 250vh; background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(255,255,255,1) 4%, rgba(0,128,0,1) 10%);">
    <div class="bg_color">
        <div class="waves w1"></div>
        <div class="waves w2"></div>
    </div>
</div>
<div class="container mt-5 containerMb">
    <div class="container shadow-lg rounded tabla">
        <table class="table">
            <thead style="color:white; background-color: #060606">
                <tr style="text-align:center;border-radius:5px !important">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usabilidad</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = Connect::getConnection();
                $comprobar = $conexion->query("select idalumno,dni from alumnos order by idalumno asc;");
                $comprobar2 = $conexion->query("select idalumno from calificar order by idalumno asc;");
                $i = 0;
                foreach ($comprobar->fetchAll() as $row2) {
                    $idAlumno[] = $row2[0];
                    //var_dump($_COOKIE[$idAlumno[$i]]);
                    $dni[$i] = $row2[1];
                    $i++;
                }

                $idCalificar[0] = 0;
                foreach ($comprobar2->fetchAll() as $row1) {
                    $idCalificar[] = $row1[0];
                }


                $resultado = array_diff($idAlumno, $idCalificar);

                foreach ($resultado as $id) {
                    $insert = $conexion->prepare("insert into calificar values(default,$id)");
                    $insert->execute();
                }

                //iniciar muestro de datos :
                $tabla = $conexion->query("select alumnos.idalumno,alumnos.usuario,calificar.usabilidad,calificar.codigo,calificar.total from alumnos inner join calificar on alumnos.idalumno = calificar.idalumno order by alumnos.idalumno asc;");
                foreach ($tabla->fetchAll() as $fila) {
                    if ($_SESSION['nombre'] !== $fila[1]) {
                        $recuperar = $_COOKIE[$fila[0]];
                        if ($recuperar != $fila[0]) {
                            echo "<tr style='text-align: center;'><th scope='row'>" . $fila[0] . "</th>";
                            echo "<td>" . $fila[1] . "</td>";
                            echo "<td>" . round($fila[2], 1) . "</td>";
                            echo "<td>" . round($fila[3], 1) . "</td>";
                            echo "<td>" . round($fila[4], 1) . "</td>";
                            echo "<td style='text-align: center;'><a class='btn btn-primary'href='?controller=alumno&action=calificar&id=" . $fila[0] . "'>Puntuar</a></td>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container p-4 mb-5 container1">
        <?php
        $conexion = Connect::getConnection();

        $container = $conexion->query("select alumnos.idalumno,alumnos.usuario,calificar.usabilidad,calificar.codigo,calificar.total from alumnos inner join calificar on alumnos.idalumno = calificar.idalumno order by alumnos.idalumno asc;");
        foreach ($container->fetchAll() as $fila2) {
            if ($_SESSION['nombre'] === $fila2[1]) {
                $miUsabilidad = $fila2[2];
                $miCodigo = $fila2[3];
                $miTotal = $fila2[4];
            }
        }
        echo "<h5 class='pt-3'>Pt usabilidad : " . round($miUsabilidad, 1) . "</h5>";
        echo "<h5>Pt código: " . round($miCodigo, 1) . "</h5>";
        echo "<div class='container shadow-lg container2'>";
        echo "<h4 class='pt-3'>TU PUNTUACIÓN TOTAL</h4>";
        echo "<h1>" . round($miTotal, 1) . "</h1>";
        echo "</div>";
        ?>
        <a class="btn btn-primary mt-4" href="?controller=alumno&action=calificacion">Refrescar</a>
    </div>

</div>

<!-- BUSCAR UN BUEN CONETENEDOR PARA PONER AQUI -->