<?php

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$errormsg = "";

$admin_name = $_SESSION['admin_name'] ?? "Admin User";
$email = $_SESSION['admin_email'] ?? "admin@hospital.com";
$phone = "01700000000";
$username = "admin";
$password = "";
$confirm_password = "";
$bio = "Hospital Administrator";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $admin_name = trim($_POST["admin_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirm_password = trim($_POST["confirm_password"] ?? "");
    $bio = trim($_POST["bio"] ?? "");


    if (empty($admin_name)) {$errormsg = "Full name is required.";}
 
    elseif (empty($email)) {$errormsg = "Email is required.";}

    elseif (empty($username)) {$errormsg = "Username is required.";}

    elseif (!empty($password) && strlen($password) < 6) {$errormsg = "Password must be at least 6 characters.";}

    elseif ($password !== $confirm_password) {$errormsg = "Passwords do not match."; }

    else {

        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $email;

        $errormsg = "Profile updated successfully!";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Admin Profile</title>
        <link rel="stylesheet" href="admin-style.css">
    </head>
    <body>

        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="admin_dashboard.php" class="active"> Dashboard</a>
            <a href="admin-add-doctor.php"> Add Doctor</a>
            <a href="admin-managePatients.php"> Manage Patients </a>
            <a href="admin-edit-profile.php"> Edit Profile </a>
            <a href="admin-announcement.php"> Announcement </a>
            <a href="logout.php"> Logout</a>
        </div>

       <div class="board">
            <div class="topbar">
                <h1>Hospital Management System</h1>
                <p>Edit Profile</p>
            </div>

            <div class="table">
                <h2>Admin Information</h2>

                <?php if ($message != "") { ?>
                    <div class="message <?php echo $messageType; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
               <?php } ?>

               <form method="POST"onsubmit="return validateProfile();">
        
                <label>Full Name</label>
                <input type="text"id="admin_name"name="admin_name"value="<?php echo htmlspecialchars($admin_name); ?>">

                <label>Email</label>
                <input type="email"id="email"name="email"value="<?php echo htmlspecialchars($email); ?>">

                <label>Phone Number</label>
                <input type="tel"id="phone"name="phone"value="<?php echo htmlspecialchars($phone); ?>">

                <label>Username</label>
                <input type="text"id="username"name="username"value="<?php echo htmlspecialchars($username); ?>">

                <label>New Password</label>
                <input type="password"id="password"name="password"placeholder="Enter new password">

                <label>Confirm Password</label>
                <input type="password"id="confirm_password"name="confirm_password"placeholder="Confirm new password">

                <label>Bio</label>
                <textarea id="bio"name="bio"rows="5">
                    <?php echo htmlspecialchars($bio); ?>
                </textarea>

               <buttontype="submit"class="btn">Save Changes</button>

            </form>
        </div>
    </div>

    <script src="profile-validation.js"></script>

    </body>

</html>