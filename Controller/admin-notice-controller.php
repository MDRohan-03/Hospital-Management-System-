<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $_SESSION['form_submitted'] = true;
    
     
    $_SESSION['titleErrMsg'] = "";
    $_SESSION['descriptionErrMsg'] = "";
 
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $flag = true;

    if (empty($title)) {
        $flag = false;
        $_SESSION['titleErrMsg'] = "Announcement title is required.";
    } else {
        $_SESSION['title'] = htmlspecialchars($title);
    }

   
    if (empty($description)) {
        $flag = false;
        $_SESSION['descriptionErrMsg'] = "Announcement description is required.";
    } else {
        $_SESSION['description'] = htmlspecialchars($description);
    }
 
    if ($flag) {
      
        require_once "../Model/Notice.php";
      //create new notice fn call
        $notice = new Notice();
        
        if ($notice->addNotice($title, $description)) {
            $_SESSION['success'] = "Announcement published successfully!";
            
            unset($_SESSION['title']);
            unset($_SESSION['description']);
        } else {
            $_SESSION['error'] = "Failed to publish announcement. Please try again.";
        }
    }

    header("Location: ../View/admin/admin-notices.php");
    exit();
}

header("Location: ../View/admin/admin-notices.php");
exit();
?>