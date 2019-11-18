<?php	

include_once 'header.php';
include_once 'dbConnection.php';
require 'islogged.php';

$chatRoomId = $_GET['id'];

$sessionid = $_SESSION['id'];

$sql = "SELECT id,user1,user2 FROM chat_rooms WHERE id = $chatRoomId AND
($sessionid = user1 OR $sessionid = user2)";


$result = $mysqli->query($sql);

if( $roomRow = mysqli_fetch_array($result) ) {
	if ( $roomRow['id'] != NULL){

		if($sessionid == $roomRow['user1']){
			$chatWith =  $roomRow['user2'];
		} else {
			$chatWith =  $roomRow['user1'];
		}

		$sql = "SELECT name FROM users WHERE id = $chatWith";
		$result = $mysqli->query($sql);
		if( $roomRow = mysqli_fetch_array($result) ) {
			$nameWith = $roomRow['name'];
		}

		$nameLogged = $_SESSION ['user'];

		$sql = "
		SELECT * FROM messages WHERE chat_room_id = $chatRoomId
		";

		$result = $mysqli->query($sql);

		?>

		<div class="row">
			<div class="col-lg-4 text-left pl-5" style="color: white; font-size: 150%;">

				<img src="images/<?php
				if(file_exists("images/".$chatWith.".jpg"))
				{
					echo $chatWith.".jpg";
					} else {
						echo "perfil default.png";
					}
					?>" alt="Avatar" class="circular-image-small mr-2">

					<?php echo $nameWith; ?>
				</div>
				<div class="col-lg-6"></div>
				<div class="col-lg-2 ">
					<i>
						<a href="profile.php">
							<div class="fas fa-user mr-1" ></div>
							<?php echo $nameLogged; ?>
						</a>
					</i>
				</div>
			</div>

			<br>
			<div class="card">
				<div class="card-body scrollbar-black bordered-black square thin" id="messages"
				style="overflow-y:scroll; overflow-x:hidden; height: calc(100vh - 400px);">


			</div>
			<div class="card-body">
				<form action="sendmessage.php" method="post">
					<div class="form-row">
						<div class="col-lg-10">
							<input type="text" name="message" class="form-control mr-3"
							placeholder="Escribe tu mensaje aquí" autofocus>
						</div>
						<input type="hidden" name="chat_room_id" value="<?php echo $chatRoomId ?>">
						<input type="hidden" name="user_id" value="<?php echo $sessionid ?>">
						<div class="col-lg-2">
							<input type="submit" name="sendmessage" id="sendmessage"
							class="btn btn-primary" value="Enviar Mensaje">
						</div>
					</div>
				</form>
			</div>
		</div>

		<input type="hidden" name="sessionid" id="sessionid" value="<?php echo $sessionid ?>">

		<link rel="stylesheet" href="css/chatroom.css" type="text/css">
		<script type="text/javascript" src="js/chatroom.js">

			<?php
		}
		else {
			header("Location: contactlist.php");
		}
	} else {
		header("Location: contactlist.php");
	}
	?>


</script>
</body>