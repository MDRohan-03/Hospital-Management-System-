 function validateProfileForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var isValid = true;
 
        document.getElementById('usernameError').innerHTML = '';
        document.getElementById('passwordError').innerHTML = '';
        document.getElementById('confirmPasswordError').innerHTML = '';
 
        if (username.length < 3) {
            document.getElementById('usernameError').innerHTML = 'Username must be at least 3 characters long.';
            isValid = false;
        }
 
        if (password.length > 0) {
            if (password.length < 6) {
                document.getElementById('passwordError').innerHTML = 'Password must be at least 6 characters.';
                isValid = false;
            }
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').innerHTML = 'Passwords do not match.';
                isValid = false;
            }
        }

        return isValid;
    }