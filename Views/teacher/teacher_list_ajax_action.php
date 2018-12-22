<?php
require_once "../../vendor/autoload.php";
use App\Admin\Teacher;


header('Content-type: text/javascript');


if (isset($_POST['department'])){
    $department = $_POST['department'];
    $json = Teacher::getAllTeacherByDepartment($department);

    echo json_encode($json);
}

