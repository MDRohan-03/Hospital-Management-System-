<?php
session_start();

// Clear error messages on fresh page load
if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] !== true) {
    $_SESSION['nameErrMsg'] = "";
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['phoneErrMsg'] = "";
}
$_SESSION['form_submitted'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        .form-group input {
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
        <h2>Admin Profile</h2>
        <?php
        if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
            echo "<p class='success-msg'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']);
        }
        ?>

        <form method="post" action="../../Controller/admin-profile-controller.php" onsubmit="return validateAdminProfileForm(this)">
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_SESSION['adminName']) ? htmlspecialchars($_SESSION['adminName']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['nameErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['nameErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['adminEmail']) ? htmlspecialchars($_SESSION['adminEmail']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['emailErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['emailErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="<?php echo isset($_SESSION['adminPhone']) ? htmlspecialchars($_SESSION['adminPhone']) : ''; ?>">
                <?php 
                if (!empty($_SESSION['phoneErrMsg'])) { 
                    echo "<span class='error-msg'>" . $_SESSION['phoneErrMsg'] . "</span>"; 
                } 
                ?>
            </div>

            <input type="submit" value="Update Profile" style="padding:10px 30px; background:#3498db; color:white; border:none; border-radius:4px; cursor:pointer;">
        </form>
    </div>
</div>

<script src="../../assets/js/admin-validation.js"></script>
</body>
</html>