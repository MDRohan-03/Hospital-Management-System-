<?php
session_start();
 
$profileSuccess = $_SESSION['profileSuccess'] ?? null;
$profileError = $_SESSION['profileError'] ?? null;
unset($_SESSION['profileSuccess'], $_SESSION['profileError']);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Hospital Management System</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="main-content" style="padding: 30px 20px; max-width: 1200px; margin: 0 auto;">
        <?php if ($profileSuccess): ?>
            <div class="alert alert-success"><?php echo $profileSuccess; ?></div>
        <?php endif; ?>
        <?php if ($profileError): ?>
            <div class="alert alert-error"><?php echo $profileError; ?></div>
        <?php endif; ?>

        <div class="profile-container">
            <h2>Edit Profile</h2>
                        
            <form action="../controller/admin-profileController.php" method="POST" onsubmit="return validateProfileForm()">
                <div class="form-group">
                    <label for="username">New Username <span style="color: red;">*</span></label>
                    <input type="text" name="username" id="username" 
                           placeholder="Enter new username" required>
                    <span id="usernameError" class="error"></span>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" 
                           placeholder="Enter new password (optional)">
                    <div class="form-hint">Minimum 6 characters. Leave empty to keep current password.</div>
                    <span id="passwordError" class="error"></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                           placeholder="Confirm new password">
                    <span id="confirmPasswordError" class="error"></span>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update_profile" class="btn-submit">Save Changes</button>
                    <a href="admin-dashboard.php" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>