<?php
require_once "../../vendor/autoload.php";
use App\Core\Redirect;
use App\Core\Session;
use App\Core\Input;
use App\Admin\Department;

if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

$departmentId = Input::get('department');
$departmentId = explode(';', $departmentId);
$departmentId = end($departmentId);

if (Department::deleteDepartment($departmentId)){
    Session::put('success', 'Successfully deleted');
    Redirect::to('view_department.php');
}else{
    Session::put('error', 'Something going wrong !');
    Redirect::to('view_department.php');
}


?>