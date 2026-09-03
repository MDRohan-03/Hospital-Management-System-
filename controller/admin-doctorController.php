<?php
session_start();
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Doctor.php';

function validateName($name) {
    $name = trim($name);
    if (empty($name)) {
        return "Please Properly";
    }
    if (strlen($name) < 3) {
        return "Please Properly";
    }
    return null;
}

function validateEmail($email) {
    $email = trim($email);
    if (empty($email)) {
        return "Please Properly";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Please Properly";
    }
    return null;
}

function validatePhone($phone) {
    $phone = trim($phone);
    if (empty($phone)) {
        return "PPlease Properly";
    }
    if (!preg_match('/^[0-9+\-\s]{10,15}$/', $phone)) {
        return "Please Properly";
    }
    return null;
}

function validateSpecialization($specialization) {
    if (empty($specialization)) {
        return "Please Properly";
    }
    return null;
}

function validatePassword($password) {
    if (empty($password)) {
        return "Please Properly";
    }
    if (strlen($password) < 6) {
        return "Please Properly";
    }
    return null;
}

function validateDoctorData($data) {
    $errors = [];
    
    $nameError = validateName($data['name'] ?? '');
    if ($nameError) $errors[] = $nameError;
    
    $emailError = validateEmail($data['email'] ?? '');
    if ($emailError) $errors[] = $emailError;
    
    $phoneError = validatePhone($data['phone'] ?? '');
    if ($phoneError) $errors[] = $phoneError;
    
    $specializationError = validateSpecialization($data['specialization'] ?? '');
    if ($specializationError) $errors[] = $specializationError;
    
    $passwordError = validatePassword($data['password'] ?? '');
    if ($passwordError) $errors[] = $passwordError;
    
    return $errors;
}

function handleAddDoctor($postData) {
    $userModel = new User();
     
    $errors = validateDoctorData($postData);
    
    if (empty($errors) && $userModel->emailExists($postData['email'])) {
        $errors[] = "Email already exists. Please use a different email address.";
    }
    
    if (empty($errors)) {
       
        $result = $userModel->registerDoctor(
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
            header("Location: ../view/admin-add-doctor.php");
            exit();
        }
    } else {
        $_SESSION['error'] = implode("\n", $errors);
        header("Location: ../view/admin-add-doctor.php");
        exit();
    }
}

function handleDeleteDoctor($id) {
    $doctorModel = new Doctor();
    
    if ($id > 0) {
        if ($doctorModel->deleteDoctor($id)) {
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