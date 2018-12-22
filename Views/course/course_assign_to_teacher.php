<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}


$allDepartment = Department::getAllDepartment();

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Course Assign To Teacher</h1>
            <div class="panel panel-default save_department">
                <fieldset>
                    <!--                    <legend style="text-align: center; color: #1b3548;">Course Assign</legend>-->
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

                    <form action="save_teachers_assign_course.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="department" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="department" id="department">
                                    <option>.....Select Department.....</option>
                                    <?php foreach ($allDepartment as $department){?>
                                        <option><?php echo $department->department_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="teacher" class="col-sm-3 control-label">Teacher</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="teacher" id="teacher">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="creditToBeTaken" class="col-sm-3 control-label">Credit to be taken</label>
                            <div class="col-sm-9">
                                <input type="text" name="creditToBeTaken" class="form-control" id="creditToBeTaken" placeholder="to be taken">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remainingCredit" class="col-sm-3 control-label">Remaining credit</label>
                            <div class="col-sm-9">
                                <input type="text" name="remainingCredit" class="form-control" value="" id="remainingCredit" placeholder="Remaining">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courseCode" class="col-sm-3 control-label">Course code</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="courseCode" id="courseCode">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="" id="name" placeholder="Course name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="credit" class="col-sm-3 control-label">Credit</label>
                            <div class="col-sm-9">
                                <input type="text" name="credit" class="form-control" value="" id="credit" placeholder="Course credit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default save_button">Save</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
                <div style="display: none" class="dialog" id = "dialog"
                     title = "Warning !"> Do you want to assign more then remaining credit ?<br><br>
                    <button type="button" id="yes">Yes</button>
                    <button type="button" id="no">No</button>
                </div>
                <div style="display: none" class="dialog-2" id = "dialog_uniqueAssign"
                     title = "Warning !"> This course has already assigned. Please select another course <br> <br>
                    <button style="margin-left: 70%" type="button" id="close">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>