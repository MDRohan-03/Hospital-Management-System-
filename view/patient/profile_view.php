<?php
session_start();
if (!isset($_SESSION['email']) || ($_SESSION['role'] ?? '') !== 'patient') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

<?php include "nav.php"; ?>

<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

    <h2>Patient's Profile</h2>

    <?php
    if (isset($_SESSION['successMsg'])) {
        echo "<p style='color:green'>" . htmlspecialchars($_SESSION['successMsg']) . "</p>";
        unset($_SESSION['successMsg']);
    }
    if (isset($_SESSION['errorMsg'])) {
        echo "<p style='color:red'>" . htmlspecialchars($_SESSION['errorMsg']) . "</p>";
        unset($_SESSION['errorMsg']);
    }
    ?>

    <form method="post" action="../../controller/patient/profileController.php" onsubmit="return validateForm(this)">

        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?>">
        <?php if (!empty($_SESSION['nameErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['nameErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <label for="email">Email:</label><br>
        <input type="email" readonly name="email" id="email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>">
        <br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($_SESSION['phone'] ?? ''); ?>">
        <?php if (!empty($_SESSION['phoneErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['phoneErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <label for="DateOfBirth">Date of Birth:</label><br>
        <input type="date" name="DateOfBirth" id="DateOfBirth" value="<?php echo htmlspecialchars($_SESSION['dob'] ?? ''); ?>">
        <?php if (!empty($_SESSION['dobErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['dobErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <label for="BloodGroup">Blood Group:</label><br>
        <select name="BloodGroup" id="BloodGroup">
            <option value="">Select Blood Group</option>
            <?php
            $bgList    = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
            $currentBg = $_SESSION['bloodGroup'] ?? '';
            foreach ($bgList as $bg) {
                $selected = ($currentBg === $bg) ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($bg) . "' $selected>" . htmlspecialchars($bg) . "</option>";
            }
            ?>
        </select>
        <?php if (!empty($_SESSION['bloodGroupErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['bloodGroupErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <label for="Address">Address:</label><br>
        <textarea name="Address" id="Address" rows="3" cols="40"><?php echo htmlspecialchars($_SESSION['address'] ?? ''); ?></textarea>
        <?php if (!empty($_SESSION['addressErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['addressErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <label for="Password">Password:</label><br>
        <input type="password" name="Password" id="Password" value="<?php echo htmlspecialchars($_SESSION['password'] ?? ''); ?>">
        <?php if (!empty($_SESSION['passwordErrMsg'])): ?>
            <br><span style="color:red"><?php echo htmlspecialchars($_SESSION['passwordErrMsg']); ?></span>
        <?php endif; ?>
        <br><br>

        <input type="hidden" name="role" value="<?php echo htmlspecialchars($_SESSION['role'] ?? 'patient'); ?>">

        <div style="text-align: center;">
            <input type="submit" value="Update Profile" style="color:blue; padding: 10px 20px; cursor:pointer;">
        </div>
    </form>

</div>

<script src="../../js/profile.js"></script>

</body>
</html>