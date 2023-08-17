<?php

namespace app\database;

use app\models\Product;
use Exception;
use PDO;

class Database
{
    public static PDO $connection;

    /**
     * @param $config
     * @return PDO|void
     */
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

    /**
     * @param string $table
     * @return false|array
     */
    public static function get(string $table): false|array
    {
        $query = "SELECT * FROM {$table}";
        $query = self::execute($query);
        return $query->fetchAll();
    }

    /**
     * @param string $table
     * @param array $data
     * @param array $keys
     * @return Exception|string|null
     */
    public static function create(string $table, array $data, array $keys): Exception|string|null
    {
        try {
            $columns = implode(',', $keys);
            $values = str_repeat("?,", count($keys) - 1) . "?";
            $query = "INSERT INTO $table($columns) values($values)";
            self::execute($query, $data);
        } catch(Exception $e) {
            return $e;
        }
        return null;
    }

    /**
     * @param string $table
     * @param array $ids
     * @return void
     */
    public static function delete(string $table, array $ids): void
    {
        $values = str_repeat("?,", count($ids) - 1) . "?";
        $query = "DELETE FROM $table WHERE id IN ($values) ";
        self::execute($query, $ids);
    }

    /**
     * @param string $query
     * @param array $data
     * @return false|\PDOStatement
     */
    public static function execute(string $query, array $data = []): false|\PDOStatement
    {
        $stmt = self::$connection->prepare($query);
        $stmt->execute(array_values($data));
        return $stmt;
    }
}