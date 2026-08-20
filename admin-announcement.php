 
?>
<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$messageType = "";

$title = "";
$notice = "";
$audience = "all";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"] ?? "");
    $notice = trim($_POST["notice"] ?? "");
    $audience = trim($_POST["audience"] ?? "");


    if (empty($title)) {

        $message = "Announcement title is required.";
        $messageType = "error";

    } elseif (empty($notice)) {

        $message = "Notice body is required.";
        $messageType = "error";

    } elseif (empty($audience)) {

        $message = "Please select an audience.";
        $messageType = "error";

    } else {

        /*
         * Later, database INSERT will go here.
         */

        $message = "Announcement posted successfully!";
        $messageType = "success";

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

input,
textarea,
select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
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

<a href="admin_dashboard.php">
Dashboard
</a>

<a href="admin-add-doctor.php">
Add Doctor
</a>

<a href="admin-managePatients.php">
Manage Patients
</a>

<a href="admin-edit-profile.php">
Edit Profile
</a>

<a href="admin-announcement.php" class="active">
Announcement
</a>

<a href="logout.php">
Logout
</a>

</div>


<div class="board">

<div class="topbar">

<h1>Hospital Management System</h1>

<p>Post Hospital-wide Announcements</p>

</div>


<div class="table">

<h2>Post Hospital-wide Announcement</h2>


<?php if ($message != "") { ?>

<div class="message <?php echo $messageType; ?>">
<?php echo htmlspecialchars($message); ?>
</div>

<?php } ?>


<form method="POST">

<input
    type="text"
    name="title"
    value="<?php echo htmlspecialchars($title); ?>"
    placeholder="Title"
>


<textarea
    rows="8"
    name="notice"
    placeholder="Notice body"
><?php echo htmlspecialchars($notice); ?></textarea>


<select name="audience">

<option value="all"
<?php if ($audience == "all") echo "selected"; ?>>
All
</option>

<option value="doctors"
<?php if ($audience == "doctors") echo "selected"; ?>>
Doctors
</option>

<option value="patients"
<?php if ($audience == "patients") echo "selected"; ?>>
Patients
</option>

<option value="admins"
<?php if ($audience == "admins") echo "selected"; ?>>
Admins
</option>

</select>


<button type="submit" class="btn">
Post
</button>

</form>

</div>

</div>

</body>
</html>