// notice.js - Notice Form Validation

function validateNoticeForm() {
    let title = document.getElementById('title').value.trim();
    let description = document.getElementById('description').value.trim();

    let flag = true;

    // Clear previous errors
    document.getElementById('noticeTitleError').innerHTML = '';
    document.getElementById('noticeDescriptionError').innerHTML = '';

    // Title validation
    if (title === "") {
        document.getElementById('noticeTitleError').innerHTML = "Please enter a notice title.";
        flag = false;
    } else if (title.length < 5) {
        document.getElementById('noticeTitleError').innerHTML = "Title must be at least 5 characters.";
        flag = false;
    }

    // Description validation
    if (description === "") {
        document.getElementById('noticeDescriptionError').innerHTML = "Please enter notice description.";
        flag = false;
    } else if (description.length < 10) {
        document.getElementById('noticeDescriptionError').innerHTML = "Description must be at least 10 characters.";
        flag = false;
    }

    return flag;
}

function deleteNotice(id, title) {
    if (confirm(`Are you sure you want to delete the notice "${title}"?`)) {
        window.location.href = `../../controller/admin-noticeController.php?action=delete&id=${id}`;
    }
}