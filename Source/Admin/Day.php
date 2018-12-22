<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/11/17
 * Time: 8:41 PM
 */

namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;


class Day
{
    public static function getAllday()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `Days` ORDER BY day_id ASC";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();
        $allday = null;
        if ($checkExecute){
            $allday = $query->fetchAll(\PDO::FETCH_OBJ);
            return $allday;
        }else{
            return $allday;
        }
    }
}