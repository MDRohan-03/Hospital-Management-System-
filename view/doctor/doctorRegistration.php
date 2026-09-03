<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<body>
   

<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

<h2 >Doctor Registration</h2>
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>




<form method="post" action="../../controller/doctor/profileController.php" onsubmit="return validateForm(this)">

    <label for="name">Name:</label>
    <input type="text" name="name" id="name"
           placeholder="" value="<?php echo isset($result['name']) ? $result['name'] : ''; ?>">
           <?php
if (!empty($_SESSION['nameErrMsg'])) {
    echo "<span style='color:red'>" . $_SESSION['nameErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email"
           placeholder="" value="<?php echo isset($result['email']) ? $result['email'] : ''; ?>">
           <?php
if (!empty($_SESSION['emailErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['emailErrMsg'] . "</span>";
}
?>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"
           placeholder="" value="<?php echo isset($result['password']) ? $result['password'] : ''; ?>">
           <?php
if (!empty($_SESSION['passwordErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['passwordErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone"
           placeholder="" value="<?php echo isset($result['phone']) ? $result['phone'] : ''; ?>">
           <?php
if (!empty($_SESSION['phoneErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['phoneErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="specialization">Specialization:</label>
    <input type="text" name="specialization" id="specialization"
           placeholder="" value="<?php echo isset($result['specialization']) ? $result['specialization'] : ''; ?>">
           <?php
if (!empty($_SESSION['specializationErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['specializationErrMsg'] . "</span>";
}
?>            
    <br><br>

    <label for="medicalLicenseNumber">Medical License Number:</label>
    <input type="text" name="medicalLicenseNumber" id="medicalLicenseNumber"
           placeholder="" value="<?php echo isset($result['medicalLicenseNumber']) ? $result['medicalLicenseNumber'] : ''; ?>">
           <?php
if (!empty($_SESSION['licenceErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['licenceErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="yearsOfExperience">Years of Experience:</label>
    <input type="number" name="yearsOfExperience" id="yearsOfExperience"
           min="0" placeholder="5" value="<?php echo isset($result['yearsOfExperience']) ? $result['yearsOfExperience'] : ''; ?>">
                 <?php
if (!empty($_SESSION['yoeErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['yoeErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="consultationFee">Consultation Fee:</label>
    <input type="number" name="consultationFee" id="consultationFee"
           min="0"  placeholder="" value="<?php echo isset($result['consultationFee']) ? $result['consultationFee'] : ''; ?>">
                 <?php
if (!empty($_SESSION['feeErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['feeErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="professionalBio">Professional Bio:</label><br>
  <textarea name="professionalBio" id="professionalBio" rows="5" cols="50"
    placeholder=""><?php
    echo isset($result['professionalBio']) ? $result['professionalBio'] : '';
?></textarea>

<?php
if (!empty($_SESSION['bioErrMsg'])) {
    echo "<span style='color:red'>" . $_SESSION['bioErrMsg'] . "</span>";
}
?>
              
    <br><br>

    <div style="text-align: center;">
       <input style="text-align: center;color:blue" type="submit" name="action" value="createDoctor">
    </div>

</form>


</div>


<script src="../js/profile.js"></script>
</body>
</html>