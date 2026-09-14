function checkEmail(value) {
    var emailMsg = document.getElementById("emailMsg");

    if (value === "") {
        emailMsg.innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        emailMsg.innerHTML = xhr.responseText.trim();
    };
xhr.open("GET", "../../controller/patient/checkEmail.php?email=" + encodeURIComponent(value), true);    xhr.send();
}

function validatePatient(p) {
    if (p.name.value === "")        { alert("Name is required");        return false; }
    if (p.email.value === "")       { alert("Email is required");       return false; }
    if (p.password.value === "")    { alert("Password is required");    return false; }
    if (p.phone.value === "")       { alert("Phone is required");       return false; }
    if (p.dob.value === "")         { alert("DOB is required");         return false; }
    if (p.bloodGroup.value === "")  { alert("Blood group is required"); return false; }
    if (p.address.value === "")     { alert("Address is required");     return false; }

    if (document.getElementById("emailMsg").innerHTML === "Email already exists") {
        alert("This email is already registered");
        return false;
    }

    return true;
}