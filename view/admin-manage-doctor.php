<?php
session_start();

require_once __DIR__ . '/../model/Doctor.php';

$doctorModel = new Doctor();
$doctors = $doctorModel->getAllDoctors();
$doctorCount = $doctorModel->getDoctorCount();
 
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

    <div class="main-content" style="padding: 20px; max-width: 1200px; margin: 0 auto;">
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo nl2br($error); ?></div>
        <?php endif; ?>

        <div class="doctor-table">
            <div class="table-header">
                <div>
                    <h2>Doctor List</h2>
                    <div class="doctor-count">
                        Total: <span><?php echo $doctorCount; ?></span> doctors
                    </div>
                </div>
                <a href="admin-add-doctor.php" class="btn-add">+ Add New Doctor</a>
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
                                    <button class="btn-deactivate" onclick="deactivateDoctor(<?php echo $doctor['user_id']; ?>, '<?php echo addslashes($doctor['name']); ?>')">
                                        Deactivate
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <h3>No Doctors Found</h3>
                    <p>Click the "Add New Doctor" button to add your first doctor.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
    function deactivateDoctor(id, name) {
        if (confirm('Are you sure you want to deactivate Dr. ' + name + '?')) {
            window.location.href = '../controller/admin-doctorController.php?action=delete&id=' + id;
        }
    }
    </script>
</body>
</html>