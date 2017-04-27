// Javascript Document

function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}
function onlyAlphabets(evt) {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
	if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
		return false;
	}
	return true;
}

function checkDelete() {
	if (confirm("Apakah Anda yakin?")) {
		window.location.href='sendelete.php';
		document.form.action = "sendelete.php";
	} else {
		return false;
	}
}

function toEdit() {
	document.form.action = "AdminEdit.php";
}

function toSend() {
	document.form.action = "sendform.php";
}

function toLogin() {
	document.form.action = "sendlogin.php";
}