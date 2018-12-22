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

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">View Result</h1>
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

                    <form action="result_pdf.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="regNoInViewResult" class="col-sm-3 control-label">Student Reg. No. </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="regNo" id="regNoInViewResult">
                                    <option>.....Select Registration No.....</option>
                                    <?php foreach ($studentsRegNo as $regNo){?>
                                        <option><?php echo $regNo->registration_no?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentNameInViewResult" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="studentNameInViewResult" class="form-control" placeholder="Student Name" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentEmailInViewResult" class="col-sm-3 control-label">Email </label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="studentEmailInViewResult" placeholder="Student Email" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentInViewResult" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" name="department" class="form-control" value="" id="departmentInViewResult" placeholder="Student Department" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="makePDF" value="makePDF" class="btn btn-default save_button">Make PDF</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-striped" style="text-align: center">
                        <thead style="background-color: #1a2226; text-align: center; color: #fff">
                        <tr>
                            <th style="text-align: center">Serial No</th>
                            <th style="text-align: center">Course Code</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Grade</th>
                        </tr>
                        </thead>
                        <tbody id="viewResult" style="color: #1b3548">
                            
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>