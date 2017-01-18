<?php
	session_start();
	include_once("../sharedParts/php/connectDB.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once("../sharedParts/php/head.php"); ?>
		<title>Contact - PARTICK</title>
	</head>
	<body>
		<?php include_once("../sharedParts/php/header.php"); ?>
		<section id="contact">
			<h2>Nous contacter</h2>
			<form method="POST" action="../Processing/sendMessage.php">
				<div id="contactFullName">
					<div>
						<label for="contactFirstName">Pr&eacute;nom</label>
						<input id="contactFirstName" name="contactFirstName" type="text"/>
					</div>
					<div>
						<label for="contactLastName">Nom de famille</label>
						<input id="contactLastName" name="contactLastName" type="text"/>
					</div>
				</div>
				<div>
					<label for="contactEmail">Adresse email</label>
					<input id="contactEmail" name="contactEmail" type="email"/>
				</div>
				<div>
					<label for="contactMessageSubject" text"">Objet</label>
					<input id="contactMessageSubject" name="contactMessageSubject" type="text"/>
				</div>
				<div>
					<label for="contactMessage">Message</label>
					<textarea id="contactMessage" name="contactMessage" rows="10"></textarea>
				</div>
				<div>
					<input id="contactSubmit" type="submit" value="Envoyer"/>
				</div>
			</form>
		</section>
		<?php include_once("../sharedParts/php/footer.php"); ?>
		<script src="../sharedParts/js/header.js"></script>
		<script src="../sharedParts/js/footer.js"></script>
	</body>
</html>
