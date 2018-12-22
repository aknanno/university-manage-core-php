<?php  
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Core\Validation;
use App\Core\Input;
use App\Admin\Result;
// echo "<pre>";
// print_r($_POST);exit();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (Validation::valid(Input::get('regNo')) != '.....Select Registration No.....' && Validation::valid(Input::get('name')) && Validation::valid(Input::get('email')) && Validation::valid(Input::get('department')) && Validation::valid(Input::get('course')) && Validation::valid(Input::get('grade'))) {
		$storeResult = new Result();
		if (Result::checkResultSave(Input::get('course'))) {
			if ($storeResult->setResultData($_POST)->saveResult()) {
				Session::put('success', 'Result save successfully !');
				Redirect::to('save_result.php');
			}else {
				Session::put('error', 'Something going wrong !');
				Redirect::to('save_result.php');
			}
		}else {
			Session::put('error', 'Result has already saved for this course !');
			Redirect::to('save_result.php');
		}
	}else {
		Session::put('error', 'Invalid Input !');
		Redirect::to('save_result.php');
	}
}else {
	Redirect::to('save_result.php');
}
