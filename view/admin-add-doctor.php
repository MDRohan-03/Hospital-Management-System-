<?php
session_start(); 
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
        <div class="form-container">
            <h2>Add New Doctor</h2>

            <form method="post" action="../controller/admin-doctorController.php" onsubmit="return validateDoctorForm(this)">
                <input type="hidden" name="submit_doctor" value="1">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name: </label>
                        <input type="text" name="name" id="name" placeholder="Enter doctor's full name">
                        <div id="nameError" class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" placeholder="Enter email address">
                        <div id="emailError" class="form-error"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone:  </label>
                        <input type="text" name="phone" id="phone" placeholder="Enter phone number">
                        <div id="phoneError" class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="specialization">Specialization: </label>
                        <select name="specialization" id="specialization">
                            <option value="">Select Specialization</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Neurologist">Neurologist</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="General Practitioner">General Practitioner</option>
                            <option value="Orthopedic">Orthopedic</option>
                            <option value="ENT Specialist">ENT Specialist</option>
                            <option value="Other">Other</option>
                        </select>
                        <div id="specializationError" class="form-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Enter password">
                    <div id="passwordError" class="form-error"></div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Add Doctor</button>
                    <a href="admin-manage-doctor.php" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
         
    </div>

    <script src="../Assets/js/add-doctor.js"></script>
</body>
</html>