function validateDoctorForm() {

    let name = document.getElementById("doctor_name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let phone = document.getElementById("phone").value.trim();
    let specialization =document.getElementById("specialization").value;
    let fee = document.getElementById("fee").value;

    if (name === "") {
        alert("Doctor name is required.");
        return false;
    }


    if (email === "") {
        alert("Email is required.");
        return false;
    }


    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return false;
    }



    if (specialization === "") {
        alert("Please select a specialization.");
        return false;
    }


    if (fee === "" || Number(fee) <= 0) {
        alert("Please enter a valid consultation fee.");
        return false;
    }

    return true;
}