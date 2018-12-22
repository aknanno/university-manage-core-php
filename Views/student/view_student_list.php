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
            <h1 class="text-center login_welcome admin_top_text">View Student List</h1>
            <div class="panel panel-default save_department">

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

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px">
                        <label for="departmentInStudentList" style="width: 25%; float: left; font-weight: 900; color: #1b3548" class="col-sm-4 form-control">Department</label>
                        <select style="width: 70%; float: right" class="form-control col-sm-8" name="department" id="departmentInStudentList">
                            <option>.....Select Department.....</option>
                            <?php foreach ($allDepartment as $department){?>
                                <option id=""><?php echo $department->department_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <fieldset>

                    <legend style="text-align: center; color: #1b3548; font-weight: 900">Student List</legend>
                    <!--                    <p>Corese Information</p>-->
                    <table class="table table-striped" style="text-align: center">
                        <thead style="background-color: #1a2226; text-align: center; color: #fff">
                        <tr>
                            <th style="text-align: center">Serial No</th>
                            <th style="text-align: center">Reg. No.</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Department</th>
                        </tr>
                        </thead>
                        <tbody id="studentList" style="color: #1b3548">

                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>