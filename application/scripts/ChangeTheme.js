// set local storage item if it doesn't exit:
if (localStorage.getItem("theme") === null) {
	localStorage.setItem("theme", "dark");
}

/* jQuery method:

$(document).ready(function () {
	$('#changeStyleButton').click(function () {
		$('link[rel=pagestyle]').attr({'href': '/application/css/LightStyle.css'});
		console.log("Button pressed");
	});
}); */

// pure js method:
document.addEventListener("DOMContentLoaded", initialiseWebPage)

function initialiseWebPage() {

	// get base URL:
	var getUrl = window.location;
	var baseURL = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

	// set theme based upon local storage:
	if (localStorage.getItem("theme") === "dark") {
		document.getElementById("pagestyle").setAttribute("href", baseURL + "/application/css/DarkStyle.css");
	} else {
		document.getElementById("pagestyle").setAttribute("href", baseURL + "/application/css/LightStyle.css");
	}

	const changeStyleButton = document.getElementById("changeStyleButton");
	changeStyleButton.addEventListener("click", swapStyleSheet);

	// swap style:
	function swapStyleSheet() {

		console.log("Change theme button clicked");

		if (document.getElementById("pagestyle").getAttribute("href") === baseURL + "/application/css/LightStyle.css") {
			document.getElementById("pagestyle").setAttribute("href", baseURL + "/application/css/DarkStyle.css");
			localStorage.setItem("theme", "dark");
		} else {
			document.getElementById("pagestyle").setAttribute("href", baseURL + "/application/css/LightStyle.css");
			localStorage.setItem("theme", "light");
		}
	}
}
