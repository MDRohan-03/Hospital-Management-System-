<?php

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$message = "";

$patients = [

    [
        "id" => "23-2",
        "name" => "Rahim Ahmed",
        "email" => "rahim@gmail.com",
        "phone" => "01700000000",
        "account" => "Active",
        "bill" => "Pending"
    ],

    [
        "id" => "23-3",
        "name" => "Kahim Ahmed",
        "email" => "kahim@gmail.com",
        "phone" => "01700000000",
        "account" => "Deactive",
        "bill" => "Paid"
    ],

    [
        "id" => "23-4",
        "name" => "Jahim Ahmed",
        "email" => "jahim@gmail.com",
        "phone" => "01700000000",
        "account" => "Active",
        "bill" => "Paid"
    ]

];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = $_POST["action"] ?? "";
    $patient_id = $_POST["patient_id"] ?? "";

    if ($action == "paid") {
        $message = "Patient bill marked as paid.";
    } 
    elseif ($action == "activate") {
        $message = "Patient account activated.";
    } 
    elseif ($action == "deactivate") {

        $message = "Patient account deactivated.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Patients</title>

    <link rel="stylesheet" href="admin-style.css">

</head>

<body>

 <div class="sidebar">
               <h2>Admin Panel</h2>
               <a href="admin_dashboard.php" class="active"> Dashboard</a>
               <a href="admin-add-doctor.php"> Add Doctor</a>
               <a href="admin-managePatients.php"> Manage Patients </a>
               <a href="admin-edit-profile.php"> Edit Profile </a>
               <a href="admin-announcement.php"> Announcement </a>
               <a href="logout.php"> Logout</a>
          </div>



<div class="board">
    <div class="topbar">
        <h1>Hospital Management System</h1>
        <p>Manage patient accounts and bills</p>
    </div>

    <div class="table">
        <h2>Patient List</h2>

        <?php if ($message != "") { ?>
             <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php } ?>


        <div class="table-containe">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account</th>
                        <th>Bill</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                <?php foreach ($patients as $patient) { ?>
                    <tr>

                        <td><?php echo htmlspecialchars($patient["id"]); ?></td>
                        <td><?php echo htmlspecialchars($patient["name"]); ?></td>
                        <td><?php echo htmlspecialchars($patient["email"]); ?></td>
                        <td><?php echo htmlspecialchars($patient["phone"]); ?></td>

                        <td>
                         <?php
                             if ($patient["account"] == "Active") { ?>
                                <span class="status active">
                                    Active
                                </span>
                            <?php } 
                            else { ?>
                                <span class="status inactive">
                                    Deactive
                                </span>
                            <?php } 
                            ?>
                        </td>

                        <td>
                            <?php 
                            if ($patient["bill"] == "Paid") { ?>
                                <span class="status paid">
                                    Paid
                                </span>
                            <?php } 
                            else { ?>
                                <span class="status pending">
                                    Pending
                                </span>
                            <?php } ?>
                        </td>


                        <td>
                            <?php if ($patient["bill"] == "Pending") { ?>
                                <form method="POST" style="display:inline;">

                                    <input type="hidden"name="patient_id"value="<?php echo htmlspecialchars($patient["id"]); ?>">
                                    <input type="hidden"name="action"value="paid">
                                    <button type="submit"class="btn">
                                        Mark Paid
                                    </button>

                                </form>

                            <?php } ?>

                            <?php if ($patient["account"] == "Active") { ?>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden"name="patient_id"value="<?php echo htmlspecialchars($patient["id"]); ?>">

                                    <input type="hidden"name="action"value="deactivate">

                                    <button type="submit"class="btn">
                                        Deactivate
                                    </button>
                                </form>

                            <?php } else { ?>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden"name="patient_id"value="<?php echo htmlspecialchars($patient["id"]); ?>">
                                    <input type="hidden"name="action"value="activate">
                                    <button type="submit"class="btn">
                                        Activate
                                    </button>

                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
          </table>
        </div>
    </div>
</div>

<script src="patient-validation.js"></script>
</body>
</html>