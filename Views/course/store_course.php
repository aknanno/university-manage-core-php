<?php
require_once "../../vendor/autoload.php";
use App\Core\Redirect;
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Unique;
use App\Admin\Course;

if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (Input::exists('post')){
        if (Validation::valid(Input::get('code')) && Validation::valid(Input::get('name')) && Validation::valid(Input::get('credit')) && Validation::valid(Input::get('description')) && (Input::get('department') != '.....Select Department.....') && (Input::get('semester') != '.....Select Semester.....')){
            if (Unique::checkCourseCode(Input::get('code'))){
                if (Unique::checkCourseName(Input::get('name'))){
                    if (strlen(Input::get('code')) >= 5){
                        if (Input::get('credit') >= 0.5 && Input::get('credit') <= 5.0){
                            $addCourse = new Course();
                            if ($addCourse->setCourseData($_POST)->addCourse()){
                                Session::put('success', 'Course successfully saved !');
                                Redirect::to('add_course.php');
                            }else{
                                Session::put('error', 'Something going wrong !');
                                Redirect::to('add_course.php');
                            }
                        }else{
                            Session::put('error', 'Course credit must be 0.5 to 5.0 !');
                            Redirect::to('add_course.php');
                        }
                    }else{
                        Session::put('error', 'Course code must be atleast 5 characters !');
                        Redirect::to('add_course.php');
                    }
                }else{
                    Session::put('error', 'Course name must be unique !');
                    Redirect::to('add_course.php');
                }
            }else{
                Session::put('error', 'Course code must be unique !');
                Redirect::to('add_course.php');
            }
        }else{
            Session::put('error', 'Invalid Input');
            Redirect::to('add_course.php');
        }
    }else{
        Session::put('error', 'Field must not be empty!');
        Redirect::to('add_course.php');
    }
}else{
    Redirect::to('add_course.php');
}