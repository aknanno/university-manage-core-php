<?php
require_once "../../vendor/autoload.php";
use App\Admin\Department;
use App\Admin\Course;
use App\Admin\Student;
use App\Admin\Result;


header('Content-type: text/javascript');


if (isset($_POST['regNo'])){
    $regNo = $_POST['regNo'];
    $json = array();
    $studentInfo = Student::getStudentInfoByRegNo($regNo);
    $result = Result::getStudentResult($regNo);
    $json['studentInfo'] = $studentInfo;
    $json['result'] = $result;
    echo json_encode($json);
}

