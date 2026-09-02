<?php
session_start();
/*
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
*/
require_once __DIR__ . '/../model/Doctor.php';

$doctorModel = new Doctor();
$doctors = $doctorModel->getAllDoctors();
$doctorCount = $doctorModel->getDoctorCount();

// Get any session messages
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors - Hospital Management System</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="main-content">
        <div class="page-header">
            <h1>Manage Doctors</h1>
            <a href="admin-add-doctor.php" class="btn-add-doctor">
                ➕ Add New Doctor
            </a>
        </div>

        <?php if($success): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
                <span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>

        <?php if($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
                <span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>

        <div class="doctor-table">
            <div class="table-header">
                <div>
                    <h2>Doctor List</h2>
                    <div class="doctor-count">
                        Total: <span><?php echo $doctorCount; ?></span> doctors
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search doctors..." onkeyup="searchDoctor()">
                </div>
            </div>

            <?php if($doctors && count($doctors) > 0): ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Doctor</th>
                                <th>Specialization</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach($doctors as $doctor): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
                                    <div class="doctor-info">
                                        <div class="doctor-avatar-small">
                                            <?php echo strtoupper(substr($doctor['name'], 0, 1)); ?>
                                        </div>
                                        <div class="details">
                                            <span class="name"><?php echo htmlspecialchars($doctor['name']); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="specialization-tag"><?php echo htmlspecialchars($doctor['specialization'] ?? 'N/A'); ?></span>
                                </td>
                                <td><?php echo htmlspecialchars($doctor['email']); ?></td>
                                <td><?php echo htmlspecialchars($doctor['phone']); ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-deactivate" onclick="deactivateDoctor(<?php echo $doctor['user_id']; ?>, '<?php echo addslashes($doctor['name']); ?>')">
                                            🗑️ Deactivate
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <span class="empty-icon">👨‍⚕️</span>
                    <h3>No Doctors Found</h3>
                    <p>Click the "Add New Doctor" button to add your first doctor.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../Assets/js/manage-doctor.js"></script>
</body>
</html>