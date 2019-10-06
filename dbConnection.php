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

?>