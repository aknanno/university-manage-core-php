<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 2/8/17
 * Time: 12:00 AM
 */

namespace App\Admin;
require_once "../../vendor/autoload.php";
use App\Core\DB;
use PDO;


class Designation
{
    public static function getDesignation()
    {
        $db = DB::getDB();
        $sql = "SELECT * FROM `designation` WHERE deleted_at = '0000-00-00 00:00:00'";
        $query = $db->prepare($sql);
        $checkExecute = $query->execute();

        if ($checkExecute){
            return $query->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }
}