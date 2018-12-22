<?php  namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;


class Grade
{
	// private $db;
	// public function __construct()
	// {
	// 	$this->db = DB::getDB();
	// }

	public static function getAllGrade()
    {
        $allGrade = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `grade_letter` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            $allGrade = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allGrade){
            return $allGrade;
        }else{
            return false;
        }
    }
}