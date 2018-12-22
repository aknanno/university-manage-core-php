<?php
require_once "../../vendor/autoload.php";
use App\Core\Redirect;
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Unique;
use App\Admin\Department;
$time = serialize(time());

if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

//$departmentDataForCode = Department::getSingleDepartmentByCode(Input::get('code'));
//$departmentDataForName = Department::getSingleDepartmentByName(Input::get('name'));
//print_r($_POST);exit();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (Input::exists('post')){
        if (Validation::valid(Input::get('code')) && Validation::valid(Input::get('name'))){
            if ((!Unique::checkDepartmentCode(Input::get('code')) && Input::get('checkCode') === Input::get('code')) || Unique::checkDepartmentCode(Input::get('code'))){
                if (strlen(Input::get('code')) > 2 && strlen(Input::get('code')) <= 7){
                    if ((!Unique::checkDepartmentName(Input::get('name')) && Input::get('checkName') === Input::get('name')) || Unique::checkDepartmentName(Input::get('name'))){
                        $addDepartment = new Department();
                        $checkUpdateDepartment = $addDepartment->setDepartmentData($_POST)->updateDepartment();
                        if ($checkUpdateDepartment){
                            Session::put('success', 'Department successfully Updated!');
                            Redirect::to('view_department.php');
                        }
                    }else{
                        Session::put('error', 'Department name must be unique!');
                        Redirect::to('edit_department.php?code='.Input::get('code').'&department='.$time.Input::get('department_id').'&2='.$time);
                    }
                }else{
                    Session::put('error', 'Code must be within two to seven!');
                    Redirect::to('edit_department.php?name='.Input::get('name').'&department='.$time.Input::get('department_id').'&2='.$time);
                }
            }else{
                Session::put('error', 'Code must be unique!');
                Redirect::to('edit_department.php?name='.Input::get('name').'&department='.$time.Input::get('department_id').'&2='.$time);
            }
        }else{
            Session::put('error', 'Invalid input !');
            Redirect::to('view_department.php');
        }
    }else{
        Session::put('error', 'Department code & name must not be empty');
        Redirect::to('view_department.php');
    }
}else{
    Redirect::to('view_department');
}

?>