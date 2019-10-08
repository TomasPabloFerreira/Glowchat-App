<?php 
include('header.php');
require('islogged.php');
?>

<div class="row text-center">

	<div class="col-lg-12 pb-3">

		<img src="images/<?php 
		if(file_exists("images/".$_SESSION ['id'].".jpg"))
		{
			echo $_SESSION ['id'].".jpg";
			} else {
				echo "perfil default.png";
			}
			?>" alt="Imagen de Perfil" class="circular-image">

			<h1 class="display-3">
				<?php echo $_SESSION ['user']; ?>
			</h1>
		</div>


		<div class="col-lg-12">

			<form action="changeProfileImage.php" id="form" method="post" enctype="multipart/form-data">
				<label class="btn btn-info active">
					<i class="fas fa-user-circle pr-1"></i>
					Cambiar imagen de perfil
					<input type='file' id="getFile" name="getFile" hidden>
					<input type="hidden" name="id" value="<?php echo $_SESSION ['id']; ?>">
				</label>
			</form>

			<a href="changepassword.php" class="btn btn-info active mb-2">
				<i class="fas fa-key pr-1"></i>
				Cambiar contraseña
			</a>
			<br>
			<a href="index.php" class="btn btn-info active">
				<i class='fas fa-undo-alt pr-1'></i>
				Volver al inicio
			</a>
		</div>

	</dir>

</div>
</div>
</div>

<script type="text/javascript">

	document.getElementById("getFile").onchange = function() {
		document.getElementById("form").submit();
	};

</script>

</body>

</html>

