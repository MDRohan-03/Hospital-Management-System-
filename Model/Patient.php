<?php
class Patient
{
    public function getPatients()
    {
        if (!isset($_SESSION['patients'])) {
            $_SESSION['patients'] = array(
                array(
                    "id" => 1,
                    "name" => "abc",
                    "email" => "xyz@gmail.com",
                    "phone" => "0187284290",
                    "status" => "Active",
                    "payment" => "Pending"
                ),
                array(
                    "id" => 2,
                    "name" => "xyz",
                    "email" => "abc@gmail.com",
                    "phone" => "01712345678",
                    "status" => "Pending",
                    "payment" => "Pending"
                )
            );
        }
        return $_SESSION['patients'];
    }

    public function getTotalPatients()
    {
        $patients = $this->getPatients();
        return count($patients);
    }


    public function getPendingPatients()
    {
        $patients = $this->getPatients();
        $count = 0;
        foreach ($patients as $patient) {
            if ($patient['status'] == "Pending") {
              $count++;
            }
        }
        return $count;
    }


    public function activatePatient($id)
    {
        $patients = $this->getPatients();
        foreach ($patients as $key => $patient) {
            if ($patient['id'] == $id) {
                $_SESSION['patients'][$key]['status'] = "Active";
            }
        }
    }


    public function deactivatePatient($id)
    {
        $patients = $this->getPatients();
        foreach ($patients as $key => $patient) {
            if ($patient['id'] == $id) {
                $_SESSION['patients'][$key]['status'] = "Inactive";
            }
        }
    }


    public function markAsPaid($id)
    {
        $patients = $this->getPatients();
        foreach ($patients as $key => $patient) {
            if ($patient['id'] == $id) {
                $_SESSION['patients'][$key]['payment'] = "Paid";
            }
        }
    }
}
?>