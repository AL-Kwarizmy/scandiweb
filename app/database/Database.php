<?php

namespace app\database;

use app\models\Product;
use PDO;

class Database
{
    public static PDO $connection;

    public static function makeConnection($config)
    {
        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";

        try {
            self::$connection = new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            return self::$connection;
        } catch (\PDOException $exception) {
            exit("PDO failed to connect");
        }
    }

    public static function get(string $table): false|array
    {
        $query = "SELECT * FROM {$table}";
        $query = self::execute($query);
        return $query->fetchAll();
    }

    public static function create(string $table, array $data, array $keys): void
    {
        $columns = implode(',', $keys);
        $values = str_repeat("?,", count($keys) - 1) . "?";
        $query = "INSERT INTO {$table}({$columns}) values($values)";
        self::execute($query, $data);
    }

    public static function execute(string $query, array $data = []): false|\PDOStatement
    {
        $stmt = self::$connection->prepare($query);
        $stmt->execute(array_values($data));
        return $stmt;
    }
}