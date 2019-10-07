<?php
include('header.php');
?>
<?php

$servername = "localhost";
$username = "poli_uno";
$password = "poli1";
$database = "poli_trece";
$mysqli = new mysqli ($servername,$username,$password, $database);

if ($mysqli->connect_errno) {
	printf("Conexión fallida: %s\n", $mysqli->connect_error);
	exit();
}

$sql = "
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(30) DEFAULT NULL,
`password` varchar(30) DEFAULT NULL,
UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='Tabla de usuarios para verificación'
";

if($mysqli->query($sql)) {

	?>
	<p style='color:green ; font-size:30 '>Tabla usuarios creada correctamente.</p>

	<?php
} else {
	?>
	<p style='color:red ; font-size:30 '> Error al crear tabla usuarios, intente de nuevo.</p>

	<?php
} 

$sql = "
CREATE TABLE IF NOT EXISTS `chat_rooms` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(45) NOT NULL,
`user1` int(11) NOT NULL,
`user2` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";

if($mysqli->query($sql)) {

	?>
	<p style='color:green ; font-size:30 '>Tabla chat_rooms creada correctamente.</p>

	<?php
} else {
	?>
	<p style='color:red ; font-size:30 '> Error al crear tabla chat_rooms, intente de nuevo.</p>

	<?php
}


$sql = "
CREATE TABLE IF NOT EXISTS  `contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`contact_id` int(11) NOT NULL,
`date_contact_since` date NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if($mysqli->query($sql)) {

	?>
	<p style='color:green ; font-size:30 '>Tabla contactos creada correctamente.</p>
	<?php
} else {
	?>
	<p style='color:red ; font-size:30 '> Error al crear tabla contactos, intente de nuevo.</p>

	<?php
}

?>

<a href="index.php" class="btn btn-info active">
	<i class='fas fa-undo-alt' style="margin-right:8px;"></i>Volver al inicio
</a>

</div>
</div>
</div>

</body>

</html>