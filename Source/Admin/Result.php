<?php  namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;

class Result
{
	private $db = '';
	private $regNo = '';
	private $course = '';
	private $grade = '';
    private static $allData;

	public function __construct()
	{
		$this->db = DB::getDB();
	}

	public function setResultData($data = '')
    {
        if (array_key_exists('regNo', $data)){
            $this->regNo = $data['regNo'];
        }

        if (array_key_exists('course', $data)){
            $this->course = $data['course'];
        }

        if (array_key_exists('grade', $data)){
            $this->grade = $data['grade'];
        }
       

        return $this;
    }

    public function saveResult()
    {
        $sql = "INSERT INTO `result` (`r_student_reg_no`, `enroll_course_id`, `letter_grade_id`, `created_at`) VALUES (:regNo, :courseId, :grade, :createAt);";
        $query = $this->db->prepare($sql);
        $checkExecute = $query->execute(
            array(
                ':regNo' => $this->regNo,
                ':courseId' => $this->course,
                ':grade' => $this->grade,
                ':createAt' => date('Y-m-d h:m:s')
            )
        );
        if ($checkExecute){
            return true;
        }else{
            return false;
        }
    }

    public static function checkResultSave($course_id = '')
    {
        $pdo = DB::getDB();

        $sql = "SELECT * FROM `result` WHERE enroll_course_id = :courseId AND deleted_at = '0000-00-00 00:00:00'";
        $query = $pdo->prepare($sql);
        $taskReplay = $query->execute(
            array(
                ':courseId' => $course_id
            )
        );
        if($taskReplay){
            self::$allData = $query->fetch(\PDO::FETCH_OBJ);
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

    public static function getStudentResult($regNo = '')
    {
        $allCourse = null;
        $db = DB::getDB();
        $sql = "SELECT enroll_course_student.enroll_course_code, course.course_name, grade_letter.grade_letter FROM enroll_course_student LEFT JOIN course ON enroll_course_student.enroll_course_code = course.course_code LEFT JOIN result ON enroll_course_student.enroll_id = result.enroll_course_id LEFT JOIN grade_letter ON result.letter_grade_id = grade_letter.grade_id WHERE enroll_course_student.enroll_student_reg_no = :regNo AND enroll_course_student.deleted_at = '0000-00-00 00:00:00'";
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
}
