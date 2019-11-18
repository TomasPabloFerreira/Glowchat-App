<?php

include_once 'dbConnection.php';

$sql = "
SELECT * FROM messages";

$result = $mysqli->query($sql);

$sql = "UPDATE chat_rooms SET messages_count = 0";
$mysqli->query($sql);

while ( $row = $result->fetch_assoc() ) { 

	$sql = "
	UPDATE chat_rooms 
	SET messages_count = messages_count + 1
	WHERE id = ". $row['chat_room_id'];

	$mysqli->query($sql);
}

?>