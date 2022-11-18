<?php

namespace sm;

use PDO;
use PDOException;

class Database
{
    private static null|\PDO $pdo = null;

    public static function getPdo(): \PDO
    {
        if (self::$pdo === null) {
            $dsn = "mysql:host=127.0.0.1;dbname=db;charset=UTF8";

            try {
                self::$pdo = new PDO($dsn, 'user', 'user');
                return self::$pdo;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$pdo;
    }
}