<?php

session_start();

$_SESSION['titleErrMsg'] = "";
$_SESSION['descriptionErrMsg'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $flag = true;

    if (empty($title)) {
        $flag = false;
        $_SESSION['titleErrMsg'] = "Announcement title is required.";
    } 
    else {
        $_SESSION['title'] = $title;
    }

    if (empty($description)) {
        $flag = false;
        $_SESSION['descriptionErrMsg'] = "Announcement description is required.";
    } 
    else {
        $_SESSION['description'] = $description;
    }

    if ($flag) {
        require "../Model/Notice.php";

        $notice = new Notice();
        $notice->addNotice($title, $description);
        $_SESSION['success'] = "Announcement added successfully.";
        unset($_SESSION['title']);
        unset($_SESSION['description']);
    }

    header("Location: ../View/admin/admin-notices.php");
    exit();
}

?>