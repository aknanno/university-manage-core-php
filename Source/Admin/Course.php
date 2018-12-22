<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/7/17
 * Time: 10:23 PM
 */

namespace App\Admin;
use App\Core\DB;


class Course
{
    private $db = null;
    private $code = '';
    private $name = '';
    private $credit = '';
    private $description = '';
    private $department = '';
    private $semester = '';
    private $teacherId = '';
    private $courseCode = '';
    private $teacher = '';
    private $regNo = '';
    private $course = '';
    private $date = '';

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function setCourseData($data = '')
    {
        // echo "<pre>";
        // print_r($data);exit();
        if (array_key_exists('code', $data)){
            $this->code = $data['code'];
        }

        if (array_key_exists('name', $data)){
            $this->name = $data['name'];
        }

        if (array_key_exists('credit', $data)){
            $this->credit = $data['credit'];
        }

        if (array_key_exists('description', $data)){
            $this->description = $data['description'];
        }

        if (array_key_exists('department', $data)){
            $this->department = $data['department'];
        }

        if (array_key_exists('semester', $data)){
            $this->semester = $data['semester'];
        }

        if (array_key_exists('teacherId', $data)){
            $this->teacherId = $data['teacherId'];
        }
        if (array_key_exists('courseCode', $data)){
            $this->courseCode = $data['courseCode'];
        }

        if (array_key_exists('teacher', $data)){
            $this->teacher = $data['teacher'];
        }

        if (array_key_exists('regNo', $data)){
            $this->regNo = $data['regNo'];
        }

        if (array_key_exists('course', $data)){
            $this->course = $data['course'];
        }

        if (array_key_exists('date', $data)){
            $this->date = $data['date'];
        }

        return $this;
    }

    public function addCourse()
    {
        $sql = "INSERT INTO `course` (`course_code`, `course_name`, `course_credit`, `course_description`, `course_department`, `course_semester_id`, `created_at`) VALUES (:code, :cname, :credit, :description, :department, :semester, :created)";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':code' => $this->code,
                ':cname' => $this->name,
                ':credit' => $this->credit,
                ':description' => $this->description,
                ':department' => $this->department,
                ':semester' => $this->semester,
                ':created' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public function storeEnroolCourse()
    {
        //echo $this->regNo, $this->course, $this->date;exit();
        $sql = "INSERT INTO `enroll_course_student` (`enroll_student_reg_no`, `enroll_course_code`, `enroll_date`, `created_at`) VALUES (:regNo, :courseCode, :courseDate, :created);";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':regNo' => $this->regNo,
                ':courseCode' => $this->course,
                ':courseDate' => $this->date,
                ':created' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getAllCourse()
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `course` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            $allCourse = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allCourse){
            return $allCourse;
        }else{
            return false;
        }
    }

    public static function getAllCourseByDepartmentName($departmentName = '')
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT course.course_code, course.course_name, semester.semester_name FROM course LEFT JOIN semester ON course.course_semester_id = semester.semester_id WHERE course.course_department = :departmentName AND course.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        if ($checkExecute){
            $allCourse = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allCourse){
            return $allCourse;
        }else{
            return false;
        }
    }

    public static function getJustAllCourse($departmentName = '')
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `course` WHERE course_department = :departmentName AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':departmentName' => $departmentName
            )
        );
        if ($checkExecute){
            $allCourse = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allCourse){
            return $allCourse;
        }else{
            return false;
        }
    }

    public static function getCourseInformation($courseCode = '')
    {
        $courseInfo = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `course` WHERE course.course_code = :courseCode AND course.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':courseCode' => $courseCode
            )
        );

        if ($checkExecute){
            $courseInfo = $query->fetch(\PDO::FETCH_OBJ);
        }
        if ($courseInfo){
            return $courseInfo;
        }else{
            return false;
        }
    }

    public static function getCourseAssignData($teacherId = '')
    {
        $courseInfo = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `assign_course` WHERE teacher_id = :teacherId AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':teacherId' => $teacherId
            )
        );
        $courseAssignData = '';
        if ($checkExecute){
            $courseAssignData = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($courseAssignData){
            return $courseAssignData;
        }else{
            return $courseAssignData;
        }
    }

    public function saveTeacherAssignCourse()
    {
        $sql = "INSERT INTO `assign_course` (`teacher_id`,`assign_teacher_name`, `assign_course_code`, `assign_course_credit`, `created_at`) VALUES (:teacherId, :teacher, :courseCode, :credit, :created);";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':teacherId' => $this->teacherId,
                ':teacher' => $this->teacher,
                ':courseCode' => $this->courseCode,
                ':credit' => $this->credit,
                ':created' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function getEnrollCourseByCourseCode($courseCode = '')
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `enroll_course_student` WHERE enroll_course_code = :courseCode AND deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
                array(
                    ':courseCode' => $courseCode
                    )
            );

        if ($checkExecute){
            $allCourse = $query->fetch(\PDO::FETCH_OBJ);
        }
        if ($allCourse){
            return $allCourse;
        }else{
            return false;
        }
    }

    public static function getAllEnrollCourseByStudentRegNo($regNo = '')
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT enroll_course_code, enroll_id, course_name FROM `enroll_course_student` LEFT JOIN course ON enroll_course_student.enroll_course_code = course.course_code WHERE enroll_course_student.enroll_student_reg_no = :regNo AND enroll_course_student.deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
                array(
                    ':regNo' => $regNo
                    )
            );

        if ($checkExecute){
            $allCourse = $query->fetchAll(\PDO::FETCH_OBJ);
            $rowCount =  $query->rowCount();
        }
        if ($rowCount){
            return $allCourse;
        }else{
            return false;
        }
    }

    public static function getAllCourseNo()
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `course` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        if ($checkExecute){
            $allCourse = $query->fetchAll(\PDO::FETCH_OBJ);
            $count = $query->rowCount();
        }
        if ($allCourse){
            return $count;
        }else{
            return 0;
        }
    }

    public static function getAllAssignCourse()
    {
        $courseInfo = null;
        $db = DB::getDB();
        $sql = "SELECT assign_course_code, assign_teacher_name FROM `assign_course` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        $courseAssignData = '';
        if ($checkExecute){
            $courseAssignData = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($courseAssignData){
            return $courseAssignData;
        }else{
            return $courseAssignData;
        }
    }

    public static function unAssignCourses()
    {
        $sql = "UPDATE `assign_course` SET `deleted_at` = :updatedAt";
        $db = DB::getDB();
        $query = $db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':updatedAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }
}