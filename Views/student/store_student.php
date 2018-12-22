<?php
require_once "../../vendor/autoload.php";

use App\Core\Redirect;
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Unique;
use App\Admin\Student;
use App\Admin\Department;

//echo "<pre>";
//print_r($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (Input::exists('post') && Input::get('department') != '.....Select Department.....'){
        if (Validation::validWithoutEmpty(Input::get('name')) && Validation::validWithoutEmpty(Input::get('email')) && Validation::validWithoutEmpty(Input::get('contact')) && Validation::validWithoutEmpty(Input::get('studentAddress'))){
            if (Validation::emailValidation(Input::get('email'))){
                if (Unique::checkStudentEmail(Input::get('email'))){
                    //print_r($_POST);exit();
                    $departmentData = Department::getSingleDepartmentByName(Input::get('department'));
                    $departmentCode = $departmentData->department_code;
                    $date = explode('/', Input::get('date'));
                    $currentyear = end($date);
                    $registrationNo = Student::getStudentLastRegNo(Input::get('department'));
                    $registrationNo = explode('-', $registrationNo);
                    $registrationNo = end($registrationNo);
                    $toStoreRegNo = $departmentCode . '-' . $currentyear . '-' . ++$registrationNo;
                    $_POST['regNo'] = $toStoreRegNo;
                    $student = new Student();
                    if ($student->setStudentData($_POST)->storeStudentInfo()){
                        Session::put('regNo', $toStoreRegNo);
                        Session::put('success', 'Registration Successfully !');
                        Redirect::to('studentInfo.php');
                    }else{
                        Session::put('error', 'Something going wrong!');
                        Redirect::to('register_student.php');
                    }

                }else{
                    Session::put('error', 'This email is used for another student.!');
                    Redirect::to('register_student.php');
                }
            }else{
                Session::put('error', 'Email is not valid !');
                Redirect::to('register_student.php');
            }
        }else{
            Session::put('error', 'Invalid input. Every fields expect correct information !');
            Redirect::to('register_student.php');
        }
    }else{
        Session::put('error', 'Every field is required !');
        Redirect::to('register_student.php');
    }
}else{
    Redirect::to('register_student.php');
}