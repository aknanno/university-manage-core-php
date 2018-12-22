<?php  namespace App\Core;
//this class is responsible for all CRUD operations for this project.
use PDO;
class DB
{
    private static $_instance = null;
    private $_pdo;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=127.0.0.1;dbname=', '', '' );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //create object for this class by using this function.
    public static function getDB()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new PDO('mysql:host=127.0.0.1;dbname=', '', '' );
        }
        return self::$_instance;
    }

}


?>