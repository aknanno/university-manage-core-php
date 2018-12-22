<?php
require_once "../../vendor/autoload.php";
use App\Admin\Department;
use App\Admin\Course;
use App\Admin\Student;


header('Content-type: text/javascript');


if (isset($_POST['regNo'])){
    $regNo = $_POST['regNo'];
    $json = array();
    $studentInfo = Student::getStudentInfoByRegNo($regNo);
    $allCourse = Course::getJustAllCourse($studentInfo->student_department);
    $json['studentInfo'] = $studentInfo;
    $json['allCourse'] = $allCourse;
    echo json_encode($json);
}

