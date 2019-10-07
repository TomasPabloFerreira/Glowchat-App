<?php

include_once 'header.php';
include_once 'dbConnection.php';
require('islogged.php');

$addedUser = $_POST['addedUser'];

$sessionid = $_SESSION['id'];

$date = date("Y-m-d");

$sql = "
INSERT INTO contacts (user_id,contact_id,date_contact_since) VALUES
($sessionid,$addedUser,$date)
";

if($mysqli->query($sql)) {

	header('Location: userlist.php');

} else {
	?>
	<p style='color:red ; font-size:30 '> Error al agregar usuario. Intente de nuevo.</p>
	<a href="userlist.php" class="btn btn-info active">
		Listar usuarios
	</a>
	<?php
}
?>