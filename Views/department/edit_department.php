<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Validation;
use App\Core\Input;
use App\Core\Redirect;
use App\Admin\Department;

$department_id = Input::get('department');
$department_id = explode(';',$department_id);
$department_id = end($department_id);
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

$singleDepartment = Department::getSingleDepartmentById($department_id);

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Edit Department</h1>
            <div class="panel panel-default save_department">
                <fieldset>
                    <!--                    <legend>Save Department</legend>-->
                    <?php
                    if (Session::exists('error')){
                        echo '<p style="text-align: center; color: red;">'.Session::get('error'). '</p>';
                        Session::delete('error');
                    }
                    if (Session::exists('success')){
                        echo '<p style="text-align: center; color: green;">'.Session::get('success'). '</p>';
                        Session::delete('success');
                    }
                    ?>

                    <form action="update_department.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="depart_code" class="col-sm-2 control-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" class="form-control" id="depart_code" value="<?php echo $singleDepartment->department_code ?>" placeholder="Department code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInEditDepartment" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo $singleDepartment->department_name ?>" id="departmentInEditDepartment" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default save_button">Update</button>
                                <input type="hidden" name="department_id" value="<?php echo $department_id?>">
                                <input type="hidden" name="checkCode" value="<?php echo $singleDepartment->department_code ?>">
                                <input type="hidden" name="checkName" value="<?php echo $singleDepartment->department_name?>">
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>