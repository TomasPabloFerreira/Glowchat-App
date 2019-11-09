<?php
include('header.php');

if ( isset($_SESSION["id"]) ) {

	?>

	<div class="row text-center">

		<div class="col-lg-2">
		</div>

		<div class="col-lg-8 pb-4">

			<h1>GLOWCHAT</h1>
			<p class="h3 text-white">Versión de prueba gratuita</p>

			<br>

			<a href="userlist.php" class="btn btn-primary active mb-2">
				<i class="fas fa-list-ul mr-2"></i>
				Listar Usuarios
			</a>
			<br>
			<a href="contactlist.php" class="btn btn-success active mb-2">
				<i class="fas fa-list-ul mr-2"></i>
				Listar Contactos
			</a>
			<br>

			<button href="contactlist.php" class="btn btn-secondary active mb-2" title="Disponible en la versión de pago" disabled>
				<i class="fas fa-list-ul mr-2"></i>
				Salas de chat
			</button>

			<br>

			<button href="contactlist.php" class="btn btn-secondary active mb-4" title="Disponible en la versión de pago" disabled>
				<i class="fas fa-list-ul mr-2"></i>
				Mis chats
			</button>

			<br>

			<a href="logout.php" class="btn btn-danger active">
				<i class="fas fa-sign-out-alt mr-2"></i>
				Cerrar Sesion
			</a>

		</div>

		<div class="col-lg-2 ">
			<i>

				<a href="profile.php">
					<div class="fas fa-user mr-1"> </div>
					<?php echo $_SESSION ['user']; ?>
				</a>

			</i>
		</div>

	</div>

	<?php
} else {
	?>

	<div class="row text-center">
		<div class="col-lg-12 pb-4">

			<h1>GLOWCHAT</h1>
			<p class="h3 text-white">Versión de prueba gratuita</p>

			<br>

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
