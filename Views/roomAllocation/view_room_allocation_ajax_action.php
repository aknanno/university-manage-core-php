<?php
require_once "../../vendor/autoload.php";
use App\Admin\Room;
use App\Admin\Course;


header('Content-type: text/javascript');


if (isset($_POST['department'])){
    $department = $_POST['department'];
    $allCourse = Course::getAllCourseByDepartmentName($department);
    $allocationRoom = null;
    $shedule = '';
    foreach ($allCourse as $course){
        if (Room::getRoomAllocationByCourseCode($course->course_code)){
            $shedules = Room::getRoomAllocationByCourseCode($course->course_code);
            foreach ($shedules as $singleShedule){
                $timeFrom = explode(':', $singleShedule->alocation_time_from);
                $timeFrom = array_slice($timeFrom, 0, 1);
                $timeFromTosend = $singleShedule->alocation_time_from;
                if ($timeFrom[0] < 12){
                    $timeFromTosend = $timeFromTosend . ' AM';
                }else{
                    $timeFromTosend = $timeFromTosend . ' PM';
                }

                $timeTo = explode(':', $singleShedule->alocation_time_to);
                $timeTo = array_slice($timeTo, 0, 1);
                $timeToTosend = $singleShedule->alocation_time_to;
                if ($timeTo[0] < 12){
                    $timeToTosend = $timeToTosend . ' AM';
                }else{
                    $timeToTosend = $timeToTosend . ' PM';
                }

                $shedule = $shedule . '<p> R. No : '.$singleShedule->alocation_room.', '.$singleShedule->alocation_day.', '.$timeFromTosend.' - '. $timeToTosend.';</p>';
            }
            $allocationRoom[$course->course_code] = $shedule;
            $shedule = '';
        }else{
            $allocationRoom[$course->course_code] = null;
        }

    }

    $json = array(
        'allcourse' => $allCourse,
        'allocationRoom' => $allocationRoom
    );

    echo json_encode($json);
}

//if (Room::getRoomAllocationByCourseCode($course->course_code)){
//    $allocationRoom[] = Room::getRoomAllocationByCourseCode($course->course_code);
//}