<?php

include_once('header.php');
include_once('dbConnection.php');
require('islogged.php');

$sessionid = $_SESSION['id'];

// Select all users that are not contacts of the logged user
$sql = "
SELECT id,name FROM users WHERE id IN (
SELECT C.contact_id FROM users U
LEFT JOIN contacts C ON U.id = C.user_id 
WHERE C.user_id = $sessionid
)
AND id <> $sessionid
";

$result = $mysqli->query($sql);


?>
<div class="row">

	<div class="col-lg-10">
	</div>
	<div class="col-lg-2 ">
		<i>
			<a href="perfil.php">
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
						<td><?php echo $row['name']; ?></td>

						<td class="text-right">

							<form method="post" action="openChat.php" style="display: inline-block;" class="pr-1">
								<input type="hidden" id="user1" name="user1" value="<?php echo $sessionid; ?>">
								<input type="hidden" id="user2" name="user2" value="<?php echo $row['id']; ?>">
								<button type="submit" class="btn btn-info">
									<i class="fas fa-comment-dots"></i> Abrir conversación
								</button>
							</form>	
							<form method="post" action="delete_user.php" style="display: inline-block;">
								<input type="hidden" id="deletedUser" name="deletedUser" value="<?php echo $row['id']; ?>">
								<button type="submit" class="btn btn-danger">
									<i class="fas fa-user-minus"></i> Eliminar usuario
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
	<div class="col-lg-12">
		<hr>
		<a href="index.php" class="btn btn-info active">
			<i class='fas fa-undo-alt pr-2'></i>Volver al inicio
		</a>
	</div>
</div>

<!-- DataTables scripts -->

<script type="text/javascript">
	$(document).ready( function () {
		$('#userListTable').DataTable({
			"columns": [
			null,
			{ "orderable": false }
			]
		});
	} );
</script>

</body>

</html>
