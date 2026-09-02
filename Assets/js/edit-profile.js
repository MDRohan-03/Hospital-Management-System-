// edit-profile.js - Profile Form Validation

function validateProfileForm(form) {
    const username = form.username.value.trim();
    const password = form.password.value;
    const confirmPassword = form.confirm_password.value;

    let flag = true;

    // Clear previous errors
    document.getElementById('usernameError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
    document.getElementById('confirmPasswordError').innerHTML = '';

    // Username validation
    if (username === "") {
        document.getElementById('usernameError').innerHTML = "Username is required.";
        flag = false;
    } else if (username.length < 3) {
        document.getElementById('usernameError').innerHTML = "Username must be at least 3 characters.";
        flag = false;
    }

    // Password validation (only if password is provided)
    if (password !== "") {
        if (password.length < 6) {
            document.getElementById('passwordError').innerHTML = "Password must be at least 6 characters.";
            flag = false;
        }
        
        // Confirm password validation
        if (password !== confirmPassword) {
            document.getElementById('confirmPasswordError').innerHTML = "Passwords do not match.";
            flag = false;
        }
    }

    return flag;
}