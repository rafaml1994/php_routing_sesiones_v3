<div class="container shadow rounded mt-5" style=" background-color:#FFFFFF; border-radius: 7px; ">
    <?php
    if (isset($_COOKIE['update'])) {
        echo "<div class='alert alert-success mt-5'>";
        echo "<center><strong>Contraseña actualizada correctamente</strong><center>";
        echo "</div>";
    }

    setcookie('update', 1, time() - 100, '/');

    ?>
    <div class="mx-auto col-md-3 pb-mb-5 ">
        <form action="?controller=home&action=login" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label mt-5 mb-4" style="font-weight: bold;">Usuario del profesor :</label>
                <input type="text" class="form-control mb-4" id="nombre" aria-describedby="Nombre" placeholder="Introduzca usuario" name="usuario">

            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label mb-4" style="font-weight: bold;">Contraseña del profesor :</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Introduzca contraseña" name="contraseña">
            </div>
            <div class="input-group mb-3">

                <input type="password" class="form-control mb-4" id="repetir" placeholder="Repita la contraseña" name="repetir">
            </div>

            <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Guardar</button>
        </form>
    </div>
</div>