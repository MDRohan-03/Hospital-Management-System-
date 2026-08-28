// admin login
function validateAdminLoginForm(form) {
    let email = form.email.value.trim();
    let password = form.password.value.trim();
    let flag = true;

    if (email === "") {
        alert("Email is required.");
        flag = false;
    }

    if (password === "") {
        alert("Password is required.");
        flag = false;
    }

    return flag;
}

// add doctor
function validateDoctorForm(form) {
    let name = form.name.value.trim();
    let email = form.email.value.trim();
    let password = form.password.value.trim();
    let phone = form.phone.value.trim();
    let specialization = form.specialization.value;
    let consultationFee = form.consultationFee.value.trim();
    let bio = form.bio.value.trim();
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

    if (consultationFee === "") {
        alert("Consultation fee is required.");
        flag = false;
        return flag;
    }

    if (bio === "") {
        alert("Bio is required.");
        flag = false;
        return flag;
    }

    return flag;
}

// announcement
function validateNoticeForm(form) {
    let title = form.title.value.trim();
    let description = form.description.value.trim();
    let flag = true;

    if (title === "") {
        alert("Announcement title is required.");
        flag = false;
    }

    if (description === "") {
        alert("Announcement description is required.");
        flag = false;
    }

    return flag;
}

// admin profile
function validateAdminProfileForm(form) {
    let name = form.name.value.trim();
    let email = form.email.value.trim();
    let phone = form.phone.value.trim();
    let flag = true;

    // Name validation
    if (name === "") {
        alert("Name is required.");
        flag = false;
        return flag;
    } 

    // Email validation
    if (email === "") {
        alert("Email is required.");
        flag = false;
        return flag;
    } 

    // Phone validation
    if (phone === "") {
        alert("Phone number is required.");
        flag = false;
        return flag;
    } 

    return flag;
}