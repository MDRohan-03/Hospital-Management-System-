<?php
session_start();

// Clear error messages on fresh page load (not after form submission)
if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] !== true) {
    $_SESSION['nameErrMsg'] = "";
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $_SESSION['phoneErrMsg'] = "";
    $_SESSION['specializationErrMsg'] = "";
    $_SESSION['feeErrMsg'] = "";
    $_SESSION['bioErrMsg'] = "";
}
$_SESSION['form_submitted'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
    <style>
        .error-msg {
            color: #e74c3c;
            font-size: 14px;
            display: block;
            margin-top: 5px;
        }
        .success-msg {
            color: #27ae60;
            text-align: center;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            max-width: 400px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php include "nav.php"; ?>

<div class="main-content">
    <div class="form-container">
        <h2>Add New Doctor</h2>

        <?php
        if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
            echo "<p class='success-msg'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']);
        }
        ?>

        <form method="post" action="../../Controller/admin-doctor-controller.php" onsubmit="return validateDoctorForm(this)">
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['nameErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['nameErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['emailErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['emailErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php 
                if (!empty($_SESSION['passwordErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['passwordErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['phoneErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['phoneErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <select name="specialization" id="specialization">
                    <option value="">Select Specialization</option>
                    <?php
                    $specializations = ['Cardiology', 'Neurology', 'Medicine', 'Orthopedics'];
                    foreach ($specializations as $spec) {
                        $selected = (isset($_SESSION['specialization']) && $_SESSION['specialization'] == $spec) ? 'selected' : '';
                        echo "<option value='$spec' $selected>$spec</option>";
                    }
                    ?>
                </select>
                <?php 
                if (!empty($_SESSION['specializationErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['specializationErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="consultationFee">Consultation Fee:</label>
                <input type="number" name="consultationFee" id="consultationFee" min="0" step="0.01" value="<?php echo isset($_SESSION['consultationFee']) ? htmlspecialchars($_SESSION['consultationFee']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['feeErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['feeErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="bio">Professional Bio:</label>
                <textarea name="bio" id="bio" rows="5" cols="50"><?php echo isset($_SESSION['bio']) ? htmlspecialchars($_SESSION['bio']) : ''; ?></textarea>
                <?php 
                if (!empty($_SESSION['bioErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['bioErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <input type="submit" value="Add Doctor" style="padding:10px 30px; background:#3498db; color:white; border:none; border-radius:4px; cursor:pointer;">
        </form>
    </div>
</div>

<script src="../../assets/js/admin-validation.js"></script>
</body>
</html>