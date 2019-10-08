<?php include('header.php'); ?>


<div class="row">

    <div class="col-lg-12 text-center">
        <form action="registrar.php" method="post" class="pb-2">

            <h1 class="display-4 pb-4">Registro en el sistema</h1>

            <label>Nombre:</label>
            <br>
            <input type="text" name="Nombre_usuario" id="Nombre_usuario">
            <br>
            <br>
            <label>Password:</label>
            <br>
            <input type="password" name="Password_usuario" id="Password_usuario">

            <br>
            <br>

            <button class="btn btn-info active" type="submit">
                <i class="far fa-address-card" style="margin-right:8px;"></i>
                Resitrarme
            </button>
        </form>

        <a href="index.php" class="btn btn-info active"><i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver al inicio</a>

    </div>

</div>
</div>
</div>

</body>
</html>