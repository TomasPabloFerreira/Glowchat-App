<?php
include_once 'header.php';
include_once 'dbConnection.php';
require 'islogged.php';

$user1 = $_POST['user1'];
$user2 = $_POST['user2'];

$sql = "
SELECT id FROM chat_rooms WHERE
( user1 = $user1 AND user2 = $user2 ) 
OR
( user1 = $user2 AND user2 = $user1 )
";

$result = $mysqli->query($sql);

if($row = mysqli_fetch_array($result)){
	$chatRoomId = $row['id'];
}

if ($chatRoomId != null) {
	header("Location: chatroom.php?id=". $chatRoomId);
	die();
} else{
	$sql = "
	INSERT INTO chat_rooms (name,user1,user2) VALUES ('Chat privado',$user1,$user2)
	";

	if($mysqli->query($sql)) {
		$sql = "SELECT id FROM chat_rooms WHERE user1 = $user1 AND user2 = $user2";
	}

	$result = $mysqli->query($sql);

	if($row = mysqli_fetch_array($result)){
		$chatRoomId = $row['id'];		
	}

	header("Location: chatroom.php?id=". $chatRoomId);
	die();
}


?>