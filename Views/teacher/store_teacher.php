<?php
require_once "../../vendor/autoload.php";

use App\Core\Redirect;
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Unique;
use App\Admin\Teacher;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (Input::exists('post')){
        if (Validation::valid(Input::get('name')) && Validation::valid(Input::get('address')) && Validation::validWithoutEmpty(Input::get('email')) && Validation::valid(Input::get('contact')) && Validation::valid(Input::get('credit')) && (Input::get('designation') != '.....Select Designation.....') && (Input::get('department') != '.....Select Department.....')){
            if (Validation::emailValidation(Input::get('email'))){
                if (Unique::checkTeacherEmail(Input::get('email'))){
                    if (Input::get('credit') > 0){
                        $teacher = new Teacher();
                        $addTeacher = $teacher->setTeacherData($_POST)->addTeacher();
                        if ($addTeacher){
                            Session::put('success', 'Teacher added successfully !');
                            Redirect::to('add_teacher.php');
                        }else{
                            Session::put('error', 'Something going wrong. Please try again.');
                            Redirect::to('add_teacher.php');
                        }
                    }else{
                        Session::put('error', 'Negative value for credit not allowed !');
                        Redirect::to('add_teacher.php');
                    }
                }else{
                    Session::put('error', 'Email is not Unique. Unique email is required !');
                    Redirect::to('add_teacher.php');
                }
            }else{
                Session::put('error', 'Email is not valid !');
                Redirect::to('add_teacher.php');
            }
        }else{
            Session::put('error', 'Invalid Input. Please give valid data in all field');
            Redirect::to('add_teacher.php');
        }
    }else{
        Session::put('error', 'Field must not be empty!');
        Redirect::to('add_teacher.php');
    }
}else{
    Redirect::to('add_teacher.php');
}