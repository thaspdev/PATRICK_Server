function footer() {
	var githubLink = document.getElementById("githubLink");
	var githubIconGreen = document.getElementById("githubIconGreen");
	var githubIconWhite = document.getElementById("githubIconWhite");
	githubLink.onmouseover = function(e) {
		githubIconGreen.style.display = "none";
		githubIconWhite.style.display = "inline";
	};
	githubLink.onmouseout = function(e) {
		githubIconGreen.style.display = "inline";
		githubIconWhite.style.display = "none";
	};
}

if (window.addEventListener) {
	window.addEventListener("load",footer,false);
} else if (window.attachEvent) {
	window.attachEvent("onload",footer);
}
