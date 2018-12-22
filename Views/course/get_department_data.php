<?php
require_once "../../vendor/autoload.php";
use App\Admin\Department;
use App\Core\Session;
use App\Admin\Teacher;
use App\Admin\Course;
use App\Core\Unique;

header('Content-type: text/javascript');


if (isset($_POST['department'])){
    $json = array(
        'teacher' => '',
        'course' => ''
    );

    $department = $_POST['department'];
    $json['teacher'] = Department::getDepartmentTeacher($department);
    $json['course'] = Department::getDepartmentCourse($department);
    $departments = $json['teacher'];

    foreach ($departments as $department){
         Session::put($department->teacher_name ,$department->teacher_id);
    }

    echo json_encode($json);
}

if (isset($_POST['teacher'])){
    $json = '';
    $teacher = $_POST['teacher'];
    if (Session::exists($teacher)){
        $teacherId = Session::get($teacher);
        $teachersData = Teacher::getTeacherById($teacherId);
        $couseAssignData = Course::getCourseAssignData($teacherId);
        $assignCredit = 0.0;
        foreach ($couseAssignData as $courseAssign){
            $assignCredit = $assignCredit + $courseAssign->assign_course_credit; //total assigned Cried of teacher.
        }
        $assignCredit = $teachersData->teacher_credit - $assignCredit;
        $json = array(
            'remainingCread' => $assignCredit,
            'teacherCredit' => $teachersData->teacher_credit
        );
    }


    echo json_encode($json);
}


if (isset($_POST['courseCode'])){
    $json = array();
    $courseCode = $_POST['courseCode'];
    $courseInfo = Course::getCourseInformation($courseCode);
    $json['courseName'] = $courseInfo->course_name;
    $json['courseCredit'] = $courseInfo->course_credit;
    if (Unique::checkAssignCourse($courseCode)){
        $json['uniqueAssign'] = true;
    }else{
        $json['uniqueAssign'] = false;
    }


    echo json_encode($json);
}


