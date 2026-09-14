<?php
session_start();
if (!isset($_SESSION['email']) || ($_SESSION['role'] ?? '') !== 'patient') {
    header("Location: ../login.php");
    exit();
}
if (!isset($_SESSION['doctors'])) {
    header("Location: ../../controller/patient/bookDoctorController.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Doctor</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

<?php include "nav.php"; ?>

<fieldset>
    <h1 id="text">Available Doctors</h1>

    <?php if (!empty($_SESSION['errorMsg'])): ?>
        <p style="color:red;"><?php echo htmlspecialchars($_SESSION['errorMsg']); unset($_SESSION['errorMsg']); ?></p>
    <?php endif; ?>

    <form method="get" action="../../controller/patient/bookDoctorController.php">
        <input type="text" name="search" placeholder="Search by name"
               value="<?php echo htmlspecialchars($_SESSION['search'] ?? ''); ?>">

        <select name="specialization">
            <option value="">All Specializations</option>
            <?php
            $specs = ['Cardiology','Dentistry','General Medicine','Neurology','Pediatrics','Orthopedics','Dermatology','Ophthalmology','Psychiatry','Radiology','Surgery','Urology'];
            for ($i = 0; $i < count($specs); $i++) {
                $sel = (($_SESSION['specialization'] ?? '') == $specs[$i]) ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($specs[$i]) . "' $sel>" . htmlspecialchars($specs[$i]) . "</option>";
            }
            ?>
        </select>
        <button type="submit">Search</button>
        <a href="../../controller/patient/bookDoctorController.php">Reset</a>
    </form>
    <br>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Experience</th>
            <th>Fee ($)</th>
            <th>Action</th>
        </tr>

        <?php if (count($_SESSION['doctors']) == 0) { ?>
            <tr><td colspan="5">No doctors found.</td></tr>
        <?php } else {
            for ($i = 0; $i < count($_SESSION['doctors']); $i++) {
                $d = $_SESSION['doctors'][$i];
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($d['name']); ?></td>
                    <td><?php echo htmlspecialchars($d['specialization']); ?></td>
                    <td><?php echo htmlspecialchars($d['yearsOfExperience']); ?> years</td>
                    <td>$<?php echo htmlspecialchars($d['consultationFee']); ?></td>
                    <td>
                        <a href="../../controller/patient/bookAppointmentPageController.php?doctor_id=<?php echo (int)$d['id']; ?>">Book</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</fieldset>

</body>
</html>