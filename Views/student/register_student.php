<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}
// Deleting student registration No of 'student info page'.
if (Session::exists('regNo')){
    Session::delete('regNo');
}

$allDepartment = Department::getAllDepartment();


?>

<!-- all common data like menu, sidebar etc.-->
<?php require_once "../Admin/header.php"?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Register Student</h1>
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

                    <form action="store_student.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="studentName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="" id="studentName" placeholder="Enter Student's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" value="" id="studentEmail" placeholder="Enter Student's email"><p style="display: none; color: red" id="emailUniqueError"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentContact" class="col-sm-3 control-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" class="form-control" value="" id="studentContact" placeholder="Enter Contact No">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datepicker" class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-9">
                                <input type="text" name="date" id="datepicker" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentAddress" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="studentAddress" id="address" cols="40" rows="4" placeholder="Enter Student's address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInRegisterStudent" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="department" id="departmentInRegisterStudent">
                                    <option>.....Select Department.....</option>
                                    <?php foreach ($allDepartment as $department){?>
                                        <option><?php echo $department->department_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default save_button">Register</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

<?php require_once "../Admin/footer.php"?>
