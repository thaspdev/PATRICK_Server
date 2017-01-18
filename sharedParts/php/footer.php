<footer>
	<div id="footerLinks">
		<div id="footerContact">
			Nous contacter : 
			<ul>
				<li><a href="mailto:example@example.com">Par email</a></li>
				<li><a href="contact.php">Par formulaire</a></li>
				<li>Par téléphone au 0123456789</li>
			</ul>
		</div>
		<div id="footerSocialMedias">
			Retrouvez-nous sur :
			<ul>
				<li>
					<object id="githubIconGreen" data="../sharedParts/media/img/icons/Github_octicons/mark-github-green.svg" type="image/svg+xml"></object>
					<object id="githubIconWhite" data="../sharedParts/media/img/icons/Github_octicons/mark-github.svg" type="image/svg+xml"></object>
					<a id="githubLink" class="linkWithIcon" href="https://github.com/thaspdev/PATRICK">La page GitHub du projet</a>
				</li>
			</ul>
		</div>
		<div id="footerNewsletter">
			<p>Inscrivez-vous à notre newsletter ! C'est gratuit mam&egrave;ne !</p>
			<form method="POST" action="../Processing/newsletter.php">
				<label for="newsletterEmail">Adresse email : </label>
				<input id="newsletterEmail" name="newsletterEmailInput" type="email"/>
				<input id="newsletterSubmit" type="submit" value="OK !"/>
			</form>
		</div>
	</div>
</footer>
