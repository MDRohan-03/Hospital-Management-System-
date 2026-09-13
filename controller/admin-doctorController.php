<?php
session_start();
require '../model/adminModel.php';
require '../model/adminDoctor.php';

 

function handleAddDoctor($postData) {
     
        $result = registerDoctor(
            $postData['name'],
            $postData['email'],
            $postData['password'],
            $postData['phone'],
            $postData['specialization']
        );
        
        if ($result) {
            $_SESSION['success'] = "Dr. " . $postData['name'] . " has been added successfully!";
            header("Location: ../view/admin-manage-doctor.php");
            exit();
        } else {
            $_SESSION['error'] = "Failed to add doctor. Please try again.";
            header("Location: ../view/admin-manage-doctor.php");
            exit();
        }
    }  

function handleDeleteDoctor($id) {
    if ($id > 0) {
        if (deleteDoctor($id)) {
            $_SESSION['success'] = "Doctor deactivated successfully!";
        } else {
            $_SESSION['error'] = "Failed to deactivate doctor.";
        }
    }
    
    header("Location: ../view/admin-manage-doctor.php");
    exit();
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_doctor'])) {
    handleAddDoctor($_POST);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    handleDeleteDoctor((int)$_GET['id']);
}

header("Location: ../view/admin-manage-doctor.php");
exit();
?>