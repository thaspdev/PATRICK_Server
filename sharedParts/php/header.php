<header>
	<div id="headSub">
		<div id="hd_lang_but_container">
			<button id="lang"><?php if(!isset($_COOKIE['PATRICK_lang'])){
				setcookie('PATRICK_lang','FR',time()+365*24*3600);
				echo 'FR';
			} else {
				echo($_COOKIE['PATRICK_lang']);
			}
			?></button>
		</div>
		<h1><a href="../PS/index.php">PATRICK</a></h1>
		<div id="hd_buttons_container">
			<button id="logIn">Connexion</button>
			<button id="signUp">Inscription</button>
		</div>
	</div>
	<nav>
		<ul>
			<li><a href="../PS/index.php">Accueil</a></li>
			<li><a href="../PS/news.php">Actualit&eacute;s</a></li>
			<li><a href="../PS/who.php">Qui sommes-nous ?</a></li>
			<li><a href="../PS/contact.php">Contact</a></li>
		</ul>
	</nav>
</header>
<div id="lang_submenu">
	<ul>
		<li>English</li>
		<li>Français</li>
		<li>Español</li>
	<ul>
</div>

<div id="logTopTriangle"></div>
<div id="log_submenu">
	<form id="logForm" action="../Processing/login.php" method="POST">
		<span>
			<label for="logInUsernameInput">Nom d'utilisateur : </label>
			<input id="logInUsernameInput" name="logInUsernameInput" class="logSubTxtInput" type="text"/>
		</span>
		<span>
			<label for="logInPasswordInput">Mot de passe :</label>
			<input id="logInPasswordInput" name="logInPasswordInput" class="logSubTxtInput" type="password"/>
		</span>
		<input id="logInSubmit" type="submit" value="Connexion"/>
	</form>
</div>
