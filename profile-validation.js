function validateProfile() {

    let name =document.getElementById("admin_name").value.trim();
    let email =document.getElementById("email").value.trim();
    let phone =document.getElementById("phone").value.trim();
    let username =document.getElementById("username").value.trim();
    let password =document.getElementById("password").value;
    let confirmPassword =document.getElementById("confirm_password").value;


    if (name === "") {
        alert("Full name is required.");
        return false;
    }



    if (email === "") {
        alert("Email is required.");
        return false;
    }


    if (username === "") {
        alert("Username is required.");
        return false;
    }



    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}