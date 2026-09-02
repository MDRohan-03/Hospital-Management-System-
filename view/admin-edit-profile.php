<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <link rel="stylesheet" href="../../Assets/style.css">
</head>

<body>

     <?php include 'nav.php'; ?>

    <div class="main-content">

        <h1>Edit Profile</h1>

        <form action="../../Controller/admin-profileController.php" method="POST">

            <label>Username</label>
            <input type="text" name="username">

            <br><br>

            <label>New Password</label>
            <input type="password" name="password">

            <br><br>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password">

            <br><br>

            <button type="submit" name="update_profile">
                Save Changes
            </button>

            <a href="admin-dashboard.php">Cancel</a>

        </form>

    </div>
<script src="../Assets/js/edit-profile.js"></script>
</body>
</html>