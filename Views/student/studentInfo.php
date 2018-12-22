<?php
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Student;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}

if (Session::exists('regNo')){
    $regNo = Session::get('regNo');
    $studentInfo = Student::getStudentInfoByRegNo($regNo);
    //Session::delete('regNo');

?>

<!-- all common data like menu, sidebar etc.-->
<?php require_once "../Admin/header.php"?>

<div class="row">
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
        <h1 class="text-center login_welcome admin_top_text">Student Information</h1>
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

                <div style="margin-left: 50px; ">
                    <h3>Registration No # <?php echo $studentInfo->registration_no?></h3>
                    <p style="color: darkslategrey">Name : <?php echo $studentInfo->student_name?></p>
                    <p style="color: darkslategrey">Email : <?php echo $studentInfo->student_email?></p>
                    <p style="color: darkslategrey">Department : <?php echo $studentInfo->student_department?></p>
                    <p style="color: darkslategrey">Address : <?php echo $studentInfo->student_addresss?></p>
                    <p style="color: darkslategrey">Contact No : <?php echo $studentInfo->student_mobile?></p>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<?php require_once "../Admin/footer.php";
}else{
    Redirect::to('register_student.php');
}
?>
