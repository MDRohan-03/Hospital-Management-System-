<?php
class User
{
    public function login($email, $password)
    {
        if ($email == "admin@gmail.com" && $password == "admin123") {
            return true;
        }
        return false;
    }

    public function updateProfile($name, $email, $phone)
    {
        $_SESSION['adminName'] = $name;
        $_SESSION['adminEmail'] = $email;
        $_SESSION['adminPhone'] = $phone;
    }
}
?>