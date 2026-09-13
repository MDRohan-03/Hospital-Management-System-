<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../model/database.php';
require '../model/adminDoctor.php';
require '../model/adminNotice.php';

 
$doctorCount = getDoctorCount();
$noticeCount = getNoticeCount();
 
$currentPage = basename($_SERVER['PHP_SELF']);
if ($currentPage === 'admin-manage-doctor.php') {
    $doctors = getAllDoctors();
}
 
if ($currentPage === 'admin-notice.php') {
    $notices = getAllNotices();
}
?>
<nav class="top-nav">
    <div class="nav-container">
        
        <ul class="nav-links">
            <li><a href="admin-dashboard.php">Dashboard</a></li>
            <li><a href="admin-manage-doctor.php">Doctors</a></li>
            <li><a href="admin-notice.php">Notices</a></li>
            <li><a href="admin-edit-profile.php">Profile</a></li>
            <li><a href="../controller/logoutController.php">Logout</a></li>
        </ul>
    </div>
</nav>