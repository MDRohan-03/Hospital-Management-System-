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
    <?php include "docNav.php"?>

<?php include "../../model/doctor/consultationModel.php" ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$consultation = getConsultationById($id);
$result = mysqli_fetch_assoc($consultation);
?>
    <div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

<h3>Update Schedule</h3>
 <?php
        if (isset($_SESSION['dbErrmsg']) && !empty($_SESSION['dbErrmsg'])) {
            echo "<p style='color:red'>" . $_SESSION['dbErrmsg'] . "</p>";
            unset($_SESSION['dbErrmsg']);
        }
        if (isset($_SESSION['dbSuccessmsg']) && !empty($_SESSION['dbSuccessmsg'])) {
            echo "<p style='color:green'>" . $_SESSION['dbSuccessmsg'] . "</p>";
            unset($_SESSION['dbSuccessmsg']);
        }
        ?>

 <form method="post" action="../../controller/doctor/consultationController.php" onsubmit="return validateForm(this)">

            <label for="day">Select a day:</label>

            <select name="day" id="day">
                <option value="Monday"
                    <?php echo ($result['day'] == "Monday") ? "selected" : ""; ?>>
                    Monday
                </option>
                <option value="Tuesday"
                    <?php echo ($result['day'] == "Tuesday") ? "selected" : ""; ?>>
                    Tuesday
                </option>
                <option value="Wednesday"
                    <?php echo ($result['day'] == "Wednesday") ? "selected" : ""; ?>>
                    Wednesday
                </option>
                <option value="Thursday"
                    <?php echo ($result['day'] == "Thursday") ? "selected" : ""; ?>>
                    Thursday
                </option>
                <option value="Friday"
                    <?php echo ($result['day'] == "Friday") ? "selected" : ""; ?>>
                    Friday
                </option>
            </select>
            <?php
            if (!empty($_SESSION['dayErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['dayErrmsg'] . "</span>";
            }
            ?>
            <br><br>
            <label for="startTime">Select start time:</label>

            <input type="time" name="startTime" id="startTime"
                value="<?php echo isset($result['startTime']) ? $result['startTime'] : ''; ?>">
            <?php
            if (!empty($_SESSION['startTimeErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['startTimeErrmsg'] . "</span>";
            }
            ?>
            <br><br>
            <label for="endTime">Select end time:</label>
            <input type="time" name="endTime" id="endTime"
                value="<?php echo isset($result['endTime']) ? $result['endTime'] : ''; ?>">
            <?php
            if (!empty($_SESSION['endTimeErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['endTimeErrmsg'] . "</span>";
            }
            ?> <br><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input style="color:blue;" type="submit" name="action" value="update">
        </form>

    </div>
</body>
</html>