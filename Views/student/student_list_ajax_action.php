<?php
require_once "../../vendor/autoload.php";
use App\Admin\Student;


header('Content-type: text/javascript');


if (isset($_POST['department'])){
    $department = $_POST['department'];
    $json = Student::getAllStudentsByDepartment($department);

    echo json_encode($json);
}

