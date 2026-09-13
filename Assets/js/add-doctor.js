 function validateDoctorForm(form) {
    let name = form.name.value;
    let email = form.email.value;
    let phone = form.phone.value;
    let specialization = form.specialization.value;
    let password = form.password.value;

    let flag = true;

    document.getElementById('nameError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('phoneError').innerHTML = '';
    document.getElementById('specializationError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
 
    if (name === "") {
        document.getElementById('nameError').innerHTML = "Please enter full name.";
        flag = false;
    }  
 
    if (email === "") {
        document.getElementById('emailError').innerHTML = "Please enter email address.";
        flag = false;
    }  
    if (phone === "") {
        document.getElementById('phoneError').innerHTML = "Please enter phone number.";
        flag = false;
    }  
 
    if (specialization === "") {
        document.getElementById('specializationError').innerHTML = "Please select specialization.";
        flag = false;
    }
 
    if (password === "") {
        document.getElementById('passwordError').innerHTML = "Please enter a password.";
        flag = false;
    }  

    return flag;
}