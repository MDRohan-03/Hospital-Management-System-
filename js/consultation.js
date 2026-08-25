function validateForm(form) {

    let day = form.day.value;
    let startTime = form.startTime.value;
    let endTime = form.endTime.value;


let flag = true;
    if (day === "") {
        alert("Please select a day.");
        flag = false;
    }

    if (startTime === "") {
        alert("Start time is required.");
        flag = false;
    }

    
    if (endTime === "") {
        alert("End time is required.");
        flag = false;
    }

    if (endTime <= startTime) {
        alert("End time must be after start time.");
        flag = false;
    }

    if(flag===true){
        alert("Consultation schedule submitted successfully!");}
        
    return flag;
}