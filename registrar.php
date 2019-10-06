<?php
include('header.php');
?>
<?php

$name = $_POST["Nombre_usuario"];

$pass = $_POST["Password_usuario"];

if (!empty($name) && !empty($pass)){

  $servername = "localhost";
  $username = "poli_uno";
  $password = "poli1";
  $database = "poli_trece";
  $mysqli = new mysqli ($servername,$username,$password, $database);

  if ($mysqli->connect_errno) {
    printf("Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
  }

  $sql = "INSERT INTO users ( name , password ) VALUES ('$name','$pass')";


  if($mysqli->query($sql)) {

    ?>
    <p style='color:green ; font-size:30 '>Registrado correctamente.</p>
    <a href="index.php" class="btn btn-info active">
      <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver al inicio</a>
      <?php

    } else {
      ?>
      <p style='color:red ; font-size:30 '> Error al registrar, intente de nuevo.</p>
      <a href="registro.php" class="btn btn-info active">
        <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver</a>
        <?php
      }

    } else {
      ?>
      <p style='color:red ; font-size:30 '> Campos invalidos, intente de nuevo.</p>
      <a href="registro.php" class="btn btn-info active">
        <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver</a>
        <?php
      }

      ?>

    </div>
  </div>
</div>

</body>

</html>