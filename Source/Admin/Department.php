<?php namespace App\Admin;

require_once "../../vendor/autoload.php";
use App\Core\DB;

class Department
{
    private $db = null;
    private $code = '';
    private $name = '';
    private $departmentId = '';
    private static $_allDepartment = null;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function setDepartmentData($data = '')
    {
        //print_r($data);exit();
        if (array_key_exists('code', $data)){
            $this->code = $data['code'];
        }

        if (array_key_exists('name', $data)){
            $this->name = $data['name'];
        }

        if (array_key_exists('department_id', $data)){
            $this->departmentId = $data['department_id'];
        }

        return $this;
    }

    public function addDepartment()
    {
        $sql = "INSERT INTO `department` (`department_code`, `department_name`, `created_at`) VALUES (:code, :dname, :createAt)";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':code' => $this->code,
                ':dname' => $this->name,
                ':createAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getAllDepartment()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        if ($checkExecute){
            self::$_allDepartment = $query->fetchAll(\PDO::FETCH_OBJ);
            return self::$_allDepartment;
        }else{
            return self::$_allDepartment;
        }
    }

    public static function getSingleDepartmentById($departmentId = null)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department WHERE department_id = :departmentId AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentId' => $departmentId
            )
        );
        if ($checkExecute){
            self::$_allDepartment = $query->fetch(\PDO::FETCH_OBJ);
            return self::$_allDepartment;
        }else{
            return self::$_allDepartment;
        }
    }

    public static function getSingleDepartmentByCode($departmentCode = null)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department WHERE department_code = :departmentCode AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentCode' => $departmentCode
            )
        );
        if ($checkExecute){
            self::$_allDepartment = $query->fetch(\PDO::FETCH_OBJ);
            return self::$_allDepartment;
        }else{
            return self::$_allDepartment;
        }
    }

    public static function getSingleDepartmentByName($departmentName = null)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department WHERE department_name = :departmentName";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        if ($checkExecute){
            self::$_allDepartment = $query->fetch(\PDO::FETCH_OBJ);
            return self::$_allDepartment;
        }else{
            return self::$_allDepartment;
        }
    }


    public function updateDepartment()
    {
        $sql = "UPDATE `department` SET `department_name` = :dname, `department_code` = :code, `updated_at` = :updatedAt WHERE `department`.`department_id` = :department_id;";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':code' => $this->code,
                ':dname' => $this->name,
                ':updatedAt' => date('Y-m-d h:m:s'),
                ':department_id' => $this->departmentId
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function deleteDepartment($departmentId = null)
    {
        $db = DB::getDB();
        $sql = "UPDATE `department` SET `deleted_at` = :deleteTime WHERE `department`.`department_id` = :department_id";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':deleteTime' => date('Y-m-d h:m:s'),
                ':department_id' => $departmentId
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getDepartmentTeacher($departmentName)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM teacher WHERE teacher.teacher_department = :departmentName AND teacher.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        $departmentTeacher = null;
        if ($checkExecute){
            $departmentTeacher = $query->fetchAll(\PDO::FETCH_OBJ);
            return $departmentTeacher;
        }else{
            return $departmentTeacher;
        }
    }

    public static function getDepartmentCourse($departmentName)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM course WHERE course_department = :departmentName AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        $departmentCourse = null;
        if ($checkExecute){
            $departmentCourse = $query->fetchAll(\PDO::FETCH_OBJ);
            return $departmentCourse;
        }else{
            return $departmentCourse;
        }
    }

    public static function getDepartmentTeacherCourse($departmentName)
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department JOIN teacher ON department.department_name = teacher.teacher_department JOIN course ON department.department_name = course.course_department WHERE department.department_name = :departmentName AND department.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        $departmentTeacher = null;
        if ($checkExecute){
            $departmentTeacher = $query->fetchAll(\PDO::FETCH_OBJ);
            return $departmentTeacher;
        }else{
            return $departmentTeacher;
        }
    }

    public static function getAllDepartmentNo()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM department WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        if ($checkExecute){
            self::$_allDepartment = $query->fetchAll(\PDO::FETCH_OBJ);
            $count = $query->rowCount();
            return $count;
        }else{
            return 0;
        }
    }

}