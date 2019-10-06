<?php 
include('header.php');
require('islogged.php');
?>

<div class="row">


	<div class="col-lg-12 pb-3">

		<img src="images/perfil default.png" class="perfil">
		<h1 class="display-3">
			<?php echo $_SESSION ['user']; ?>
		</h1>
	</div>


	<div class="col-lg-12">
		<a href="cambiar-foto.php" class="btn btn-info active mb-2">
			<i class="fas fa-user-circle" style="margin-right:8px;"></i>
			Cambiar imagen de perfil
		</a>
		<br>
		<a href="changepassword.php" class="btn btn-info active mb-2">
			<i class="fas fa-key" style="margin-right:8px;"></i>
			Cambiar contraseña
		</a>
		<br>
		<a href="index.php" class="btn btn-info active">
			<i class='fas fa-undo-alt' style="margin-right:8px;"></i>
			Volver al inicio
		</a>
	</div>

</dir>

</div>
</div>
</div>

</body>

</html>

