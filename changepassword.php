<?php include('header.php');
if ( isset($_SESSION["user"]) ) {

	?>

	<div class="row">


		<div class="col-lg-2">
		</div>


		<div class="col-lg-8">

			<form action="cambiopasswordvalidation.php" method="post" name="Password_change">

				<h1 class="display-4 space">Cambio de contraseña</h1>

				<label>Contraseña actual</label>
				<div class="smspace"></div>
				<input type="password" name="Old_password" id="Old_password">

				<div class="smspace"></div>

				<label>Nueva contraseña</label>
				<div class="smspace"></div>
				<input type="password" name="New_password" id="New_password">

				<div class="smspace"></div>

				<label>Repita la contraseña</label>
				<div class="smspace"></div>
				<input type="password" name="New_password_repeat" id="New_password_repeat">

				<div class="space"></div>

				<button class="btn btn-info active" type="submit">
					<i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Cambiar contraseña</button>
				</form>

				<a href="profile.php" class="btn btn-info active">
					<i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver</a>

				</div>


				<div class="col-lg-2">
				</div>



			</div>
		</div>
	</div>


	<?php
} else {
	header("location: index.php");
}
?>


</body>

</html>