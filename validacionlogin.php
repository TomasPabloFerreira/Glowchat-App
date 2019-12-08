<?php
  
  session_start();

  require 'islogged.php'; 
  include 'dbConnection.php';

  $name = $_POST["Nombre_usuario"];

  $pass = $_POST["Password_usuario"];

  if (!empty($name) && !empty($pass)){

    if ($mysqli->connect_errno) {
      printf("Conexión fallida: %s\n", $mysqli->connect_error);
      exit();
    }

    $sql = "SELECT id FROM users WHERE name = '$name' AND password = '$pass'";

    $query = $mysqli->query($sql);
    $result = $query->num_rows;

    if( $result != 0 ) {
      ?>
      <p style='color:green ; font-size:30'>Bienvenido al sistema
        <?php echo $name ?>.
      </p>
      <a href="index.php" class="btn btn-info active">
        <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver al inicio
      </a>
      <?php
      $row = $query->fetch_assoc();
      $_SESSION["user"] = $name;
      $_SESSION["id"] = $row['id'];

      header('Location: index.php');
      die();

    } else {
      ?>
      <p style='color:red ; font-size:30'> Error al ingresar, intente de nuevo.</p>

      <a href="login.php" class="btn btn-info active">
        <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver
      </a>
      <?php
    }

  } else {
    ?>
    <p style='color:red ; font-size:30'> Campos invalidos, intente de nuevo.</p>

    <a href="login.php" class="btn btn-info active">
      <i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver
    </a>
    <?php
  }
  ?>

