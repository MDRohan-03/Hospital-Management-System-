<?php

session_start();


if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$errormsg = "";
$successmsg = "";

$doctor_name = "";
$email = "";
$password = "";
$phone = "";
$specialization = "";
$fee = "";
$bio = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctor_name = trim($_POST["doctor_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $phone = trim($_POST["phone"]);
    $specialization = trim($_POST["specialization"]);
    $fee = trim($_POST["fee"]);
    $bio = trim($_POST["bio"]);



    if ($doctor_name == "") { $errormsg = "Doctor name is required.";} 

    elseif ($email == "") { $errormsg = "Email is required.";} 

    elseif ($password == "") { $errormsg = "Password is required.";}

    elseif (strlen($password) < 6) { $errormsg = "Password must be at least 6 characters.";} 
    elseif ($specialization == "") { $errormsg = "Please select a specialization.";}
    elseif ($fee == "" || $fee <= 0) {$errormsg = "Please enter a valid consultation fee."; }
    else {
        $successmsg = "Doctor added successfully!";

        $doctor_name = "";
        $email = "";
        $password = "";
        $phone = "";
        $specialization = "";
        $fee = "";
        $bio = "";
    }
}

?>

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Doctor</title>
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
                <p>Add a new doctor</p>
            </div>

            <div class="table">
                <h2>Doctor Information</h2>

                <?php if ($message != "") { ?>
                    <div class="message <?php echo $messageType; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php } ?>


                <form  method="POST" onsubmit="return validateDoctorForm();"  >

                    <label>Doctor Name</label>
                    <input type="text" id="doctor_name"  name="doctor_name" value="<?php echo htmlspecialchars($doctor_name); ?>" placeholder="Enter doctor name">

                    <label>Email</label>
                    <input type="email" id="email"  name="email" value="<?php echo htmlspecialchars($email); ?>"  placeholder="Enter email" >

                    <label>Password</label>
                    <input  type="password" id="password" name="password" placeholder="Enter password">

                    <label>Phone Number</label>
                    <input type="tel"id="phone"name="phone"value="<?php echo htmlspecialchars($phone); ?>"  placeholder="Enter phone number">

                    <label>Specialization</label>
                    <select id="specialization" name="specialization">

                        <option value="">Select Specialization</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="neurology">Neurology</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="gynecology">Gynecology</option>
                        <option value="general">General Medicine</option>
                    </select>

                    <label>Consultation Fee</label>
                    <input type="number" id="fee" name="fee" value="<?php echo htmlspecialchars($fee); ?>"placeholder="Enter consultation fee">

                    <label>Doctor Bio</label>
                    <textarea id="bio" name="bio" rows="5" placeholder="Write something about the doctor..."><?php echo htmlspecialchars($bio); ?></textarea>
 
                    <button type="submit" class="btn"> Add Doctor </button>

                </form>
            </div>
        </div>

        <script src="doctor-validation.js"></script>
    </body>
</html>