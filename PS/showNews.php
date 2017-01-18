<?php
	session_start();
	include_once("../sharedParts/php/connectDB.php");
	if(!isset($_GET['articleID']) || !is_numeric($_GET['articleID'])) {
		header('Location: ../Error/404.php');
	} else {
		$aID = $_GET['articleID'];
		$articleQuery = $DB->prepare("SELECT * FROM news WHERE id = ?");
		$articleQuery->execute(array($aID));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once("../sharedParts/php/head.php"); ?>
		<?php $articleData = $articleQuery->fetch(); ?>
		<link rel="stylesheet" href="../sharedParts/css/PS/showNews.css"/>
		<title><?php echo $articleData['title'];?> - PATRICK</title>
	</head>
	<body>
		<?php include_once("../sharedParts/php/header.php"); ?>
		<section id="article">
			<h2 id="articleTitle"><?php echo $articleData['title'];?></h2>
			<div id="articleImageContainer"><img id="articleImage" src=<?php echo '"../sharedParts/media/img/news/' . $articleData['imgPath'] . '"' ?> alt=<?php echo '"' . $articleData['imgCaptions'] . '"'; ?>/></div>
			<p id="articleAuthor">&Eacute;crit par <?php 
			$getAAuthorQuery = $DB->prepare("SELECT username FROM users WHERE ID = ?"    );
			$getAAuthorQuery->execute(array($articleData['authorID']));
			$artAuthUN = $getAAuthorQuery->fetch();
			echo $artAuthUN['username']; ?></p>
			<p id="articleContent"><?php echo $articleData['content']; ?></p>
		</section>
		<?php include_once("../sharedParts/php/footer.php"); ?>
		<script src="../sharedParts/js/header.js"></script>
		<script src="../sharedParts/js/footer.js"></script>
	</body>
</html>
