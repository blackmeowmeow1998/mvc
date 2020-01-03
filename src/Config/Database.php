<?php
namespace Black\Config;
use PDO;

class Database
{
    protected static $bdd = null;

    function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=127.0.0.1:3306;dbname=mvc", 'root', 'BevolL99999');
        }
        return self::$bdd;
    }
}
?>