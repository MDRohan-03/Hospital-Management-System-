<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: ../login.php");
    exit();
}



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
if (isset($_SESSION['successMsg'])) {
    echo "<p style='color:green'>" . $_SESSION['successMsg'] . "</p>";
    unset($_SESSION['successMsg']);
}
?>

<form method="post" action="../../controller/doctor/updateDoctorProfileController.php" onsubmit="return validateForm(this)">

    <label for="name">Name:</label>

    <input type="text" name="name" id="name"
 value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">

    <?php
    if (!empty($_SESSION['nameErrMsg'])) {
 echo "<span style='color:red'>" . $_SESSION['nameErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="email">Email:</label>

    <input type="email" readonly name="email" id="email"
value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">

    <?php
    if (!empty($_SESSION['emailErrMsg'])) {
echo "<span style='color:red'>" . $_SESSION['emailErrMsg'] . "</span>";
    }
    ?>
    <br><br>




    <label for="phone">Phone:</label>

    <input type="text" name="phone" id="phone"
value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">

    <?php
    if (!empty($_SESSION['phoneErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['phoneErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="specialization">Specialization:</label>

    <input type="text" name="specialization" id="specialization"
value="<?php echo isset($_SESSION['specialization']) ? $_SESSION['specialization'] : ''; ?>">

    <?php
    if (!empty($_SESSION['specializationErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['specializationErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="licenseNumber">Medical License Number:</label>

    <input type="text" name="licenseNumber" id="licenseNumber"
value="<?php echo isset($_SESSION['licenseNumber']) ? $_SESSION['licenseNumber'] : ''; ?>">

    <?php
    if (!empty($_SESSION['licenceErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['licenceErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="yearsOfExperience">Years of Experience:</label>

    <input type="number" name="yearsOfExperience" id="yearsOfExperience"
min="0"
value="<?php echo isset($_SESSION['yearsOfExperience']) ? $_SESSION['yearsOfExperience'] : ''; ?>">

    <?php
    if (!empty($_SESSION['yearsOfExperienceErrMsg'])) {
echo "<span style='color:red'>" . $_SESSION['yearsOfExperienceErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="consultationFee">Consultation Fee:</label>

    <input type="number" name="consultationFee" id="consultationFee"
min="0"
 value="<?php echo isset($_SESSION['consultationFee']) ? $_SESSION['consultationFee'] : ''; ?>">

    <?php
    if (!empty($_SESSION['feeErrMsg'])) {
echo "<span style='color:red'>" . $_SESSION['feeErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <label for="bio">Professional Bio:</label>

    <br>

    <textarea name="bio" id="bio" rows="5" cols="50"><?php
echo isset($_SESSION['bio']) ? $_SESSION['bio'] : '';
    ?></textarea>

    <?php
    if (!empty($_SESSION['bioErrMsg'])) {
        echo "<span style='color:red'>" . $_SESSION['bioErrMsg'] . "</span>";
    }
    ?>

    <br><br>


    <div style="text-align: center;">

<input style="text-align: center;color:blue"
type="submit" name="action" value="UpdateProfile"
>

</div>

</form>

</div>

<script src="../../js/profile.js"></script>

</body>
</html>