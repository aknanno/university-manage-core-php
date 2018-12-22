<?php
require_once "../../vendor/autoload.php";
use App\Admin\Department;

header('Content-type: text/javascript');


if (isset($_POST['department'])){
    $json = '';

    $department = $_POST['department'];
    $courses = Department::getDepartmentCourse($department);
    $json = $courses;

    echo json_encode($json);
}





