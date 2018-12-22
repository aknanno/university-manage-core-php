<?php

namespace App\Core;
require_once "../../vendor/autoload.php";
use App\Core\DB;
use PDO;

class Unique
{
    private static $pdo = null;
    private static $allData = null;
    private  $_allData = null;

    public static function checkUser($email)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `admin_login` WHERE `email` = :email";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':email' => $email
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function checkDepartmentCode($code)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `department` WHERE department_code = :code AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':code' => $code
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function GetDepartmentCode($code)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `department` WHERE department_code = :code AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':code' => $code
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return $this->_allData;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function getAlldata(){
        if (self::$allData){
            return self::$allData;
        }
    }

    public static function checkDepartmentName($name)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `department` WHERE department_name = :dname AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':dname' => $name
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function checkCourseCode($code)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `course` WHERE course_code = :code AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':code' => $code
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function checkCourseName($name)
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `course` WHERE course_name = :cname AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':cname' => $name
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function checkTeacherEmail($email = '')
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `teacher` WHERE teacher_email = :email AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':email' => $email
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function checkAssignCourse($couseCode = '')
    {
        self::$pdo = DB::getDB();
        $sql = "SELECT * FROM assign_course WHERE assign_course.assign_course_code = :couseCode AND assign_course.deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':couseCode' => $couseCode
            )
        );
        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return null;
        }
    }

    public static function checkStudentEmail($email = '')
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `students` WHERE 	student_email = :email AND deleted_at = '0000-00-00 00:00:00'";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':email' => $email
            )
        );

        if($taskReplay){
            self::$allData = $query->fetch(PDO::FETCH_OBJ);
            $count = $query->rowCount();
            if ($count){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public static function getUserData()
    {
        if (self::$allData){
            return self::$allData;
        }
    }

    public static function getCourseData()
    {
        if (self::$allData){
            return self::$allData;
        }
    }
}