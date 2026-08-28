<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>

<body>

<?php
include "nav.php"
?>

<div class="main-content">
    <div class="form-container">
        <h2>Admin Profile</h2>
        <?php
        if (isset($_SESSION['success'])) {
            echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']);
        }
        ?>

        <form method="post"action="../../Controller/admin-profile-controller.php"onsubmit="return validateAdminProfileForm(this)">

            <label for="name">Name:</label>
            <input type="text"name="name"id="name"value="<?php echo isset($_SESSION['adminName']) ? $_SESSION['adminName'] : ''; ?>">
            <br><br>


            <label for="email">Email:</label>
            <input type="email"name="email"id="email"value="<?php echo isset($_SESSION['adminEmail']) ? $_SESSION['adminEmail'] : ''; ?>">
            <br><br>


            <label for="phone">Phone:</label>
            <input type="text"name="phone"id="phone"value="<?php echo isset($_SESSION['adminPhone']) ? $_SESSION['adminPhone'] : ''; ?>">
            <br><br>

            <div style="text-align:center">
                <input type="submit" value="Update Profile">
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/admin-validation.js"></script>
</body>
</html>