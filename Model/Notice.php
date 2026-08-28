<?php
require_once "Database.php";

class Notice {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Database();
        $this->connection = $this->db->connection;
    }

  
    public function addNotice($title, $description) {
        $sql = "INSERT INTO notices (title, description) VALUES (?, ?)";
        
        $stmt = $this->connection->prepare($sql);
        
        $stmt->bind_param("ss", $title, $description);
       
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }


    public function getNotices() {
        $sql = "SELECT * FROM notices ORDER BY created_at DESC";
        $result = $this->connection->query($sql);
        
        $notices = array();
      
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $notices[] = array(
                    "id" => $row['id'],
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "date" => date("d-m-Y", strtotime($row['created_at']))
                );
            }
        }
        
        return $notices;
    }

    public function getNoticeById($id) {
        $sql = "SELECT * FROM notices WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
//update
    public function updateNotice($id, $title, $description) {
        $sql = "UPDATE notices SET title = ?, description = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
//delete
    public function deleteNotice($id) {
        $sql = "DELETE FROM notices WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
//total
    public function getTotalNotices() {
        $sql = "SELECT COUNT(*) as total FROM notices";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
// Destructor 
    public function __destruct() {
        if ($this->db) {
            $this->db->close();
        }
    }
}
?>