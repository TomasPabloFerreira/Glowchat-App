<?php

include_once 'dbConnection.php';

$chatRoomId = $_GET['chatRoomId'];

$sql = "
SELECT * FROM messages WHERE chat_room_id = $chatRoomId
";

$result = $mysqli->query($sql);

while ( $row = $result->fetch_assoc() ) { 

	$rows[] = $row;
}

echo json_encode($rows);

?>