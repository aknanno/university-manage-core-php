<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
use App\Admin\Student;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}


$studentsRegNo = Student::getAllStudentsRegNo();

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Enroll In a Course</h1>
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

                    <form action="store_enroll_course.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="regNo" class="col-sm-3 control-label">Student Reg. No. </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="regNo" id="regNo">
                                    <option>.....Select Registration No.....</option>
                                    <?php foreach ($studentsRegNo as $regNo){?>
                                        <option><?php echo $regNo->registration_no?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="studentName" class="form-control" placeholder="Student Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentEmail" class="col-sm-3 control-label">Email </label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="studentEmail" placeholder="Student Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInEnrollCourse" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" name="department" class="form-control" value="" id="departmentInEnrollCourse" placeholder="Student Department">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courseNameInEnroll" class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="course" id="courseNameInEnroll">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datepicker" class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-9">
                                <input type="text" name="date" id="datepicker" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default save_button">Enroll</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
                <div style="display: none" class="dialog" id = "dialog"
                     title = "Warning !"> Do you want to assign more then remaining credit ?<br>
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