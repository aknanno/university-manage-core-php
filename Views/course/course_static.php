<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/10/17
 * Time: 1:01 AM
 */
require_once "../../vendor/autoload.php";
use App\Admin\Course;

header('Content-type: text/javascript');

$json = array(
    'allcourses' => '',
    'assigncourse' => '',
);

if (isset($_POST['department'])){
    $departmentName = $_POST['department'];
    $allCourseOfDepartment = Course::getAllCourseByDepartmentName($departmentName);
    $allAssignCourse = Course::getAllAssignCourse();

    $json['allcourses'] = $allCourseOfDepartment;
    $json['assigncourse'] = $allAssignCourse;
}




echo json_encode($json);