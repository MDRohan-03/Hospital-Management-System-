 function validateDoctorForm(form) {
    let name = form.name.value.trim();
    let email = form.email.value.trim();
    let phone = form.phone.value.trim();
    let specialization = form.specialization.value;
    let password = form.password.value;

    let flag = true;

    document.getElementById('nameError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('phoneError').innerHTML = '';
    document.getElementById('specializationError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
 
    if (name === "") {
        document.getElementById('nameError').innerHTML = "Please enter the doctor's full name.";
        flag = false;
    } else if (name.length < 3) {
        document.getElementById('nameError').innerHTML = "Name must be at least 3 characters long.";
        flag = false;
    }
 
    if (email === "") {
        document.getElementById('emailError').innerHTML = "Please enter the doctor's email address.";
        flag = false;
    } else if (!email.includes('@') || !email.includes('.')) {
        document.getElementById('emailError').innerHTML = "Please enter a valid email address.";
        flag = false;
    }
 
    if (phone === "") {
        document.getElementById('phoneError').innerHTML = "Please enter the doctor's phone number.";
        flag = false;
    } else if (!/^[0-9+\-\s]{10,15}$/.test(phone)) {
        document.getElementById('phoneError').innerHTML = "Please enter a valid phone number (10-15 digits).";
        flag = false;
    }
 
    if (specialization === "") {
        document.getElementById('specializationError').innerHTML = "Please select the doctor's specialization.";
        flag = false;
    }
 
    if (password === "") {
        document.getElementById('passwordError').innerHTML = "Please enter a password.";
        flag = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').innerHTML = "Password must be at least 6 characters.";
        flag = false;
    }

    return flag;
}