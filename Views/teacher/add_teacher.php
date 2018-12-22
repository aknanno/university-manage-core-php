<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
use App\Admin\Designation;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

$allDepartment = Department::getAllDepartment();
$allDesignation = Designation::getDesignation();


?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Add Teacher</h1>
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

                    <form action="store_teacher.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="teacherName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="" id="teacherName" placeholder="Enter Teacher's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="address" id="address" cols="40" rows="4" placeholder="Enter Teacher's address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" value="" id="email" placeholder="Enter Teacher's email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="col-sm-3 control-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" class="form-control" value="" id="contact" placeholder="Enter Contact No">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="designation" class="col-sm-3 control-label">Designation</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="designation" id="designation">
                                    <option>.....Select Designation.....</option>
                                    <?php foreach ($allDesignation as $designation){?>
                                        <option><?php echo $designation->designation_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInAddTeacher" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="department" id="departmentInAddTeacher">
                                    <option>.....Select Department.....</option>
                                    <?php foreach ($allDepartment as $department){?>
                                        <option><?php echo $department->department_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TeacherCredit" class="col-sm-3 control-label">Credit to be taken</label>
                            <div class="col-sm-9">
                                <input type="number" step="0.5" name="credit" class="form-control" value="" id="TeacherCredit" placeholder="Enter Credit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default save_button">Save</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>