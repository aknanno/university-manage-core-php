<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Department;
use App\Admin\Room;
use App\Admin\Day;

if (!Session::exists('user')){
    Redirect::to('../../index.php');
}


$allDepartment = Department::getAllDepartment();
$allRoom = Room::getAllRoom();
$allDay = Day::getAllday();
?>


<?php require_once "../Admin/header.php"?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <h1 class="text-center login_welcome admin_top_text">Allocate Classrooms</h1>
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

                    <form action="allocat_action.php" method="post" class="department_form form-horizontal col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="departmentInRoomAllocation" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="department" id="departmentInRoomAllocation">
                                    <option>.....Select Department.....</option>
                                    <?php foreach ($allDepartment as $department){?>
                                        <option><?php echo $department->department_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="courseInRoomAllocation" class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="course" id="courseInRoomAllocation">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roomNo" class="col-sm-3 control-label">Room No</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="room" id="roomNo">
                                    <option>.....Select Room No.....</option>
                                    <?php foreach ($allRoom as $room){?>
                                        <option><?php echo $room->room_no?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-sm-3 control-label">Day </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="day" id="day">
                                    <option>.....Select Day.....</option>
                                    <?php foreach ($allDay as $day){?>
                                        <option><?php echo $day->day_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="timeFrom" class="col-sm-3 control-label">From </label>
                            <div class="col-sm-9">
                                <input type="time" name="timeFrom" id="timeFrom" class="form-control" placeholder="23:59">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="timeTo" class="col-sm-3 control-label">To </label>
                            <div class="col-sm-9">
                                <input type="time" name="timeTo" id="timeTo" class="form-control" placeholder="23:59">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default save_button">Allocate</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
<!--                <div style="display: none" class="dialog" id = "dialog"-->
<!--                     title = "Warning !"> Are you sure to unallocate all classrooms info? ?<br>-->
<!--                    <button type="button" id="yes">Yes</button>-->
<!--                    <button type="button" id="no">No</button>-->
<!--                </div>-->
<!--                <div style="display: none" class="dialog-2" id = "dialog_uniqueAssign"-->
<!--                     title = "Warning !"> Are you sure to unallocate all classrooms info? <br> <br>-->
<!--                    <button style="margin-left: 70%" type="button" id="close">Close</button>-->
<!--                </div>-->
            </div>
        </div>
    </div>
<?php require_once "../Admin/footer.php"?>