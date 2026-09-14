<?php
require_once __DIR__ . '/database.php';

function getAllNotices() {
    global $conn;
    $sql = "SELECT n.*, u.username AS created_by_name
            FROM notices n
            LEFT JOIN users u ON n.created_by = u.id
            ORDER BY n.created_at DESC";
    $result = mysqli_query($conn, $sql);

    $notices = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $notices[] = $row;
        }
    }
    return $notices;
}

function addNotice($title, $content, $created_by) {
    global $conn;
    $stmt = mysqli_prepare($conn,
        "INSERT INTO notices (title, content, created_by) VALUES (?, ?, ?)"
    );
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $created_by);
    return mysqli_stmt_execute($stmt);
}

function deleteNotice($id) {
    global $conn;
    $id = (int)$id;
    $stmt = mysqli_prepare($conn, "DELETE FROM notices WHERE id = ?");
    if (!$stmt) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function getNoticeCount() {
    global $conn;
    $sql = "SELECT COUNT(*) AS total FROM notices";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return 0;
    }
    $row = mysqli_fetch_assoc($result);
    return (int)($row['total'] ?? 0);
}
?>