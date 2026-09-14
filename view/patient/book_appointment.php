<?php
session_start();
if (!isset($_SESSION['email']) || ($_SESSION['role'] ?? '') !== 'patient') {
    header("Location: ../login.php");
    exit();
}
if (empty($_SESSION['doctor']) || empty($_SESSION['schedules'])) {
    header("Location: ../../controller/patient/bookDoctorController.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

<?php include "nav.php"; ?>

<fieldset>
    <h1 id="text">Book Appointment</h1>

    <?php if (!empty($_SESSION['errorMsg'])): ?>
        <p style="color:red;"><?php echo htmlspecialchars($_SESSION['errorMsg']); unset($_SESSION['errorMsg']); ?></p>
    <?php endif; ?>

    <p>Doctor: <?php echo htmlspecialchars($_SESSION['doctor']['name']); ?></p>
    <p>Specialization: <?php echo htmlspecialchars($_SESSION['doctor']['specialization']); ?></p>
    <p>Fee: $<?php echo htmlspecialchars($_SESSION['doctor']['consultationFee']); ?></p>

    <form method="post" action="../../controller/patient/bookAppointmentController.php">
        <input type="hidden" name="doctor_id" value="<?php echo (int)$_SESSION['doctor']['id']; ?>">

        <label>Patient Name:</label>
        <input type="text" name="patientName" value="<?php echo htmlspecialchars($_SESSION['name']); ?>" required>
        <br><br>

        <label>Patient Email:</label>
        <input type="text" name="patientEmail" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
        <br><br>

        <label>Age:</label>
        <input type="text" name="patientAge" required>
        <br><br>

        <label>Gender:</label>
        <select name="patientGender" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
        <br><br>

        <label>Schedule:</label>
        <select name="schedule_index" required>
            <option value="">Select a slot</option>
            <?php for ($i = 0; $i < count($_SESSION['schedules']); $i++) {
                $row = $_SESSION['schedules'][$i];
            ?>
                <option value="<?php echo (int)$i; ?>">
                    <?php echo htmlspecialchars($row['day'].' '.$row['startTime'].' - '.$row['endTime']); ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <input type="submit" value="Book">
    </form>
</fieldset>

</body>
</html>