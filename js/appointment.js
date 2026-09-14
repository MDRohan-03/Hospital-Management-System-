

const xhr = new XMLHttpRequest();

		xhr.onload = function() {
			console.log(xhr.responseText);
			document.getElementById("msg").innerHTML = xhr.responseText;
		}

		xhr.open("POST", "../controller/appointmentController.php");
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.send("status=" + jsstatus);

    