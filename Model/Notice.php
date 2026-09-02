<?php
// model/Notice.php

require_once __DIR__ . '/../config/database.php';

class Notice {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllNotices() {
        $sql = "SELECT n.*, u.name as created_by_name FROM notices n JOIN users u ON n.created_by = u.id ORDER BY n.created_at DESC";
        $result = mysqli_query($this->conn, $sql);

        $notices = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $notices[] = $row;
        }
        return $notices;
    }

    public function addNotice($title, $content, $created_by) {
        $sql = "INSERT INTO notices (title, content, created_by) VALUES ('$title', '$content', '$created_by')";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteNotice($id) {
        $sql = "DELETE FROM notices WHERE id = '$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function getNoticeCount() {
        $sql = "SELECT COUNT(*) as total FROM notices";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }
}
?>