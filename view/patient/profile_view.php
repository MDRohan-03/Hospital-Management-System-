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
    <?php include "nav.php";
include "../model/patientModel.php" ;
$email=$_SESSION["email"];
$result = getPatientByEmail($email);
?>

<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

<h2 >Patient's Profile</h2>
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>




<form method="post" action="../../controller/patientRegController.php" onsubmit="return validateForm(this)">

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
           placeholder="joboraz@gmail.com" value="<?php echo isset($result['email']) ? $result['email'] : ''; ?>">
           <?php
if (!empty($_SESSION['emailErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['emailErrMsg'] . "</span>";
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

    <label for="DateOfBirth">Date of Birth:</label>
    <input type="date" name="DateOfBirth" id="DateOfBirth"
           placeholder="" value="<?php echo isset($result['DateOfBirth']) ? $result['DateOfBirth'] : ''; ?>">
           <?php
if (!empty($_SESSION['dobErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['dobErrMsg'] . "</span>";
}
?>            
    <br><br>

    <label for="BloodGroup">Blood Group:</label>
    <input type="text" name="BloodGroup" id="BloodGroup"
           placeholder="" value="<?php echo isset($result['BloodGroup']) ? $result['BloodGroup'] : ''; ?>">
           <?php
if (!empty($_SESSION['bloodErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['bloodErrMsg'] . "</span>";
}
?>
    <br><br>

    <label for="Address">Address:</label>
    <input type="text" name="Address" id="Address"
           placeholder="" value="<?php echo isset($result['Address']) ? $result['Address'] : ''; ?>">
           <?php
if (!empty($_SESSION['addressErrMsg'])) {
       echo "<span style='color:red'>" . $_SESSION['addressErrMsg'] . "</span>";
} 
?>
    <br><br>
?>
   



</form>


</div>


</body>
</html>