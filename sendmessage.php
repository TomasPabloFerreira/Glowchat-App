<?php
include_once 'header.php';
include_once 'dbConnection.php';
require 'islogged.php';

if (isset ($_POST['sendmessage'])) {

	$message = $_POST['message'];
	$user_id = $_POST['user_id'];
	$chat_room_id = $_POST['chat_room_id'];

	// Set the timezone 
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$date = date("Y-m-d H:i:s");

	$sql = "
	INSERT INTO messages (user_id,message_type,chat_room_id,message,datetime)
	VALUES ($user_id,1,$chat_room_id,'$message','$date')
	";

	if($mysqli->query($sql)) {
		header("Location: chatroom.php?id=".$chat_room_id );
	}

} else {
	header("Location: index.php");
	die();
}

?>