<?php
class Doctor
{
    public function addDoctor(
        $name,
        $email,
        $password,
        $phone,
        $specialization,
        $licenseNumber,
        $consultationFee,
        $yoe,
        $bio
    ) {
        if (!isset($_SESSION['doctors'])) {
            $_SESSION['doctors'] = array();
        }

        $doctor = array(
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "specialization" => $specialization,
            "licenseNumber" => $licenseNumber,
            "consultationFee" => $consultationFee,
            "yoe" => $yoe,
            "bio" => $bio,
            "status" => "Active"
        );
 $_SESSION['doctors'][] = $doctor;
    }

    public function getTotalDoctors()
    {
        if (!isset($_SESSION['doctors'])) {
            return 0;
        }
        return count($_SESSION['doctors']);
    }


    public function getActiveDoctors()
    {
        if (!isset($_SESSION['doctors'])) {
            return 0;
        }

        $count = 0;
        foreach ($_SESSION['doctors'] as $doctor) {
            if ($doctor['status'] == "Active") {
                $count++;
            }
        }
        return $count;
    }


    public function getDoctors()
    {
        if (!isset($_SESSION['doctors'])) {
            return array();
        }
        return $_SESSION['doctors'];
    }
}
?>