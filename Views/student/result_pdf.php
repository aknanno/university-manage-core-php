<?php
require_once "../../vendor/mpdf/mpdf/mpdf.php";
require_once "../../vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;
use App\Admin\Student;
use App\Admin\Result;
if (!Session::exists('user')){
    Redirect::to('../../index.php');
}
$regNo = '';
if (isset($_POST['makePDF'])){
    $regNo = $_POST['regNo'];
}
$studentInfo = Student::getStudentInfoByRegNo($regNo);
$result = Result::getStudentResult($regNo);

$registration = $studentInfo->registration_no;
$name = $studentInfo->student_name;
$email = $studentInfo->student_email;
$department = $studentInfo->department_name;

$serial = 1;
$viewResult = '';
foreach ($result as $singleResult){
    $grade = 'Not Graded Yet';
    if ($singleResult->grade_letter){
        $grade = $singleResult->grade_letter;
    }
    $viewResult .= '<tr>';
    $viewResult .= '<td>'. $serial .'</td>';
    $viewResult .= '<td>'. $singleResult->enroll_course_code .'</td>';
    $viewResult .= '<td>'. $singleResult->course_name .'</td>';
    $viewResult .= '<td>'. $grade .'</td>';
    $viewResult .= '<tr>';

    $serial++;
}

//echo '<pre>';
//print_r($studentInfo);
//print_r($result);
//exit();
?>
<?php
$html = <<<EOD
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!--    <link href="css/bootstrap.min.cs" rel="stylesheet">-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datepicker3.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!--Icons-->
    <script src="../assets/js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sidebar-menu.css">

    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 style = "background-color: #fff; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important; border: 1px solid #000; color:#001a00;" class="text-center login_welcome admin_top_text">Result</h1>
            <div style = "padding: 20px;" class="panel panel-default save_department">
                <fieldset>
                    <!--                    <legend style="text-align: center; color: #1b3548;">Course Assign</legend>-->
                    
                   <div style = "color: #001a00;">
                       <h3>Reg. No. $registration</h3>
                       <p>Name  $name</p>
                       <p>Email $email</p>
                       <p>Department $department</p>
                   </div> <br><br>

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
                            $viewResult;
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
EOD;

 require_once "../Admin/footer.php";
$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();
?>