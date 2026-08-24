<?php

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$errormsg = "";

$title = "";
$notice = "";
$audience = "all";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"] ?? "");
    $notice = trim($_POST["notice"] ?? "");
    $audience = trim($_POST["audience"] ?? "");

    if (empty($title)) {$errormsg = "Announcement title is required.";} 
 
    elseif (empty($notice)) {$errormsg = "Notice body is required.";} 
 
    elseif (empty($audience)) {$errormsg = "Please select an audience.";} 
    else {

        $errormsg = "Announcement posted successfully!";

        $title = "";
        $notice = "";
        $audience = "all";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Announcement</title>
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
                <p>Post Hospital-wide Announcements</p>
            </div>

            <div class="table">
                <h2>Post Hospital-wide Announcement</h2>

                 <?php if ($errormsg != "") { ?>

    <div class="message">
        <?php echo htmlspecialchars($errormsg); ?>
    </div>

<?php } ?>

                <form method="POST"onsubmit="return validateAnnouncementForm();">
  
            <label for="title">Announcement Title</label>

            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>"placeholder="Enter announcement title">


            <label for="notice">Notice Body</label>
            <textarea id="notice"name="notice"rows="8"placeholder="Write announcement here...">
                <?php echo htmlspecialchars($notice); ?>
            </textarea>

            <label for="audience">Audience</label>
            <select id="audience"name="audience">

                <option value="all" <?php if ($audience == "all") echo "selected"; ?>> All </option>
                <option value="doctors"<?php if ($audience == "doctors") echo "selected"; ?>> Doctors </option>
                <option value="patients"<?php if ($audience == "patients") echo "selected"; ?>>Patients</option>
                <option value="admins"<?php if ($audience == "admins") echo "selected"; ?>>Admins</option>

            </select>

            <button type="submit"class="btn">Post Announcement</button>
            </form>

        </div>

    </div>
    <script src="announcement-validation.js"></script>

</body>

</html>