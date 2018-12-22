<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/7/17
 * Time: 8:44 PM
 */

namespace App\Admin;
use App\Core\DB;


class Semester
{
    public static function getSemester()
    {
        $allSemester = null;
        $db = DB::getDB();
        $sql = "SELECT * FROM `semester` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            $allSemester = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        if ($allSemester){
            return $allSemester;
        }else{
            return false;
        }
    }
}