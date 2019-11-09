<?php

include_once 'header.php';

?>
<div class="card border-dark mb-3 text-center" style="max-width: 50rem; color: white; margin: auto;">
	<div class="card-header">Contacto</div>
	<div class="card-body text-dark">
		<h5 class="card-title" style="color: white;">Contáctenos para obtener un asesoramiento gratuito</h5>

		<br>

		<form class="form form-bordered" id="form" action="index.php">
			<div class="form-group">
				<label for="email">Ingresa tu email</label>
				<input type="text" style="margin: auto;" class="form-control w-75" id="email" name="email">
			</div>

			<div class="form-group">
				<label for="message">Tu mensaje</label>
				<textarea class="form-control w-75" style="margin: auto;" id="message" rows="3"></textarea>
			</div>

		</form>

		<br>

		<div class="row">
			<div class="col-lg-4"></div>

			<div class="col-lg-4 text-center">
				<button id="send" class="btn btn-success" onclick="document.getElementById('form').submit();">Enviar mensaje</button>
			</div>

			<div class="col-lg-4">
				<h4 class="text-right" style="color: white">Glowchat ®</h4>
			</div>
			
		</div>
	</div>
</div>