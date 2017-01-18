<?php
	session_start();
	include_once("../sharedParts/php/connectDB.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once("../sharedParts/php/head.php"); ?>
		<link rel="stylesheet" href="../sharedParts/css/PS/news.css" />
		<title>Actualit&eacute;s - PATRICK</title>
	</head>
	<body>
		<?php include_once("../sharedParts/php/header.php"); ?>
		<?php
			$NewsQuery = $DB->prepare("SELECT * FROM news ORDER BY dateAdded DESC LIMIT 10 OFFSET 0");
			$NewsQuery->execute();
			while($NewsData = $NewsQuery->fetch()) {
		?>
			<a href=<?php echo '"showNews.php?articleID=' . $NewsData['id'] . '"' ;?>><section class="articleItem">
					<img class="articleItemImage" src=<?php echo '"../sharedParts/media/img/news/' . $NewsData['imgPath'] . '"' ?> alt=<?php echo '"' . $NewsData['imgCaptions'] . '"'; ?>/>
					<div class="articleItemTextContainer">
						<h2 class="articleItemTitle"><?php echo $NewsData['title']; ?></h2>
						<p class="articleItemContent"><?php echo $NewsData['content']; ?></p>
					</div>
				</section></a>
		<?php } ?>
		<?php include_once("../sharedParts/php/footer.php"); ?>
		<script src="../sharedParts/js/header.js"></script>
		<script src="../sharedParts/js/footer.js"></script>
	</body>
</html>
