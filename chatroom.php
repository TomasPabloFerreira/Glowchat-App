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
				<div class="card-body scrollbar-black bordered-black square thin" id="messages" style="overflow-y:scroll; overflow-x:hidden; height:550px;">

					<?php 
					while ( $row = $result->fetch_assoc() ) { 
						if ( $row['user_id'] == $sessionid ){
							?>
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<div class="container darker">
										<img src="images/<?php 
										if(file_exists("images/$sessionid.jpg"))
										{
											echo "$sessionid.jpg";
											} else {
												echo "perfil default.png";
											}
											?>" alt="Avatar" class="right">
											<p class="text-right">
												<?php echo $row['message']; ?>
											</p>
											<span class="time-left">
												<?php echo $row['datetime']; ?>
											</span>
										</div>
									</div>
								</div>
								<?php
							} else {
								?>

								<div class="row">
									<div class="col-lg-8">
										<div class="container text-left">
											<img src="images/<?php
											if(file_exists("images/".$row['user_id'].".jpg"))
											{
												echo $row['user_id'].".jpg";
												} else {
													echo "perfil default.png";
												}
												?>" alt="Avatar">
												<p>
													<?php echo $row['message']; ?>
												</p>
												<span class="time-right">
													<?php echo $row['datetime']; ?>
												</span>
											</div>
										</div>
										<div class="col-lg-4"></div>
									</div>
									<?php
								}
							} ?>

						</div>
						<div class="card-body">
							<br>
							<form action="sendmessage.php" method="post">
								<div class="form-row">
									<input type="text" name="message" style="width: 83%;" class="form-control mr-3"
									placeholder="Escribe tu mensaje aquí" autofocus>
									<input type="hidden" name="chat_room_id" value="<?php echo $chatRoomId ?>">
									<input type="hidden" name="user_id" value="<?php echo $sessionid ?>">
									<input type="submit" name="sendmessage" id="sendmessage"
									style="width: 15%;" class="btn btn-primary" value="Enviar Mensaje">
								</div>
							</form>
						</div>
					</div>

					<?php
				}
				else {
					header("Location: contactlist.php");
				}
			} else {
				header("Location: contactlist.php");
			}
			?>

			<link rel="stylesheet" href="css/chatroom.css" type="text/css">
			<script type="text/javascript">
				// Auto scroll to bottom
				var objDiv = document.getElementById("messages");
				objDiv.scrollTop = objDiv.scrollHeight;
			</script>
		</body>