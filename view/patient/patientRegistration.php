        
<?php
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
 
    <meta charset="UTF-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Patient Registration</title>
 
    <link rel="stylesheet" href="index.css">
 
</head>
 
<body>
 
<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">
 
    <h2>Patient Registration</h2>
 
 
    <!-- Success message -->
 
    <?php
 
    if (isset($_SESSION['success'])) {
 
        echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
 
        unset($_SESSION['success']);
    }
 
 
    // Error message
 
    if (isset($_SESSION['error'])) {
 
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
 
        unset($_SESSION['error']);
    }
 
    ?>
 
 
    <form method="post"
          action="../../controller/patient/patientRegistrationController.php">
 
 
        <!-- Name -->
 
        <label for="name">Name:</label>
 
        <input type="text" name="name" id="name"value="
        <?php
            echo isset($_SESSION['name']) ? $_SESSION['name'] : '';
            ?>"
        >
 
        <?php
 
        if (!empty($_SESSION['nameErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['nameErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Email -->
 
        <label for="email">Email:</label>
 
        <input
            type="email"
            name="email"
            id="email"
            value="<?php
            echo isset($_SESSION['email']) ? $_SESSION['email'] : '';
            ?>"
        >
 
        <?php
 
        if (!empty($_SESSION['emailErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['emailErrMsg'] .
                 "</span>";
       }
 
        ?>
 
        <br><br>
 
 
        <!-- Password -->
 
        <label for="password">Password:</label>
 
        <input
            type="password"
            name="password"
            id="password"
        >
 
        <?php
 
        if (!empty($_SESSION['passwordErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['passwordErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Phone -->
 
        <label for="phone">Phone:</label>
 
        <input
            type="text"
            name="phone"
            id="phone"
            value="<?php
            echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
            ?>"
        >
 
        <?php
 
        if (!empty($_SESSION['phoneErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['phoneErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Date of Birth -->
 
        <label for="dob">Date of Birth:</label>
 
        <input
            type="date"
            name="dob"
            id="dob"
            value="<?php
            echo isset($_SESSION['dob']) ? $_SESSION['dob'] : '';
            ?>"
        >
 
        <?php
 
        if (!empty($_SESSION['dobErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['dobErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Blood Group -->
 
        <label for="bloodGroup">Blood Group:</label>
 
        <select name="bloodGroup" id="bloodGroup">
 
            <option value="">Select Blood Group</option>
 
            <option value="A+"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'A+')
                      ? 'selected'
                      : '';
                ?>>
                A+
            </option>
 
            <option value="A-"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'A-')
                      ? 'selected'
                      : '';
                ?>>
                A-
            </option>
 
            <option value="B+"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'B+')
                      ? 'selected'
                      : '';
                ?>>
                B+
            </option>
 
            <option value="B-"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'B-')
                      ? 'selected'
                      : '';
                ?>>
                B-
            </option>
 
            <option value="AB+"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'AB+')
                      ? 'selected'
                      : '';
                ?>>
                AB+
            </option>
 
            <option value="AB-"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'AB-')
                      ? 'selected'
                      : '';
                ?>>
                AB-
            </option>
 
            <option value="O+"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'O+')
                      ? 'selected'
                      : '';
                ?>>
                O+
            </option>
 
            <option value="O-"
                <?php
                echo (isset($_SESSION['bloodGroup']) &&
                      $_SESSION['bloodGroup'] == 'O-')
                      ? 'selected'
                      : '';
                ?>>
                O-
            </option>
 
        </select>
 
        <?php
 
        if (!empty($_SESSION['bloodGroupErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['bloodGroupErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Address -->
 
        <label for="address">Address:</label>
 
        <br>
 
        <textarea
            name="address"
            id="address"
            rows="5"
            cols="50"
            placeholder="Enter your address"><?php
 
            echo isset($_SESSION['address'])
                ? $_SESSION['address']
                : '';
 
            ?></textarea>
 
        <?php
 
        if (!empty($_SESSION['addressErrMsg'])) {
 
            echo "<span style='color:red'>" .
                 $_SESSION['addressErrMsg'] .
                 "</span>";
        }
 
        ?>
 
        <br><br>
 
 
        <!-- Submit -->
 
        <input type="submit" value="Register"><br><br>
        <p>Already have an account? <a href="../login.php">Login here</a></p>
 
    </form>
 
</div>
 
</body>
 
</html>