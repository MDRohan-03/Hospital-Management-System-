function validate(form) {
	const email = form.email.value;
	const password = form.password.value;

	let flag = true;

	if (email === "") {
		alert("Please fill up the email properly");
		flag = false;
        return flag;
	}

	if (password === "") {
		alert("Please fill up the password properly");
		flag = false;
        return flag;
	}

	return flag;
}