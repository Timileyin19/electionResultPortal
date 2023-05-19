<?php

class Model
{
    public static $host = "localhost";
    public static $dbName = "bincom_test";
    public static $username = "root";
    public static $password = "";

    public static function connect()
    {
        $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
