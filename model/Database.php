<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=a_reachfox';
    private static $dbUser= 'root';
    private static $dbPwd = '';

    //private static $dsn = 'mysql:host=localhost;dbname=codezyn_reachfox';
    //private static $dbUser= 'codezyn_rf';
    //private static $dbPwd = 'reachfox@123';

    private static $dbCon;
    private function __construct() {}

    //return reference to pdo object
    public static function connectDB () {
    	
        if (!isset(self::$db)) {
            try {
                self::$dbCon = new PDO(self::$dsn,
                                     self::$dbUser,
                                     self::$dbPwd);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$dbCon;
    }
}
?> 