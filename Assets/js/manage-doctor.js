// manage-doctor.js - Manage Doctors JavaScript

function deactivateDoctor(id, name) {
    if (confirm(`Are you sure you want to deactivate Dr. ${name}? This will permanently remove the doctor from the system.`)) {
        window.location.href = `../controller/admin-doctorController.php?action=delete&id=${id}`;
    }
}

function searchDoctor() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let rows = document.querySelector('table tbody').rows;
    
    for (let i = 0; i < rows.length; i++) {
        let cells = rows[i].cells;
        let match = false;
        for (let j = 0; j < cells.length - 1; j++) {
            if (cells[j].textContent.toLowerCase().includes(input)) {
                match = true;
                break;
            }
        }
        rows[i].style.display = match ? '' : 'none';
    }
}