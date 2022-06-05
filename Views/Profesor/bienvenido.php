<div style="background-color: #909090;">
    <div class="container vh-100" style=" background-color:#FFFFFF;">
        <h1 class=" text-center pt-2">Bienvenido <?php echo ucfirst($_SESSION['usuario']) ?>!</h1>
        <h3 class="text-center">En esta app vas a poder gestionar a tus alumnos de una manera rápida y sencilla.</h3>
        <div class=" m-0 row justify-content-center" style="justify-content: space-between">
            <div class="col-sm-5 m-0 row justify-content-center">
                <div class=" card shadow p-3 mb-5 mt-5 bg-body rounded" style="width: 18rem; ">
                    <img src="https://i.imgur.com/Pp04lAx.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Registrar alumno</h4>
                        <p class="card-text mb-5">Aquí vas a poder registrar alumnos de manera fácil y sencilla.</p>
                        <a href="index.php?controller=profesor&action=register" class="btn btn-primary">Registrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 m-0 row justify-content-center">
                <div class=" card shadow p-3 mb-5 mt-5 bg-body rounded" style="width: 18rem; ">
                    <img src="https://3.bp.blogspot.com/-JjQR1wGfCLM/V8dV2vTzVjI/AAAAAAAAdMY/RVfq9KktUR07dNrRKeA3yNs7nvWGKbMBgCLcB/s1600/aula%2Binformatica.png" alt="alumnos" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Visualizar alumnos</h4>
                        <p class="card-text mb-5">Puedes ver los alumnos que hayas registrado y editarlos de forma fácil</p>
                        <a href="index.php?controller=profesor&action=show" class="btn btn-primary">Visualizar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>