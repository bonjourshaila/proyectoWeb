<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=softurasolutions;port=3306", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
