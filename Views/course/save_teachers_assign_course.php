<?php

require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Input;
use App\Admin\Course;
use App\Core\Redirect;
use App\Core\Validation;

if (!Session::exists('user')){
    Redirect::to('course_assign_to_teacher');
}

if (Session::exists(Input::get('teacher'))){
    $_POST['teacherId'] = Session::get(Input::get('teacher'));
}

if (Validation::valid(Input::get('department')) != '.....Select Department.....' && Validation::valid(Input::get('teacher')) != 'Select teacher' && Validation::valid(Input::get('creditToBeTaken')) && Validation::valid(Input::get('remainingCredit')) && Validation::valid(Input::get('courseCode')) != 'Select a course' && Validation::valid(Input::get('name')) && Validation::valid(Input::get('credit'))) {
	$saveAssignCorese = new Course();
	if($saveAssignCorese->setCourseData($_POST)->saveTeacherAssignCourse()){
	    Session::put('success', 'Course assign successfully.');
	    Redirect::to('course_assign_to_teacher.php');
	}else{
	    Session::put('error', 'Something going wrong. Please try again.');
	    Redirect::to('course_assign_to_teacher.php');
	}
}else {
	Session::put('error', 'Invalid Input. All field is fequired !');
	Redirect::to('course_assign_to_teacher.php');
}

