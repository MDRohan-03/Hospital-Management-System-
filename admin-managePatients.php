 <?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$patients = [
    [ "id" => "23-2",   "name" => "Rahim Ahmed", "email" => "rahim@gmail.com", "phone" => "01700000000",  "account" => "Active","bill" => "Pending"],
    [  "id" => "23-3", "name" => "Kahim Ahmed",  "email" => "kahim@gmail.com", "phone" => "01700000000",  "account" => "Deactive",  "bill" => "Paid" ],
    [ "id" => "23-4", "name" => "Jahim Ahmed",  "email" => "jahim@gmail.com",   "phone" => "01700000000",   "account" => "Active",  "bill" => "Paid" ]
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
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }
            body {
                background-color: #f4f7fb;
               color: #333;
             }
            .sidebar {
                 position: fixed;
                left: 0;
                top: 0;
                width: 240px;
               height: 100vh;
                  background-color: #245941;
               color: white;
              padding: 25px 15px;
            }
            .sidebar h2 {
                text-align: center;
                margin-bottom: 35px;
            }
            .sidebar a {
                 display: block;
                   color: white;
                 text-decoration: none;
                 padding: 14px 15px;
                  margin: 8px 0;
                 border-radius: 6px;
            }
           .sidebar a:hover,
            .sidebar a.active {
               background-color: #6da788;
            }
           .board {
               margin-left: 240px;
               padding: 25px;
            }              

           .topbar {
              background-color: rgb(128, 180, 154);
              padding: 20px;
                border-radius: 10px;
                 margin-bottom: 25px;
               }
               .topbar h1 {
              color: #0b3f2d;
                margin-bottom: 8px;
             } 
            .table {
              background-color: white;
             padding: 25px;
              border-radius: 10px;
               box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }
           .table h2 {
              color: #0b473a;
              margin-bottom: 20px;
            }
           .table-container {
               overflow-x: auto;
            }
            table {
                   width: 100%;
                     border-collapse: collapse;
             }
            table th,
            table td {
                padding: 13px;
              text-align: left;
                  border-bottom: 1px solid #ddd;
            }
            table th {
             background-color: #0f4a42;
               color: white;
               }
           table tr:hover {
            background-color: #f5f5f5;
             }

           .status {
                     padding: 6px 10px;
                 border-radius: 15px;
                 font-size: 13px;
                 font-weight: bold;
               }

             .active {
                  background-color: #d4edda;
               color: #155724;
              }

            .inactive {
              background-color: #f8d7da;
              color: #721c24;
            }

          .pending {
                 background-color: #fff3cd;
                color: #856404;
           }

              .paid {
              background-color: #d4edda;
              color: #155724;
              }

            .btn {
           background-color: #0f4a42;
            color: white;
             border: none;
           padding: 9px 15px;
             border-radius: 5px;
            cursor: pointer;
            }

                .message {
                  padding: 12px;
                margin-bottom: 20px;
                  background-color: #d4edda;
                color: #155724;
               border-radius: 5px;
               }

        </style>

    </head>

    <body>
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="admin_dashboard.php"> Dashboard </a>
            <a href="admin-add-doctor.php" class="active">  Add Doctor </a>
            <a href="admin-managePatients.php"> Manage Patients </a>
            <a href="admin-edit-profile.php"> Edit Profile  </a>
            <a href="admin-announcement.php">   Announcement </a>
            <a href="logout.php">  Logout </a>
        </div>

        <div class="board">
            <div class="topbar">
                <h1>Hospital Management System</h1>
                <p>Manage patient accounts and bills</p>
            </div>

            <div class="table">
                <h2>Patient List</h2>

                <?php if (isset($message)) { ?>
                <div class="message">
                    <?php echo htmlspecialchars($message); ?>
                </div>

                <?php } ?>
                <div class="table-container">
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
                                <td> <?php echo htmlspecialchars($patient["id"]); ?> </td>
                                <td><?php echo htmlspecialchars($patient["name"]); ?></td>
                                <td><?php echo htmlspecialchars($patient["email"]); ?></td>
                                <td><?php echo htmlspecialchars($patient["phone"]); ?></td>
                                <td><?php if ($patient["account"] == "Active") { ?>
                                    <span class="status active"> Active </span> 
                                    <?php } else { ?>
                                        <span class="status inactive"> Deactive </span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($patient["bill"] == "Paid") { ?>
                                    <span class="status paid"> Paid </span>
                                    <?php } else { ?>
                                    <span class="status pending"> Pending </span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($patient["bill"] == "Pending") { ?>

                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($patient["id"]); ?>">
                                        <input type="hidden"  name="action" value="paid" >
                                        <button type="submit" class="btn"> Mark Paid </button>
                                    </form>

                                    <?php } ?>
                                    <?php if ($patient["account"] == "Active") { ?>

                                    <form method="POST" style="display:inline;">
                                        <input type="hidden"  name="patient_id" value="<?php echo htmlspecialchars($patient["id"]); ?>" >
                                        <input type="hidden" name="action" value="deactivate" >
                                        <button type="submit" class="btn"> Deactivate </button>
                                    </form>

                                    <?php } else { ?>
                                    <form method="POST" style="display:inline;">

                                        <input  type="hidden"  name="patient_id"  value="<?php echo htmlspecialchars($patient["id"]); ?>" >
                                        <input type="hidden" name="action" value="activate" >
                                        <button type="submit" class="btn"> Activate </button>
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
    </body>
</html>