<?php

include_once 'header.php';
include_once 'dbConnection.php';
require('islogged.php');

$deletedUser = $_POST['deletedUser'];

$sessionid = $_SESSION['id'];

$sql = "
DELETE FROM contacts WHERE user_id = $sessionid AND contact_id = $deletedUser
";

var_dump($sql);

if($mysqli->query($sql)) {

	header('Location: contactlist.php');

} else {
	?>
	<p style='color:red ; font-size:30 '> Error al eliminar usuario. Intente de nuevo.</p>
	<a href="contactlist.php" class="btn btn-info active">
		Listar usuarios
	</a>
	<?php
}
?>