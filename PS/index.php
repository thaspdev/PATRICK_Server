<?php
	session_start();
	include_once("../sharedParts/php/connectDB.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once("../sharedParts/php/head.php"); ?>
		<title>PATRICK</title>
	</head>
	<body>
		<?php include_once("../sharedParts/php/header.php"); ?>
		<section id="news">
			<div id="newsWrapper">
				<?php
				$articlesIDsArray = [];
				$featuredArticlesQuery = $DB->prepare("SELECT id, title, LEFT(content, 1000) AS extract, imgPath, imgCaptions, authorID FROM news WHERE featured=1 ORDER BY dateAdded DESC");
				$featuredArticlesQuery->execute();
				$fANum = 0;
				while($fAData = $featuredArticlesQuery->fetch()) {
				?>
					<div class="articleContainer">
						<div class="fATextContainer">
							<h2 class="fATitle"><?php echo $fAData['title']; ?></h2>
							<p class="fABegin"><?php echo $fAData['extract']; ?></p>
						<p class="fAAuthor">By <?php 
							$getFAAuthorQuery = $DB->prepare("SELECT username FROM users WHERE ID = ?");
							$getFAAuthorQuery->execute(array($fAData['authorID']));
							$fAAuthUN = $getFAAuthorQuery->fetch();
							echo $fAAuthUN['username']; ?></p>
						</div>
						<div class="fAImgContainer">
							<img class="fAImg" src=<?php echo '"../sharedParts/media/img/news/' . $fAData['imgPath'] . '"' ?> alt=<?php echo '"' . $fAData['imgCaptions'] . '"'; ?>/>
						</div>
					</div>
					<?php
					$fANum++;
					$articlesIDsArray[$fANum - 1] = $fAData['id'];
				}
			?>
			</div>
			<div id="slideshowButContainer">
				<?php
					for($i = 1; $i <= $fANum ; $i++) {
						?>
							<span class="slideshowDot" id=<?php echo '"slideDot' . $i . '"'; ?>></span>
						<?php
					}
				?>
			</div>
		</section>
		<section id="whoIsPatrick">
			<h2>¿Quién es PATRICK el robot?</h2>
			<p>Patrick est un robot con&ccedil;u pour faciliter la vie des personnes &agrave; mobilit&eacute; r&eacute;duite. Il peut en effet d&eacute;placer des charges allant jusqu'&agrave; 15kg et se rendre vers son utilisateur en d&eacute;tectant son visage.</p>
		</section>
		<?php include_once("../sharedParts/php/footer.php"); ?>
		<script src="../sharedParts/js/header.js"></script>
		<script src="../sharedParts/js/footer.js"></script>		
		<script>
			var slideshowIndex = 0;
			var slideshowTimeout;
			function featuredArticles(){
				var articleLinks = [];
				<?php
					foreach ($articlesIDsArray as $key => $val) {
						echo 'articleLinks[' . $key .'] = ' . $val . ';';
					}
				?>
				var begin = document.getElementsByClassName("fABegin");
				var content = [];
				for (var i = 0; i < begin.length; i++) {
					content[i] = begin[i].innerHTML;
				}
				for (var i = 0; i < begin.length; i++) {
					var cutContent = content[i].substring(0,Math.ceil(window.innerWidth / 5) - 15 ) + "...";
					begin[i].innerHTML = cutContent + ' <a class="readMoreLink" href="showNews.php?articleID=' + articleLinks[i] + '">' + 'Lire la suite' + '</a>';
					}
				window.onresize = function(){
					for (var i = 0; i < begin.length; i++) {
						var cutContent = content[i].substring(0,Math.ceil(window.innerWidth / 5) - 15 ) + "...";
						begin[i].innerHTML = cutContent + ' <a class="readMoreLink" href="showNews.php?articleID=' + articleLinks[i] + '">' + 'Lire la suite' + '</a>';
					}
				};
			}
			function slideshowButtons() {
				var articles = document.getElementsByClassName("articleContainer");
				var articleButtons = document.getElementsByClassName("slideshowDot");
				<?php for ($j = 0; $j < $fANum; $j++) {
					echo 'articleButtons[' . (string)($j) . '].onclick = function() { slideshowIndex = ' . (string)($j) .'; console.log(' . (string)($j) .'); clearTimeout(slideshowTimeout); slideshow();};';
				} ?>
			}
			function slideshow() {
				var articles = document.getElementsByClassName("articleContainer");
				var articleButtons = document.getElementsByClassName("slideshowDot");
				for (i = 0; i < articles.length; i++) {
					articles[i].style.display = "none";
					articles[i].className = "articleContainer";//On s'assure qu'ils n'ont que la classe articleContainer (et n'ont donc pas animateSlideIn)"
					articleButtons[i].className = "slideshowDot";//Ds le même genre que ligne précédente (mais pr "active")
				}
				articles[slideshowIndex].style.display = "block";
				articles[slideshowIndex].className += " animateSlideIn";
				articleButtons[slideshowIndex].className += " slideshowDotActive";
				if(slideshowIndex < articles.length -1){
					slideshowIndex++;
				} else {
					slideshowIndex = 0;
				}
				slideshowTimeout = setTimeout(slideshow, 5000);
			}
			if (window.addEventListener) {
				window.addEventListener('load', featuredArticles, false);
				window.addEventListener('load', slideshow, false);
				window.addEventListener('load', slideshowButtons, false);
			} else if (window.attachEvent) {
				window.attachEvent('onload', featuredArticles);
				window.attachEvent('onload', slideshow);
				window.attachEvent('onload', slideshowButtons);
			}
		</script>
	</body>
</html>
