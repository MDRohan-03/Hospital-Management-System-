// add-doctor.js - Client-side validation only

function validateDoctorForm(form) {
    let name = form.name.value.trim();
    let email = form.email.value.trim();
    let phone = form.phone.value.trim();
    let specialization = form.specialization.value;
    let password = form.password.value;

    let flag = true;

    // Clear previous errors
    clearErrors();

    // Name validation
    if (name === "") {
        document.getElementById('nameError').innerHTML = "Please enter the doctor's full name.";
        flag = false;
    } else if (name.length < 3) {
        document.getElementById('nameError').innerHTML = "Name must be at least 3 characters long.";
        flag = false;
    }

    // Email validation
    if (email === "") {
        document.getElementById('emailError').innerHTML = "Please enter the doctor's email address.";
        flag = false;
    } else if (!email.includes('@') || !email.includes('.')) {
        document.getElementById('emailError').innerHTML = "Please enter a valid email address.";
        flag = false;
    }

    // Phone validation
    if (phone === "") {
        document.getElementById('phoneError').innerHTML = "Please enter the doctor's phone number.";
        flag = false;
    } else if (!/^[0-9+\-\s]{10,15}$/.test(phone)) {
        document.getElementById('phoneError').innerHTML = "Please enter a valid phone number.";
        flag = false;
    }

    // Specialization validation
    if (specialization === "") {
        document.getElementById('specializationError').innerHTML = "Please select the doctor's specialization.";
        flag = false;
    }

    // Password validation
    if (password === "") {
        document.getElementById('passwordError').innerHTML = "Please enter a password.";
        flag = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').innerHTML = "Password must be at least 6 characters.";
        flag = false;
    }

    return flag;
}

function clearErrors() {
    const errorElements = document.querySelectorAll('.form-error');
    errorElements.forEach(element => {
        element.innerHTML = '';
    });
}

// Real-time phone number validation
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9+\-\s]/g, '');
        });
    }
});