<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
use App\Admin\Semester;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

$allDepartment = Department::getAllDepartment();
$allSemester = Semester::getSemester();


?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Add Course</h1>
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

                    <form action="store_course.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="course_code" class="col-sm-2 control-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" class="form-control" id="course_code" value="" placeholder="Course code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courseName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="" id="courseName" placeholder="Course Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="creditInAddCourse" class="col-sm-2 control-label">Credit</label>
                            <div class="col-sm-10">
                                <input type="number" name="credit" step="0.5" class="form-control" value="" id="creditInAddCourse" placeholder="Credit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" cols="40" rows="4" placeholder="Description about course"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInAddCourse" class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department" id="departmentInAddCourse">
                                    <option>.....Select Department.....</option>
                                    <?php foreach ($allDepartment as $department){?>
                                    <option><?php echo $department->department_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="semester" class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester" id="semester">
                                    <option>.....Select Semester.....</option>
                                    <?php foreach ($allSemester as $semester){?>
                                        <option value="<?php echo $semester->semester_id?>"><?php echo $semester->semester_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default save_button">Save</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>