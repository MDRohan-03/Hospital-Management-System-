

function validate(form) {
    var email = form.email.value.trim();
    var password = form.password.value.trim();

    if (email === "") {
        alert("Please fill up the email properly");
        form.email.focus();
        return false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        form.email.focus();
        return false;
    }

    if (password === "") {
        alert("Please fill up the password properly");
        form.password.focus();
        return false;
    }

    if (password.length < 4) {
        alert("Password must be at least 4 characters long");
        form.password.focus();
        return false;
    }

    return true;
}