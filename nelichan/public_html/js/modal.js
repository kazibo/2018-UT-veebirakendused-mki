// Get the modal
var modalSign = document.getElementById('id01');
var modalLogin = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modalSign) {
		modalSign.style.display = "none";
	}
	else if (event.target == modalLogin) {
		modalLogin.style.display = "none";
	}
}