<?php

include_once('header.php');
include_once('dbConnection.php');
require('islogged.php');

$sessionid = $_SESSION['id'];

// Select all users that are not contacts of the logged user
$sql = "
SELECT id,name FROM users WHERE id NOT IN (
SELECT C.contact_id FROM users U
LEFT JOIN contacts C ON U.id = C.user_id 
WHERE C.user_id = $sessionid
)
AND id <> $sessionid
";

$result = $mysqli->query($sql);


?>
<div class="row">

	<div class="col-lg-4 text-left pl-5" style="color: white; font-size: 150%;">
		Lista de usuarios
	</div>
	<div class="col-lg-6"></div>
	<div class="col-lg-2 text-center">
		<i>
			<a href="profile.php">
				<div class="fas fa-user mr-1" > </div>
				<?php echo $_SESSION ['user']; ?>
			</a>
		</i>
	</div>

</div>

<div class="row pr-3 pl-3">

	<div class="col-lg-12">
		<hr>
		<table id="userListTable" class="table table-hover" style="outline-style: solid; outline-width: 1px; color: white;">

			<thead class="thead-dark">
				<tr>
					<th>Usuarios</th>
					<th></th>
				</tr>
			</thead>

			<tbody>

				<?php while ( $row = $result->fetch_assoc() ) { ?>
					<tr>
						<td>
							<img src="images/<?php
							if(file_exists("images/".$row['id'].".jpg"))
							{
								echo $row['id'].".jpg";
								} else {
									echo "perfil default.png";
								}
								?>" alt="Avatar" class="circular-image-ultrasmall mr-2">
								<?php echo $row['name']; ?>
							</td>

							<td class="text-right">
								<form method="post" action="add_user.php">
									<input type="hidden" id="addedUser" name="addedUser" value="<?php echo $row['id']; ?>">
									<button type="submit" class="btn btn-primary">
										<i class="fas fa-user-plus"></i> Agregar usuario
									</button>
								</form>							
							</td>
						</tr>

					<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 text-center">
			<hr>
			<a href="index.php" class="btn btn-info active">
				<i class='fas fa-undo-alt pr-2'></i>Volver al inicio
			</a>
		</div>
	</div>

	<!-- DataTables scripts -->

	<script type="text/javascript">
		$('#userListTable').DataTable({
			"columns": [
			null,
			{ "orderable": false }
			]
		});
	</script>

</body>

</html>
