<?php
class Notice
{
    public function addNotice($title, $description)
    {
      if (!isset($_SESSION['notices'])) {
            $_SESSION['notices'] = array();
        }

        $notice = array(
            "title" => $title,
            "description" => $description,
            "date" => date("d-m-y")
        );
        $_SESSION['notices'][] = $notice;
    }

    public function getNotices()
    {
        if (!isset($_SESSION['notices'])) {
            return array();
        }
        return $_SESSION['notices'];
    }
}
?>