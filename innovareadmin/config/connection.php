<?php

class Connection {

    private static $properties;

    private function  __construct() {

        if (file_exists('./innovare.properties')) {
            self::$properties = parse_ini_file("./innovare.properties");
        }else{
            self::$properties = parse_ini_file("../innovare.properties");
        }
    }

    public static function getConnection(){
        static $pdo;
        if($pdo == null){
            new Connection();
            $dsn = "mysql:host=" . self::$properties["hostname"] . ";dbname=" . self::$properties["db_name"]."";
            $pdo = new PDO($dsn,self::$properties["username"], self::$properties["password"]);
        }

        return $pdo;
    }

}
?>

