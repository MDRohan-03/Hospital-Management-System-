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
    <?php include 'admin-nav.php'; ?>

    <div class="main-content" style="padding: 30px 20px; max-width: 1200px; margin: 0 auto;">
        <?php if ($profileSuccess): ?>
            <div class="alert alert-success"><?php echo $profileSuccess; ?></div>
        <?php endif; ?>
        <?php if ($profileError): ?>
            <div class="alert alert-error"><?php echo $profileError; ?></div>
        <?php endif; ?>

        <div class="profile-container">
            <h2>Edit Profile</h2>

            <form action="../controller/admin-profileController.php" method="POST">
                <div class="form-group">
                    <label for="username">New Username </label>
                    <input type="text" name="username" id="username"
                           placeholder="Enter new username"
                           onkeyup="showHint(this.value)">
                    <p>Status: <span id="txtHint"></span></p>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password"
                           placeholder="Enter new password (optional)">
                    <div class="form-hint">Minimum 6 characters. Leave empty to keep current password.</div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password"
                           placeholder="Confirm new password">
                </div>

                <div class="form-actions">
                    <button type="submit" name="update_profile" class="btn-submit">Save Changes</button>
                    <a href="admin-dashboard.php" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
     <script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "../controller/admin-profileController.php?check_username=" + encodeURIComponent(str), true);
            xmlhttp.send();
        }
    }
    </script>
</body>
</html>