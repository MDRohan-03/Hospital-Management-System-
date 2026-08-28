<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>

<body>

<?php
include "nav.php"
?>

<div class="main-content">
    <div class="form-container">
        <h2>Add New Doctor</h2>

        <?php
        if (isset($_SESSION['success'])) {
            echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']);

        }
        ?>

        <form method="post" action="../../Controller/admin-doctor-controller.php" onsubmit="return validateDoctorForm(this)">

            <label for="name">Name:</label>
            <input type="text"name="name"id="name"value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            <br><br>


            <label for="email">Email:</label>
            <input type="email"name="email"id="email"value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <br><br>


            <label for="password">Password:</label>
            <input type="password"name="password"id="password">
            <br><br>


            <label for="phone">Phone:</label>
            <input type="text"name="phone"id="phone"value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
            <br><br>


            <label for="specialization">Specialization:</label>
            <select name="specialization" id="specialization">

                <option value="">Select Specialization</option>
                <option value="Cardiology"
                    <?php echo (isset($_SESSION['specialization']) && $_SESSION['specialization'] == "Cardiology") ? "selected" : ""; ?>>
                    Cardiology</option>

                <option value="Neurology"
                    <?php echo (isset($_SESSION['specialization']) && $_SESSION['specialization'] == "Neurology") ? "selected" : ""; ?>>
                    Neurology</option>

                <option value="Medicine"
                    <?php echo (isset($_SESSION['specialization']) && $_SESSION['specialization'] == "Medicine") ? "selected" : ""; ?>>
                    Medicine</option>

                <option value="Orthopedics"
                    <?php echo (isset($_SESSION['specialization']) && $_SESSION['specialization'] == "Orthopedics") ? "selected" : ""; ?>>
                    Orthopedics</option>

            </select>
  <br><br>
            <label for="consultationFee">Consultation Fee:</label>

            <input type="number"name="consultationFee"id="consultationFee"min="0"value="<?php echo isset($_SESSION['consultationFee']) ? $_SESSION['consultationFee'] : ''; ?>">
            <br><br>


            <label for="bio">Professional Bio:</label>
            <br>
            <textarea name="bio"id="bio"rows="5"cols="50"><?php echo isset($_SESSION['bio']) ? $_SESSION['bio'] : ''; ?>
        </textarea>
            <br><br>


            <input type="submit" value="Add Doctor">
        </form>
    </div>
       </div>
       <script src="../../assets/js/admin-validation.js"></script>
    </body>
</html>