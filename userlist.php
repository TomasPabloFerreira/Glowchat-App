<?php

include_once('header.php');
include_once('dbConnection.php');
require('islogged.php');

$sessionid = $_SESSION['id'];
$sql = "SELECT id,name FROM users WHERE id <> $sessionid ";
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
							<form method="post" action="add_user.php">
								<input type="hidden" id="userWhoIsBeingAdded" name="addedUser" value="<?php echo $row['id']; ?>">
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
