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
?>

<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
            <h1 class="text-center login_welcome admin_top_text">Unallocate Rooms</h1>
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

                    <form id="unRooms" action="" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button style="color: #fff; background-color: #1b3548;" type="submit" id="unallocateRooms" value="unallocateRooms" name="unallocateRoom" class="btn btn-default save_button">Unallocate Rooms</button>
                            </div>
                        </div>
                    </form>
                    <div style="display: none" class="dialog" id = "dialog_unallocate"
                         title = "Warning !"> Are you sure to unallocate all classrooms info?<br><br>
                        <button type="button" id="yes">Yes</button>
                        <button type="button" id="no">No</button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>