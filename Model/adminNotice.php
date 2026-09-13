<?php
require 'database.php';
global $conn;

function getAllNotices() {
    global $conn;
    $sql = "SELECT n.*, u.username as created_by_name 
            FROM notices n 
            LEFT JOIN users u ON n.created_by = u.id 
            ORDER BY n.created_at DESC";
    $result = mysqli_query($conn, $sql);

    $notices = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $notices[] = $row;
    }
    return $notices;
}

function addNotice($title, $content, $created_by) {
    global $conn;
    $sql = "INSERT INTO notices (title, content, created_by) 
            VALUES ('$title', '$content', '$created_by')";
    return mysqli_query($conn, $sql);
}

function deleteNotice($id) {
    global $conn;
    $sql = "DELETE FROM notices WHERE id = '$id'";
    return mysqli_query($conn, $sql);
}

function getNoticeCount() {
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM notices";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return (int)($row['total'] ?? 0);
}
?>