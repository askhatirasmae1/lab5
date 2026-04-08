<?php
namespace App\Database;

use PDO;
use App\Log\Logger;

class DBConnection
{
    private static $pdo;
    private static $logger;

    public static function init(Logger $logger)
    {
        self::$logger = $logger;

        $config = require __DIR__ . '/../../config/db.php';

        try {
            self::$pdo = new PDO(
                $config['dsn'],
                $config['user'],
                $config['pass'],
                $config['options']
            );
        } catch (\PDOException $e) {
            $logger->error($e->getMessage());
            die("Erreur connexion DB");
        }
    }

    public static function get(): PDO
    {
        return self::$pdo;
    }
}