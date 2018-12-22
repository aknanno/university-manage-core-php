<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/8/17
 * Time: 1:41 AM
 */

namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;
use PDO;

class Teacher
{
    private $db = null;
    private $name = null;
    private $address = null;
    private $email = null;
    private $contact = null;
    private $designation = null;
    private $department = null;
    private $credit = null;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function setTeacherData($data = '')
    {
        //print_r($data);exit();
        if (array_key_exists('name', $data)){
            $this->name = $data['name'];
        }

        if (array_key_exists('address', $data)){
            $this->address = $data['address'];
        }

        if (array_key_exists('email', $data)){
            $this->email = $data['email'];
        }

        if (array_key_exists('contact', $data)){
            $this->contact = $data['contact'];
        }

        if (array_key_exists('designation', $data)){
            $this->designation = $data['designation'];
        }

        if (array_key_exists('department', $data)){
            $this->department = $data['department'];
        }

        if (array_key_exists('credit', $data)){
            $this->credit = $data['credit'];
        }

        return $this;
    }

    public function addTeacher()
    {
        $sql = "INSERT INTO `teacher` (`teacher_name`, `teacher_address`, `teacher_email`, `teacher_contact`, `designation`, `teacher_department`, `teacher_credit`, `created_at`) VALUES (:tname, :address, :email, :contact, :designation, :department, :credit, :createAt)";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':tname' => $this->name,
                ':address' => $this->address,
                ':email' => $this->email,
                ':contact' => $this->contact,
                ':designation' => $this->designation,
                ':department' => $this->department,
                ':credit' => $this->credit,
                ':createAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getAllTeacher()
    {
        $allTeacher = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `teacher` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            $allTeacher = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allTeacher){
            return $allTeacher;
        }else{
            return false;
        }
    }

    public static function getTeacherById($teacherId = '')
    {
        $allTeacher = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM teacher WHERE teacher_id = :teacherId AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':teacherId' => $teacherId
            )
        );

        if ($checkExecute){
            $allTeacher = $query->fetch(\PDO::FETCH_OBJ);
        }
        if ($allTeacher){
            return $allTeacher;
        }else{
            return false;
        }
    }

    public static function getAllTeacherNO()
    {
        $allTeacher = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `teacher` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            $allTeacher = $query->fetchAll(\PDO::FETCH_OBJ);
            $count = $query->rowCount();
        }
        if ($allTeacher){
            return $count;
        }else{
            return 0;
        }
    }

    public static function getAllTeacherByDepartment($department = '')
    {
        $allTeacher = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `teacher` WHERE teacher_department = :department AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':department' => $department
            )
        );

        if ($checkExecute){
            $allTeacher = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allTeacher){
            return $allTeacher;
        }else{
            return false;
        }
    }
}