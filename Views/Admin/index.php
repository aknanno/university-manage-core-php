<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Student;
use App\Admin\Teacher;
use App\Admin\Course;
use App\Admin\Department;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

// Deleting student registration No of 'student info page'.
if (Session::exists('regNo')){
    Session::delete('regNo');
}
$totalStudentNo = Student::getAllStudentsNo();
$totalTeacherNo = Teacher::getAllTeacherNO();
$totalCourseNo = Course::getAllCourseNo();
$totalDepartmentNo = Department::getAllDepartmentNo();

//echo $totalDepartmentNo;exit();

?>


<?php require_once "header.php"?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <i style="font-size: 50px" class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $totalStudentNo;?></div>
                            <div class="text-muted">Total Students</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $totalTeacherNo;?></div>
                            <div class="text-muted">Total Teachers</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <i style="font-size: 50px" class="fa fa-book"></i>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $totalCourseNo;?></div>
                            <div class="text-muted">Total Course</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <i style="font-size: 50px" class="fa fa-language"></i>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large"><?php echo $totalDepartmentNo;?></div>
                            <div class="text-muted">Total Department</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">System Performance Statistic</div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Students</h4>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $totalStudentNo?>"><span class="percent"><?php echo $totalStudentNo?>%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Teachers</h4>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $totalTeacherNo;?>"><span class="percent"><?php echo $totalTeacherNo;?>%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Courses</h4>
                        <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $totalCourseNo;?>"><span class="percent"><?php echo $totalCourseNo;?>%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Departments</h4>
                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $totalDepartmentNo;?>"><span class="percent"><?php echo $totalDepartmentNo;?>%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require_once "footer.php"?>