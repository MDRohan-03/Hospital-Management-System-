 <?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$messageType = "";
$admin_name = "Admin User";
$email = "admin@hospital.com";
$phone = "01700000000";
$username = "admin";
$bio = "Hospital Administrator";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = trim($_POST["admin_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirm_password = trim($_POST["confirm_password"] ?? "");
    $bio = trim($_POST["bio"] ?? "");

    if (empty($admin_name)) {

        $message = "Full name is required.";
        $messageType = "error";

    } 
    elseif (!preg_match("/^[a-zA-Z ]+$/", $admin_name)) {

        $message = "Name can contain letters and spaces only.";
        $messageType = "error";

    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email.";
        $messageType = "error";

    } 
    elseif (!preg_match("/^[0-9]{11}$/", $phone)) {

        $message = "Phone number must contain 11 digits.";
        $messageType = "error";

    } 
    elseif (empty($username)) {

        $message = "Username is required.";
        $messageType = "error";

    } 
    elseif (!empty($password) && strlen($password) < 6) {

        $message = "Password must be at least 6 characters.";
        $messageType = "error";

    } 
    elseif ($password !== $confirm_password) {

        $message = "Passwords do not match.";
        $messageType = "error";

    } 
    else {

        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $email;

        $message = "Profile updated successfully!";
        $messageType = "success";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Admin Profile</title>
        <style>
            * {
                 margin: 0;
                 padding: 0;
                 box-sizing: border-box;
                  font-family: Arial, sans-serif;
                  }
            body {
               background-color: #f4f7fb;
              color: #333;
            }
            .sidebar {
                position: fixed;
               left: 0;
                  top: 0;
                width: 240px;
                height: 100vh;
                     background-color: #245941;
                  color: white;
                   padding: 25px 15px;
            }            
            .sidebar h2 {
                   text-align: center;
                 margin-bottom: 35px;
            }
            .sidebar a {
                display: block;
                color: white;
               text-decoration: none;
              padding: 14px 15px;
                margin: 8px 0;
                border-radius: 6px;
            }
           .sidebar a:hover,
           .sidebar a.active {
                background-color: #6da788;
            }
            .board {
                   margin-left: 240px;
                padding: 25px;
            }
           .topbar {
                 background-color: rgb(128, 180, 154);
               padding: 20px;
               border-radius: 10px;
                margin-bottom: 25px;
            }
           .topbar h1 {
                 color: #0b3f2d;
            }
           .table {
               background-color: white;
                padding: 25px;
                border-radius: 10px;
               box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }
            .table h2 {
                 color: #0b473a;
                   margin-bottom: 20px;
             }
           label {
               display: block;
                font-weight: bold;
                  margin-bottom: 7px;
            }
             input,
            textarea {
                 width: 100%;
                padding: 11px;
                border: 1px solid #ccc;
                 border-radius: 5px;
                margin-bottom: 15px;
            }
            textarea {
                   resize: vertical;
            }
           .btn {
                 background-color: #0f4a42;
               color: white;
             border: none;
              padding: 11px 20px;
              border-radius: 5px;
              cursor: pointer;
            }
            .message {
              padding: 12px;
              margin-bottom: 20px;
               border-radius: 5px;
            }
           .error {
                 background-color: #f8d7da;
               color: #721c24;
            }
           .success {
               background-color: #d4edda;
                color: #155724;
            }

        </style>
    </head>
    <body>
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="admin_dashboard.php"> Dashboard </a>
            <a href="admin-add-doctor.php" class="active">  Add Doctor </a>
            <a href="admin-managePatients.php"> Manage Patients </a>
            <a href="admin-edit-profile.php"> Edit Profile  </a>
            <a href="admin-announcement.php">   Announcement </a>
            <a href="logout.php">  Logout </a>
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
                 
                <form method="POST" onsubmit="return validateProfile();" >

                    <label>Full Name</label>
                    <input type="text" id="admin_name" name="admin_name" value="<?php echo htmlspecialchars($admin_name); ?>" >

                    <label>Email</label>
                    <input type="email" id="email" name="email"  value="<?php echo htmlspecialchars($email); ?>" >

                    <label>Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" >

                    <label>Username</label>
                    <input type="text"  id="username"  name="username" value="<?php echo htmlspecialchars($username); ?>" >

                    <label>New Password</label>
                    <input  type="password"  id="password"  name="password"  placeholder="Enter new password" >

                    <label>Confirm Password</label>
                    <input  type="password" id="confirm_password"  name="confirm_password" placeholder="Confirm new password" >

                    <label>Bio</label>
                    <textarea id="bio" name="bio" rows="5" >
                        <?php echo htmlspecialchars($bio); ?>
                    </textarea>

                    <button type="submit" class="btn"> Save Changes </button>
                </form>

            </div>

        </div>

        <script>
            function validateProfile() {
                let name = document.getElementById("admin_name").value.trim();
                let email = document.getElementById("email").value.trim();
                let phone =  document.getElementById("phone").value.trim();
                let username = document.getElementById("username").value.trim();
                let password = document.getElementById("password").value;
                let confirmPassword = document.getElementById("confirm_password").value;

                if (name === "") {
                      alert("Full name is required.");
                    return false;
                }

                if (!/^[a-zA-Z ]+$/.test(name)) {
                   alert("Name can contain letters and spaces only.");
                   return false;
                }

               if (email === "") {
                  alert("Email is required.");
                  return false;
                } 
                if (!/^[0-9]{11}$/.test(phone)) {
                   alert("Phone number must contain 11 digits.");
                   return false;
                }

                if (username === "") {
                   alert("Username is required.");
                   return false;
                }

                if (password !== "" && password.length < 6) {
                   alert("Password must be at least 6 characters.");
                   return false;
                }
               if (password !== confirmPassword) {
                   alert("Passwords do not match.");
                   return false;
                }

                return true;
            }

        </script>
    </body>
</html>