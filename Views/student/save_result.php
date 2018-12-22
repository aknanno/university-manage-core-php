<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
use App\Admin\Student;
use App\Admin\Grade;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}


$studentsRegNo = Student::getAllStudentsRegNo();
$allGrade = Grade::getAllGrade();

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Save Student Result</h1>
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

                    <form action="store_result.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="regNoInResult" class="col-sm-3 control-label">Student Reg. No. </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="regNo" id="regNoInResult">
                                    <option>.....Select Registration No.....</option>
                                    <?php foreach ($studentsRegNo as $regNo){?>
                                        <option><?php echo $regNo->registration_no?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentNameInResult" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="studentNameInResult" class="form-control" placeholder="Student Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentEmailInResult" class="col-sm-3 control-label">Email </label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="studentEmailInResult" placeholder="Student Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInResult" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" name="department" class="form-control" value="" id="departmentInResult" placeholder="Student Department">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courseInReslut" class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="course" id="courseInReslut">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gradeLetter" class="col-sm-3 control-label">Grade Letter</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="grade" id="gradeLetter">
                                    <option>.....Select Grade Letter.....</option>
                                    <?php foreach ($allGrade as $grade){?>
                                        <option value="<?php echo $grade->grade_id?>"><?php echo $grade->grade_letter?></option>
                                    <?php } ?>
                                </select>
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