<?php
session_start();
/*
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
*/
// Get any session messages
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Doctor - Hospital Management System</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="main-content">
        <div class="page-header">
            <h1>Add New Doctor</h1>
            <a href="admin-manage-doctor.php" class="btn-cancel">← Back to Doctors</a>
        </div>

        <?php if($success): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
                <span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>

        <?php if($error): ?>
            <div class="alert alert-danger">
                <?php echo nl2br($error); ?>
                <span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h2>👨‍⚕️ Doctor Information</h2>

            <form method="post" action="../controller/admin-doctorController.php" onsubmit="return validateDoctorForm(this)">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name: <span class="required">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Enter doctor's full name" required>
                        <div class="form-error" id="nameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: <span class="required">*</span></label>
                        <input type="email" name="email" id="email" placeholder="Enter email address" required>
                        <div class="form-error" id="emailError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone: <span class="required">*</span></label>
                        <input type="text" name="phone" id="phone" placeholder="Enter phone number" required>
                        <div class="form-error" id="phoneError"></div>
                    </div>

                    <div class="form-group">
                        <label for="specialization">Specialization: <span class="required">*</span></label>
                        <select name="specialization" id="specialization" required>
                            <option value="">Select Specialization</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Neurologist">Neurologist</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="General Practitioner">General Practitioner</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="form-error" id="specializationError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password: <span class="required">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Enter password" required>
                        <div class="form-hint">Minimum 6 characters</div>
                        <div class="form-error" id="passwordError"></div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="admin-manage-doctor.php" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">✅ Add Doctor</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../Assets/js/add-doctor.js"></script>
</body>
</html>