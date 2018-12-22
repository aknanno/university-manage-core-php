<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/11/17
 * Time: 11:39 AM
 */

namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;
use PDO;


class Student
{
    private $db = '';
    private $name = '';
    private $email = '';
    private $contact = '';
    private $address = '';
    private $department = '';
    private $regNo = '';
    private $date = '';

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function setStudentData($data = '')
    {
        //print_r($data);exit();
        if (array_key_exists('name', $data)){
            $this->name = $data['name'];
        }

        if (array_key_exists('email', $data)){
            $this->email = $data['email'];
        }

        if (array_key_exists('contact', $data)){
            $this->contact = $data['contact'];
        }

        if (array_key_exists('studentAddress', $data)){
            $this->address = $data['studentAddress'];
        }

        if (array_key_exists('department', $data)){
            $this->department = $data['department'];
        }

        if (array_key_exists('department', $data)){
            $this->department = $data['department'];
        }

        if (array_key_exists('date', $data)){
            $this->date = $data['date'];
        }

        if (array_key_exists('regNo', $data)){
            $this->regNo = $data['regNo'];
        }

        return $this;
    }

    public function storeStudentInfo()
    {
        $sql = "INSERT INTO `students` (`registration_no`, `student_name`, `student_email`, `student_mobile`, `date`, `student_addresss`, `student_department`, `created_at`) VALUES (:regNo, :sname, :email, :mobile, :sdate, :address, :department, :createAt)";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':regNo' => $this->regNo,
                ':sname' => $this->name,
                ':email' => $this->email,
                ':mobile' => $this->contact,
                ':sdate' => $this->date,
                ':address' => $this->address,
                ':department' => $this->department,
                ':createAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getStudentLastRegNo($department = '')
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `students` WHERE `student_department` = :department ORDER BY student_id DESC LIMIT 1";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':department' => $department
            )
        );
        if ($checkExecute){
            $studentRegNo = $query->fetch(PDO::FETCH_OBJ);
            $row = $query->rowCount();
            if ($row){
                return $studentRegNo->registration_no;
            }else{
                return  100;
            }

        }else{
            return false;
        }
    }

    public static function getStudentInfoByRegNo($regNo = '')
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `students` LEFT JOIN department ON students.student_department = department.department_name WHERE students.registration_no = :regNo AND department.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':regNo' => $regNo
            )
        );
        if ($checkExecute){
            $studentRegNo = $query->fetch(PDO::FETCH_OBJ);

            return $studentRegNo;

        }else{
            return false;
        }
    }

    public static function getAllStudentsRegNo()
    {
        $db = DB::getDB();
        $sql = "SELECT (registration_no) FROM `students` LEFT JOIN department ON students.student_department = department.department_name WHERE students.deleted_at = '0000-00-00 00:00:00' AND department.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        if ($checkExecute){
            $studentsRegNo = $query->fetchAll(PDO::FETCH_OBJ);
            return $studentsRegNo;
        }else{
            return false;
        }
    }

    public static function getAllStudentsByDepartment($department = '')
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `students` WHERE student_department = :department AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':department' => $department
            )
        );
        if ($checkExecute){
            $assStudents = $query->fetchAll(PDO::FETCH_OBJ);
            return $assStudents;
        }else{
            return false;
        }
    }

    public static function getAllStudentsNo()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `students` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        if ($checkExecute){
            $studentsRegNo = $query->fetchAll(PDO::FETCH_OBJ);
            $row = $query->rowCount();
            return $row;
        }else{
            return 0;
        }
    }

}