<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Admin\Department;
use App\Core\Redirect;

$time = serialize(time());
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

$allDepartment = Department::getAllDepartment();
//print_r($allDepartment);exit();

?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">All Department</h1>
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

                    <table class="table table-striped" style="text-align: center">
                        <thead style="background-color: #1a2226; text-align: center; color: #fff">
                        <tr>
                            <th style="text-align: center">Serial No</th>
                            <th style="text-align: center">Code</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $serial = 1; foreach ($allDepartment as $department){  ?>
                        <tr>
                            <td><?php echo $serial?></td>
                            <td><?php echo $department->department_code?></td>
                            <td><?php echo $department->department_name?></td>
                            <td><a href="edit_department.php?department=<?php echo $time, $department->department_id?>&dpt=<?php echo $time?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp; <a href="delete_department.php?department=<?php echo $time, $department->department_id?>&dpt=<?php echo $time?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php $serial++; }?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>