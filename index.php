<?php
include('header.php');

if ( isset($_SESSION["id"]) ) {

	?>

	<div class="row">

		<div class="col-lg-2">
		</div>

		<div class="col-lg-8 pb-4">

			<h1 class="pb-4">GLOWCHAT</h1>

			<a href="userlist.php" class="btn btn-info active mb-2">
				<i class="fas fa-list-ul mr-2"></i>
				Listar Usuarios
			</a>
			<br>
			<a href="logout.php" class="btn btn-info active">
				<i class="fas fa-sign-out-alt mr-2"></i>
				Cerrar Sesion
			</a>

		</div>

		<div class="col-lg-2 ">
			<i>

				<a href="perfil.php">
					<div class="fas fa-user mr-1"> </div>
					<?php echo $_SESSION ['user']; ?>
				</a>

			</i>
		</div>

	</div>

	<?php
} else {
	?>

	<div class="row">
		<div class="col-lg-12 pb-4">

			<h1 class="pb-4">GLOWCHAT</h1>

			<a href="login.php" class="btn btn-info active mb-2">
				<i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Ingresar al sistema
			</a>
			<br>
			<dic class="col">
				<a href="registro.php" class="btn btn-info active">
					<i class="far fa-address-card" style="margin-right:8px;"></i>Registrarse en el sistema
				</a>
			</dic>

		</div>
	</div>


	<?php
}
?>

</div>
</div>
</div>

</body>

</html>
