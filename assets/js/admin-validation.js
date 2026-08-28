//admin login

function validateAdminLoginForm(p) {

    let email = p.email.value;
    let password = p.password.value;

    let flag = true;

    if (email === "") {
        alert("Email is required.");
        flag = false;
        return flag;
    }

    if (password === "") {
        alert("Password is required.");
        flag = false;
        return flag;
    }

    return flag;
}


//add doctor
function validateDoctorForm(p) {

    let name = p.name.value;
    let email = p.email.value;
    let password = p.password.value;
    let phone = p.phone.value;
    let specialization = p.specialization.value;
    let licenseNumber = p.licenseNumber.value;
    let yoe = p.yoe.value;
    let consultationFee = p.consultationFee.value;
    let bio = p.bio.value;

    let flag = true;

    if (name === "") {
        alert("Name is required.");
        flag = false;
        return flag;
    }

    if (email === "") {
        alert("Email is required.");
        flag = false;
        return flag;
    }

    if (password === "") {
        alert("Password is required.");
        flag = false;
        return flag;
    }

    if (phone === "") {
        alert("Phone number is required.");
        flag = false;
        return flag;
    }

    if (specialization === "") {
        alert("Specialization is required.");
        flag = false;
        return flag;
    }

    if (licenseNumber === "") {
        alert("Medical license number is required.");
        flag = false;
        return flag;
    }
 

    if (consultationFee === "") {
        alert("Consultation fee is required.");
        flag = false;
        return flag;
    }

    if (bio === "") {
        alert("Professional bio is required.");
        flag = false;
        return flag;
    }

    return flag;
}


//announcement

function validateNoticeForm(p) {

    let title = p.title.value;
    let description = p.description.value;

    let flag = true;

    if (title === "") {
        alert("Announcement title is required.");
        flag = false;
        return flag;
    }

    if (description === "") {
        alert("Announcement description is required.");
        flag = false;
        return flag;
    }

    return flag;
}


//admin profile
function validateAdminProfileForm(p) {

    let name = p.name.value;
    let email = p.email.value;
    let phone = p.phone.value;

    let flag = true;

    if (name === "") {
        alert("Name is required.");
        flag = false;
        return flag;
    }

    if (name.length < 3) {
        alert("Name must be at least 3 characters.");
        flag = false;
        return flag;
    }

    if (email === "") {
        alert("Email is required.");
        flag = false;
        return flag;
    }

    if (phone === "") {
        alert("Phone number is required.");
        flag = false;
        return flag;
    }

    return flag;
}