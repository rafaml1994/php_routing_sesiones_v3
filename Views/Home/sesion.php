<div class="container">
    <div class="bg_color">
        <div class="waves w1"></div>
        <div class="waves w2"></div>
    </div>
</div>
<div class="container shadow-lg rounded col-md-3 mt-5 mb-3 login" style="border-radius: 7px; ">
    <?php
    if (isset($_COOKIE['update'])) {
        echo "<div class='alert alert-success mt-5'>";
        echo "<center><strong>Contraseña actualizada correctamente</strong><center>";
        echo "</div>";
    }
    if (isset($_COOKIE['control'])) {
        echo "<div class='alert alert-danger mt-5'>";
        echo "<center><strong>Contraseña incorrecta, por favor revisela</strong><center>";
        echo "</div>";
    }
    if (isset($_COOKIE['usuario'])) {
        echo "<div class='alert alert-danger mt-5'>";
        echo "<center><strong>Ese usuario no existe</strong><center>";
        echo "</div>";
    }
    setcookie('update', 1, time() - 100, '/');
    setcookie('control', 0, time() - 100, '/');
    setcookie('usuario', 0, time() - 100, '/');
    ?>
    <div class="mx-auto col-md-5 pb-mb-2 ">
        <form action="?controller=home&action=login" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label mt-5 mb-3" style="font-weight: bold;">Usuario :</label>
                <input type="text" class="form-control mb-3" id="nombre" aria-describedby="Nombre" placeholder="Introduzca usuario" name="usuario">

            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label mb-3" style="font-weight: bold;">Contraseña :</label>
                <input type="password" class="form-control mb-5" id="contraseña" placeholder="Introduzca contraseña" name="contraseña">
            </div>
            <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Log in</button>
        </form>
    </div>
</div>
</div>