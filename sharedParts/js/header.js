window.onload = function(){
	function element(id) {
		return document.getElementById(id);
	}
	var doc = document;
	var logBTN = element("logIn");
	var logSub = element("log_submenu");
	var logTri = element("logTopTriangle");
	var displayed = false;
	function AnimationListener(e) {//Permet de n'acitver des propriétés que lorsque l'animation démarre/se termine
		if(e.animationName == "out" && e.type.toLowerCase().indexOf("animationend") >= 0) {
			logSub.style.display = "none";
			logTri.style.display = "none";
		}
	}
	logSub.addEventListener("animationend", AnimationListener, false);
	logTri.addEventListener("animationend", AnimationListener, false);
	logBTN.onclick = function(){
		if(!displayed){
			logSub.style.display = "flex";
			logTri.style.display = "block";
			logSub.className = "animateIn";
			logTri.className = "animateTriangleIn";
			displayed = true;
		} else {
			logSub.className = "animateOut";
			logTri.className = "animateTriangleOut";
			displayed = false;
		}
	};
};
