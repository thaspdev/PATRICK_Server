<?php
	session_start();
	include_once("../sharedParts/php/connectDB.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once("../sharedParts/php/head.php"); ?>
		<title></title>
	</head>
	<body>
		<?php include_once("../sharedParts/php/header.php"); ?>
		<section id="news">
		</section>
		<section id="whoIsPatrick">
			<h2>Qui est Patrick ?</h2>
			<p>Patrick est un robot con&ccedil;u pour faciliter la vie des personnes &agrave; mobilit&eacute; r&eacute;duite. Il peut en effet d&eacute;placer des charges allant jusqu'&agrave; 15kg et se rend vers son utilisateur en d&acute;tectant son visage.</p>
		</section>
	</body>
</html>
