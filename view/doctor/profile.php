<?php
session_start();
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] !== true) {
    header("Location: ../login.php");
    exit();
}

require '../../model/doctor/userModel.php';
$user = getUserByEmail($_SESSION['email']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Doctor Profile</title>
</head>

<body>
<?php include "docNav.php" ?>
<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

<h2>Doctor's Profile</h2>

<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>

<form method="post" action="../../controller/doctor/profileController.php" onsubmit="return validateForm(this)">

    <label for="name">Name:</label>

    <input type="text" name="name" id="name"
           value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>">

    <?php
    if (!empty($_SESSION['nameErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['nameErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="email">Email:</label>

    <input type="email" name="email" id="email"
           value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">

    <?php
    if (!empty($_SESSION['emailErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['emailErrMsg'] . "</span>";
    }
    ?>
    <br><br>
<label for="password">Password:</label>
<input type="password" name="password" id="password"
       value="<?php echo isset($user['password']) ? $user['password'] : ''; ?>">
    <br><br>


    <label for="phone">Phone:</label>

    <input type="text" name="phone" id="phone"
           value="<?php echo isset($user['phone']) ? $user['phone'] : ''; ?>">

    <?php
    if (!empty($_SESSION['phoneErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['phoneErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="specialization">Specialization:</label>

    <input type="text" name="specialization" id="specialization"
           value="<?php echo isset($user['specialization']) ? $user['specialization'] : ''; ?>">

    <?php
    if (!empty($_SESSION['specializationErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['specializationErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="medicalLicenseNumber">Medical License Number:</label>

    <input type="text" name="medicalLicenseNumber" id="medicalLicenseNumber"
           value="<?php echo isset($user['medicalLicenseNumber']) ? $user['medicalLicenseNumber'] : ''; ?>">

    <?php
    if (!empty($_SESSION['licenceErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['licenceErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="yearsOfExperience">Years of Experience:</label>

    <input type="number" name="yearsOfExperience" id="yearsOfExperience"
           min="0"
           value="<?php echo isset($user['yearsOfExperience']) ? $user['yearsOfExperience'] : ''; ?>">

    <?php
    if (!empty($_SESSION['yoeErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['yoeErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="consultationFee">Consultation Fee:</label>

    <input type="number" name="consultationFee" id="consultationFee"
           min="0"
           value="<?php echo isset($user['consultationFee']) ? $user['consultationFee'] : ''; ?>">

    <?php
    if (!empty($_SESSION['feeErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['feeErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="bio">Professional Bio:</label>

    <br>

    <textarea name="bio" id="bio" rows="5" cols="50"><?php
        echo isset($user['bio']) ? $user['bio'] : '';
    ?></textarea>

    <?php
    if (!empty($_SESSION['bioErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['bioErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <div style="text-align: center;">

        <input
            style="text-align: center;color:blue"
            type="submit"
            name="action"
            value="UpdateProfile"
        >

    </div>

</form>

</div>

<script src="../js/profile.js"></script>

</body>
</html>