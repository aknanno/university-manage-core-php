<?php  
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Core\Validation;
use App\Core\Input;
use App\Admin\Course;
//print_r($_POST);exit();

if (!Session::exists('user')) {
	Redirect::to('../../index.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (Validation::valid(Input::get('regNo')) && Validation::valid(Input::get('name')) && Validation::valid(Input::get('email')) && Validation::valid(Input::get('department')) && Validation::valid(Input::get('course')) && Validation::valid(Input::get('date'))) {
		$courseCode = Input::get('course');
		$regNo = Input::get('regNo');
		$courseCodeFromDatabase = Course::getEnrollCourseByCourseCode($courseCode);
		//print_r($courseCodeFromDatabase);exit();
		$regNoFromDatabase = $courseCodeFromDatabase ? $courseCodeFromDatabase->enroll_student_reg_no : '';
		if ($regNo == $regNoFromDatabase) {
			Session::put('error', 'This course has already enrolled for this student. Please select another course !');
			Redirect::to('enroll_student_in_course.php');
		}else {
			$storeCourse = new Course();
			if ($storeCourse->setCourseData($_POST)->storeEnroolCourse()) {
				Session::put('success', 'Enroll course successfully !');
				Redirect::to('enroll_student_in_course.php');
			}else {
				Session::put('error', 'Something going wrong !');
				Redirect::to('enroll_student_in_course.php');
			}
		}
	}else {
		Session::put('error', 'Invalid input !');
		Redirect::to('enroll_student_in_course.php');
	}
}else {
	Redirect::to('enroll_student_in_course.php');
}
?>