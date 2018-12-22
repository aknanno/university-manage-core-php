<?php
require_once "../../vendor/autoload.php";
use App\Core\Unique;

header('Content-type: text/javascript');

$json = 'No data found';

if (isset($_POST['email'])){
    $email = $_POST['email'];
    $json = !Unique::checkStudentEmail($email);
}




echo json_encode($json);