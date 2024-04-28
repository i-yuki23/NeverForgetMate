<?php

class DatabaseManager
{
    protected $pdo;
    protected $models;

    public function connect($params)
    {
        $dsn = "mysql:host={$params['dbHost']};dbname={$params['dbName']};charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $params['dbUsername'], $params['dbPassword'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch as associative array
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Thorw Exception
                PDO::ATTR_EMULATE_PREPARES => false, // Use real prepared statements (For SQL Injection prevention)
              ]);
        } catch (PDOException $e) {
            error_log('Database connection failed: ' . $e->getMessage());
            throw new Exception('Unable to connect to the database.');
        }
    }

    public function get($modelName)
    {
        $model = new $modelName($this->pdo);
        $this->models[] = $model;
        return $model;
    }
}
