<?php

include_once 'dbConnection.php';

$chatRoomId = $_GET['chatRoomId'];

$sql = "
SELECT messages_count FROM chat_rooms WHERE id = $chatRoomId
";

$result = $mysqli->query($sql);

while ( $row = $result->fetch_assoc() ) { 

	$rows[] = $row;
}

echo json_encode($rows);

?>