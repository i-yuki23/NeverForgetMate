<?php

class DatabaseModel
{
    protected $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function execute($sql, $params=[])
    {
        $stmt = $this->mysqli->prepare($sql);
        if ($params) {
            $stmt->bind_param(...$params);
        }

        $stmt->execute();
        $stmt->close();
    }
}
