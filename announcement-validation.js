function validateAnnouncementForm() {
    let title =document.getElementById("title").value.trim();
    let notice =document.getElementById("notice").value.trim();
    let audience =document.getElementById("audience").value;

    if (title === "") {
        alert("Announcement title is required.");
        return false;
    }

    if (title.length < 3) {
        alert("Announcement title must contain at least 3 characters.");
        return false;
    }

    if (notice === "") {
        alert("Notice body is required.");
        return false;
    }

    if (notice.length < 10) {
        alert("Notice body must contain at least 10 characters.");
        return false;
    }

    if (audience === "") {
        alert("Please select an audience.");
        return false;
    }

    return true;
}