<?php
require_once "../../vendor/autoload.php";
use App\Core\Redirect;
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Unique;
use App\Admin\Department;

if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (Input::exists('post')){
        if (Validation::valid(Input::get('code')) && Validation::valid(Input::get('name'))){
            if (Unique::checkDepartmentCode(Input::get('code'))){
                if (strlen(trim(Input::get('code'))) >= 2 && strlen(trim(Input::get('code'))) <= 7){
                    if (Unique::checkDepartmentName(Input::get('name'))){
                        $addDepartment = new Department();
                        $checkAddDepartment = $addDepartment->setDepartmentData($_POST)->addDepartment();
                        if ($checkAddDepartment){
                            Session::put('success', 'Department successfully added!');
                            Redirect::to('add_department.php');
                        }
                    }else{
                        Session::put('error', 'Department name must be unique!');
                        Redirect::to('add_department.php?code='.Input::get('code'));
                    }
                }else{
                    Session::put('error', 'Code must be within two to seven!');
                    Redirect::to('add_department.php?name='.Input::get('name'));
                }
            }else{
                Session::put('error', 'Code must be unique!');
                Redirect::to('add_department.php?name='.Input::get('name'));
            }
        }else{
            Session::put('error', 'Invalid input !');
            Redirect::to('add_department.php');
        }
    }else{
        Session::put('error', 'Department code & name must not be empty');
        Redirect::to('add_department.php');
    }
}else{
    Redirect::to('add_department.php');
}

?>