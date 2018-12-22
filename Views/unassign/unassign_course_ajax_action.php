<?php
require_once "../../vendor/autoload.php";
use App\Admin\Course;


header('Content-type: text/javascript');

if (isset($_POST['unassignButton'])){
    if (Course::unAssignCourses()){
        $json = true;
    }else{
        $json = false;
    }
}

echo json_encode($json);