<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/11/17
 * Time: 8:28 PM
 */

namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;

class Room
{
    private $db = '';
    private static $pdo;
    private $department = '';
    private $course = '';
    private $room = '';
    private $day = '';
    private $timeFrom = '';
    private $timeTo = '';
    private static $allocateDayData = null;
    private static $allocateRoomData = null;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function setDepartmentData($data = '')
    {
        //print_r($data);exit();
        if (array_key_exists('department', $data)){
            $this->department = $data['department'];
        }
        if (array_key_exists('course', $data)){
            $this->course = $data['course'];
        }
        if (array_key_exists('room', $data)){
            $this->room = $data['room'];
        }
        if (array_key_exists('day', $data)){
            $this->day = $data['day'];
        }
        if (array_key_exists('timeFrom', $data)){
            $this->timeFrom = $data['timeFrom'];
        }
        if (array_key_exists('timeTo', $data)){
            $this->timeTo = $data['timeTo'];
        }

        return $this;
    }

    public function storeRoomAllocation()
    {
        $sql = "INSERT INTO `room_allocation` (`alocation_department`, `alocation_course`, `alocation_room`, `alocation_day`, `alocation_time_from`, `alocation_time_to`, `created_at`) VALUES (:department, :course, :room, :aday, :timeFrom, :timeTo, :createAt)";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':department' => $this->department,
                ':course' => $this->course,
                ':room' => $this->room,
                ':aday' => $this->day,
                ':timeFrom' => $this->timeFrom,
                ':timeTo' => $this->timeTo,
                ':createAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getAllRoom()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `rooms` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        $allRoom = null;
        if ($checkExecute){
            $allRoom = $query->fetchAll(\PDO::FETCH_OBJ);
            return $allRoom;
        }else{
            return $allRoom;
        }
    }

    public static function checkUniqueAllocateDay($day = '')
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `room_allocation` WHERE alocation_day = :aday";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':aday' => $day
            )
        );
        if($taskReplay){
            self::$allocateDayData = $query->fetchAll(\PDO::FETCH_OBJ);
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

    public static function checkUniqueAllocateRoom($room = '')
    {
        self::$pdo = DB::getDB();

        $sql = "SELECT * FROM `room_allocation` WHERE alocation_room = :room";
        $query = self::$pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':room' => $room
            )
        );
        if($taskReplay){
            self::$allocateRoomData = $query->fetchAll(\PDO::FETCH_OBJ);
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

    public static function getAllocateDayData(){
        if (self::$allocateDayData){
            return self::$allocateDayData;
        }else{
            return false;
        }
    }

    public static function getAllocateRoomData(){
        if (self::$allocateRoomData){
            return self::$allocateRoomData;
        }else{
            return false;
        }
    }

    public static function getRoomAllocationByDepartment($department = '')
    {
        $db = DB::getDB();
        $sql = "SELECT room_allocation.alocation_course, room_allocation.alocation_room, room_allocation.alocation_day, room_allocation.alocation_room, room_allocation.alocation_time_to, course.course_name FROM `room_allocation` LEFT JOIN course ON room_allocation.alocation_course = course.course_code WHERE room_allocation.alocation_department = :department AND room_allocation.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':department' => $department
            )
        );
        $allAllocationRoom = null;
        if ($checkExecute){
            $allAllocationRoom = $query->fetchAll(\PDO::FETCH_OBJ);
            return $allAllocationRoom;
        }else{
            return false;
        }
    }

    public static function getRoomAllocationByCourseCode($course = '')
    {
        $db = DB::getDB();
        $sql = "SELECT alocation_room, alocation_day, alocation_time_from, alocation_time_to FROM `room_allocation` WHERE alocation_course = :courseCode AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':courseCode' => $course
            )
        );
        $allAllocationRoom = null;
        if ($checkExecute){
            $allAllocationRoom = $query->fetchAll(\PDO::FETCH_OBJ);
            return $allAllocationRoom;
        }else{
            return false;
        }
    }

    public static function unallocateRooms()
    {
        $sql = "UPDATE `room_allocation` SET `deleted_at` = :deletedAt";
        $db = DB::getDB();
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':deletedAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }
}